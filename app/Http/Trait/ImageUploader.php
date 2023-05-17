<?php

namespace App\Http\Trait;


use Illuminate\Support\Facades\Storage;

trait ImageUploader
{
    public function uploadImage($file, $fileUrl, $deleteFile=null)
    {
        if($deleteFile && Storage::disk('s3')->exists($deleteFile))
        {
            Storage::disk('s3')->delete($deleteFile);
        }

        $path = $file->storePublicly($fileUrl, 's3');
        Storage::disk('s3')->url($path);

        return $path;
    }
}
