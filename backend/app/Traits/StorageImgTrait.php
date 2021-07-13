<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isEmpty;

trait StorageImgTrait
{
    public function storageImageUpload($request, $fieldName, $folderName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->$fieldName;
            $filename = $file->getClientOriginalName();
            $path = $request->file($fieldName)->storeAs('public/' . $folderName . '/' . auth()->id(), $filename);
            $dataUpload = [
                'file_name' => $filename,
                'file_path' => Storage::url($path)
            ];
            return $dataUpload;
        } else {
            return false;
        }
    }

    public function storageImageUploadMultiple($file, $folderName)
    {
        try {
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('public/' . $folderName . '/' . auth()->id(), $filename);
            $dataUpload = [
                'file_name' => $filename,
                'file_path' => Storage::url($path)
            ];
            return $dataUpload;
        } catch (\Exception $exception) {
            Log::error('lỗi' . $exception->getMessage() . '--line' . $exception->getLine());
        }
    }
}
