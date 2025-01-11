<?php

namespace App\Http\Controllers;

use App\Models\ProjectAttachment;
use App\Models\UserFile;
use App\Models\UserFileFolders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB, Redirect, Response, Auth;
use File, Str, Hash, Mail;

class UserFileFoldersController extends Controller
{
    public $model = 'folders';

    public $filterName = 'fileListingFilterData';
    public $listRouteUrl;
    public function __construct(Request $request)
    {
        parent::__construct();
        $this->middleware(function ($request, $next) {

            $this->listRouteUrl = route(routeNamePrefix() . 'folder.index');
            return $next($request);
        });
        View()->share('model', $this->model);
        View()->share('listRouteUrl', $this->listRouteUrl);
        View()->share('filterName', $this->filterName);
        $this->request = $request;
    }
    public function index(Request $request)
    {
        $loggedInUserId = Auth::user()->id;
        $fileInstance = new UserFileFolders();
        $recordsPerPage = !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");

        $results = $fileInstance->loadUserFolder(['perPage' => $recordsPerPage, 'userId' => $loggedInUserId], $request->all(), []);
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
            $fileInstance = new UserFile();
            $totalOccupiedStorage = $fileInstance->loadUserFiles(['query' => true, 'userId' => $loggedInUserId], $request->all(), []);
            $totalOccupiedStorage = $totalOccupiedStorage->sum('user_files.file_size');
            $filterData = $this->getFilterData($this->filterName);
            return View("modules.$this->model.index", compact('results', 'listingType', 'filterData', 'totalOccupiedStorage'));
        }
    }

    public function store(Request $request)
    {
        // dd(123);
        $loggedInUserId = Auth::user()->id;
        $formData = $request->all();
       

        if (!empty($formData)) {
            $validator = Validator::make(
                $request->all(),
                array(
                    'name' => 'required',
                ),
                array(
                    "name.required" => trans('The folder name field is required'),
                )
            );
            if ($validator->fails()) {
                $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                return Response::json($response, 200);
            } else {

                $loggedInUserId = Auth::user()->id;

                DB::beginTransaction();
                $obj   = new UserFileFolders();
                $obj->user_id = $loggedInUserId;
                $obj->name = $request->name;

                $obj->save();
                $lastId = $obj->id;
                if (empty($lastId)) {
                    DB::rollback();
                    $response = array();
                    $response["status"] = "error";
                    $response["msg"] = trans("messages.Something_went_wrong");
                    $response["data"] = (object) array();
                    $response["http_code"] = 500;
                    return Response::json($response, 500);
                }
                DB::commit();

                // compact('results', 'listingType'))->render();
                $response = array();
                $response["status"] = "success";
                $response["msg"] = trans('Folder created successfully');
                $response["data"] = route(routeNamePrefix() . 'folder.index');
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
    public function edit(Request $request)
    {
        $loggedInUserId = Auth::user()->id;
        $formData = $request->all();
        if (!empty($formData)) {
            $validator = Validator::make(
                $request->all(),
                array(
                    'edit_name' => 'required',
                ),
                array(
                    "edit_name.required" => trans('The folder name field is required'),
                )
            );
            if ($validator->fails()) {
                $response = $this->change_error_msg_layout($validator->errors()->getMessages());
                return Response::json($response, 200);
            } else {

                $loggedInUserId = Auth::user()->id;

                DB::beginTransaction();
                $obj   = UserFileFolders::find($request->folder_id);
                $obj->user_id = $loggedInUserId;
                $obj->name = $request->edit_name;

                $obj->save();
                $lastId = $obj->id;
                if (empty($lastId)) {
                    DB::rollback();
                    $response = array();
                    $response["status"] = "error";
                    $response["msg"] = trans("messages.Something_went_wrong");
                    $response["data"] = (object) array();
                    $response["http_code"] = 500;
                    return Response::json($response, 500);
                }
                DB::commit();


                $response = array();
                $response["status"] = "success";
                $response["msg"] = trans('Folder updated successfully');
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
                $userFileData = UserFile::where('folder_id', $idVal)->get();
                foreach ($userFileData as $userFile) {
                    if (!empty($userFile)) {
                        $filePath = Config('constant.USER_FILE_ROOT_PATH') . $userFile->file_name;

                        if (File::exists($filePath)) {
                            File::delete($filePath);
                        }
                    }
                    $userFile->delete();
                }
            }
            UserFileFolders::whereIn('id', $id)->delete();
        }
        $response = array();
        $response["status"] = "success";
        $response["msg"] = trans("messages.popup-message.folder_removed_successfully");
        $response["data"] = (object) array();
        $response["http_code"] = 200;
        return Response::json($response, 200);
    }



    public function loadFolderData(Request $request)
    {
        $loggedInUserId = Auth::user()->id;
        $folderInstance = new UserFileFolders();
        $recordsPerPage =  !empty($request->input('per_page')) ? $request->input('per_page') : Config("Reading.records_per_page");
        $results = $folderInstance->loadUserFolder(['perPage' => $recordsPerPage], $request->all(), []);
        $htmlData = View("modules.dashboard.includes.load-folder-data", ['results' => $results])->render();
        
        $loadFolder = "";
        if(!empty($request->type) && $request->type == "eventsfolders"){
            $loadFolder = "eventsfolders";
        }
        if(!empty($request->type) && $request->type == "projectfolders"){
            $loadFolder = "projectfolders";
        }
        if(!empty($request->type) && $request->type == "viewfilefolders"){
            $loadFolder = "viewfilefolders";
        }
        $attachments = ProjectAttachment::where('project_id',$request->project_id)->where('added_by',$loggedInUserId)->where('deleted_at',null)->get();
        $folderData = View("modules.dashboard.includes.project-load-folder", ['attachments'=>$attachments,'folders' => $results,'loadFolder'=>$loadFolder])->render();
        
        $fileInstance = new UserFile();
        $totalOccupiedStorage = $fileInstance->loadUserFiles(['query' => true, 'userId' => $loggedInUserId], $request->all(), []);
        $totalOccupiedStorage = $totalOccupiedStorage->sum('user_files.file_size');
        $storageStatusData = View("modules.files.includes.storage_status", ['totalOccupiedStorage' => $totalOccupiedStorage])->render();
        
        
        
        $response = array();
        $response["status"] = "success";
        $response["msg"] = "";
        $response['data'] = $htmlData;
        $response['storage_status_data'] = $storageStatusData;
        $response['project_load_folder'] = $folderData;
        $response['folder'] = $results;
        $response["http_code"] = 200;
        return Response::json($response, 200);
    }
}
