<?php

namespace App\Services;
use Illuminate\Http\Request;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;
use Pion\Laravel\ChunkUpload\Save\SaveFile;

class ResumableFileUpload
{
    public function upload($fileData,$fileStoragePath)
    {
        $receiver = new FileReceiver("file", $fileData, HandlerFactory::classFromRequest($fileData));

        if ($receiver->isUploaded() === false) {
            return response()->json(['error' => 'File not uploaded'], 400);
        }

        $save = $receiver->receive();

        if ($save->isFinished()) {
            $file = $save->getFile();
            $path = $file->storeAs($fileStoragePath, $file->getClientOriginalName());

            return response()->json(['path' => $path]);
        } else {
            $handler = $save->handler();
            return response()->json([
                "done" => $handler->getPercentageDone(),
                "status" => true
            ]);
        }
    }
}
