<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use App\Models\UserFile;
use File;
class ProcessUserFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userFileId;
    protected $filePath;

    public function __construct($userFileId, $filePath)
    {
        $this->userFileId = $userFileId;
        $this->filePath = $filePath;
    }

    public function handle()
    {
        $userFile = UserFile::findOrFail($this->userFileId);
        \Log::info('File Upload Started for file => '.$userFile->file_name);
        $chunkSize = 2 * 1024 * 1024; // 2 MB chunk size

        $destinationPath = public_path('storage/user_files/');
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true);
        }

        $sourceHandle = fopen($this->filePath, 'rb');
        $chunkNumber = 1;

        $mergedFilePath = $destinationPath . $userFile->file_name;

        while (!feof($sourceHandle)) {
            $chunk = fread($sourceHandle, $chunkSize);

            $chunkFileName = $userFile->file_original_name . '_part' . $chunkNumber.'.'.$userFile->file_type;
            $chunkFilePath = $destinationPath . $chunkFileName;
            file_put_contents($chunkFilePath, $chunk);
            // print_r($chunkFilePath);die;

            // Update upload progress
            $progress = (int)(($chunkNumber * $chunkSize / $userFile->file_size) * 100);
            // if($chunkNumber == 50){
            //     print_r($progress);die;
            // }
            UserFile::where('id',$this->userFileId)->update(['upload_progress' => $progress]);

            $chunkNumber++;
        }

        fclose($sourceHandle);
        // print_r($chunkNumber);die;
        // Merge chunks into a single file
        $mergedHandle = fopen($mergedFilePath, 'ab');

        for ($i = 1; $i < $chunkNumber; $i++) {
            $chunkFileName = $userFile->file_original_name . '_part' . $i.'.'.$userFile->file_type;
            $chunkFilePath = $destinationPath . $chunkFileName;

            $chunkData = file_get_contents($chunkFilePath);
            fwrite($mergedHandle, $chunkData);

            // Delete chunk file after merging
            unlink($chunkFilePath);
        }

        fclose($mergedHandle);

        if (File::exists($this->filePath)) {
            File::delete($this->filePath);
        }
        // unlink($this->filePath);

        // Update upload status to completed
        UserFile::where('id',$this->userFileId)->update(['upload_status' => 'completed']);

        \Log::info('File Upload Completed for file => '.$userFile->file_name);
    }
}

