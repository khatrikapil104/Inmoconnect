<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB, Redirect, Response, Auth;
use App\Models\UserFile;
use Illuminate\Validation\Rule;
use File, Str, Hash, Mail;
use App\Models\UserFileFolders;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class FileController extends Controller
{
    public $model = 'files';

    public $filterName = 'fileListingFilterData';
    public $listRouteUrl;
    public function __construct(Request $request)
    {
        View()->share('model', $this->model);
        View()->share('listRouteUrl', $this->listRouteUrl);
        View()->share('filterName', $this->filterName);
        $this->request = $request;
    }

    public function index(Request $request, $id = null)
    {
        $loggedInUserId = Auth::user()->id;
        $folder = UserFileFolders::findOrFail($id);
        $fileInstance = new UserFile();
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");
        $results = $fileInstance->loadUserFiles(['perPage' => $recordsPerPage, 'userId' => $loggedInUserId], $request->all(), $id);
        $listingType = 'file-listing';

        $listingType = 'file-listing';
        if ($request->ajax()) {
            if (!empty($request->request_from) && $request->request_from == 'modal') {
                $data = View('modules.files.includes.upload_document_modal_row', ['allDocumentData' => $results])->render();
                $response = array();
                $response["status"] = "success";
                $response["msg"] = "";
                $response['data'] = $data;
                $response['files'] = $results;
                $response["http_code"] = 200;
                return Response::json($response, 200);
            } else {

                $tableData = View("components.tables.custom-table", compact('results', 'listingType'))->render();
                $paginationData = View("components.tables.pagination", compact('results', 'listingType'))->render();
                $response = array();
                $response["status"] = "success";
                $response["msg"] = "";
                $response['tableData'] = $tableData;
                $response['paginationData'] = $paginationData;
                $response["http_code"] = 200;
                return Response::json($response, 200);
            }
        } else {
            $totalOccupiedStorage = $fileInstance->loadUserFiles(['query' => true, 'userId' => $loggedInUserId], $request->all(), []);
            $totalOccupiedStorage = $totalOccupiedStorage->sum('user_files.file_size');
            $filterData = $this->getFilterData($this->filterName);
            return View("modules.$this->model.index", compact('results', 'listingType', 'filterData', 'totalOccupiedStorage', 'folder'));
        }
    }


    public function store(Request $request, $folder_id)
    {
        $loggedInUserId = Auth::user()->id;
        $fileSizeLimitForThisUser = getFileSizeLimit();
        $formData = $request->all();
        if (!empty($formData)) {
            Validator::extend('unique_file_original_name', function ($attribute, $value, $parameters, $validator) use ($folder_id) {
                // Check if the file with the original name exists and is not soft-deleted
                $check = !UserFile::where('folder_id', $folder_id)->where('file_original_name', $value->getClientOriginalName())->whereNull('deleted_at')->exists();
                return $check;
            });
            $validator = Validator::make(
                $request->all(),
                array(
                    'file' => 'required|max:5',
                    'file' => 'required|max:' . $fileSizeLimitForThisUser . '|unique_file_original_name'
                    // |mimes:jpeg,png,jpg,pdf,doc,docx,xls,xlsx,ppt,pptx                 
                ),
                array(

                    "file.required" => trans("Please upload atleast one certificate"),
                    "file.*.mimes" => trans("messages.The_file_must_be_a_file_of_type_pdf_jpg_jpeg_png_doc_docx"),
                    "file.*.max" => trans("messages.The_file_size_should_not_exceed") . " " . getFileSizeLimit(true),
                    "file.*.unique_file_original_name" => trans("A file with same name already exists"),
                    "file.max" => trans("Maximum 5 files are allowed to upload at a time"),
                )
            );
            if ($validator->fails()) {
                $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                return Response::json($response, 200);
            } else {
                $loggedInUserId = Auth::user()->id;
                $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));
                $fileReceived = $receiver->receive();
                if ($request->resumableChunkNumber == 1 || $fileReceived->isFinished()) {
                    $file = $fileReceived->getFile();
                    $directory = public_path('storage/user_files/');
                    $originalName = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $fileNameWithoutExtension = pathinfo($originalName, PATHINFO_FILENAME);
                    $filePath = $directory . $originalName;
                    DB::beginTransaction();
                    $userFile = new UserFile();
                    if (!File::exists($directory)) {
                        File::makeDirectory($directory, 0777, true);
                    }
                    if ($fileReceived->isFinished()) {
                        $size = $file->getSize();
                        if (File::exists($filePath)) {
                            File::delete($filePath);
                        }
                        $userFile->folder_id = $folder_id;
                        $userFile->file_type = $extension;
                        $userFile->file_name = $originalName;
                        $userFile->file_original_name = $fileNameWithoutExtension;
                        $userFile->upload_status = 'in_progress';
                        $userFile->upload_progress = 0;
                        $userFile->file_size = 0;
                        $userFile->save();
                        if ($file->move($directory, $originalName)) {

                            UserFile::where('upload_status', 'in_progress')->update([
                                'upload_status' => 'completed',
                                'upload_progress' => 100,
                                'file_size' => $size ?? 0
                            ]);
                        }
                    } else {
                        DB::rollback();
                    }

                    DB::commit();
                }



                $response = array();
                $response["status"] = "success";
                $response["msg"] = trans("Started upload Processing");
                $response["data"] = (object) array();
                $response["http_code"] = 200;
                return Response::json($response, 200);
            }
        } else {
            $response = array();
            $response["status"] = "error";
            $response["msg"] = trans("messages.Invalid_request");
            $response["data"] = (object) array();
            $response["http_code"] = 500;
            return Response::json($response, 500);
        }
    }


    public function destroy(Request $request, $id)
    {
        $id = explode(',', $id);
        if (!empty($id) && is_array($id)) {
            foreach ($id as $idVal) {
                $userFile = UserFile::findOrFail($idVal);
                $filePath = Config('constant.USER_FILE_ROOT_PATH') . $userFile->file_name;

                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
                $userFile->delete();
            }
        }
        $response = array();
        $response["status"] = "success";
        $response["msg"] = trans("messages.popup-message.file_removed_successfully");
        $response["data"] = (object) array();
        $response["http_code"] = 200;
        return Response::json($response, 200);
    }

    public function getFiles(Request $request, $id = null)
    {
        $loggedInUserId = Auth::user()->id;
        $fileInstance = new UserFile();
        $foldername = UserFileFolders::select('name')->find($id);
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");
        $allDocumentData = $fileInstance->loadUserFiles(['perPage' => $recordsPerPage, 'userId' => $loggedInUserId], $request->all(), $id);
        $results = View("modules.projects.includes.project-load-file", compact('allDocumentData'))->render();
        $response = array();
        $response["status"] = "success";
        $response["msg"] = "";
        $response['files'] = $results;
        $response['foldername'] = $foldername;
        $response["http_code"] = 200;
        return Response::json($response, 200);
    }

    public function filesData(Request $request, $id)
    {
        $loggedInUserId = Auth::user()->id;
        $fileInstance = new UserFile();
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");
        $allDocumentData = $fileInstance->loadUserFiles(['perPage' => $recordsPerPage, 'userId' => $loggedInUserId], $request->all(), $id);
        $results = View("modules.projects.includes.project-load-file", compact('allDocumentData'))->render();
        $response = array();
        $response["status"] = "success";
        $response['files'] = $results;
        $response["http_code"] = 200;
        return Response::json($response, 200);
    }
}
