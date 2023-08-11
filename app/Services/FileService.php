<?php

// app/Services/FileService.php

namespace App\Services;

use App\Services\Interfaces\FileServiceInterface;
use Illuminate\Support\Str;

class FileService implements FileServiceInterface
{
    public function uploadImage($file, $destinationPath)
    {
        // Tạo tên duy nhất cho tệp ảnh
        $fileName = 'avatar_' . Str::uuid() . '.' . $file->getClientOriginalExtension();

        // Lưu tệp ảnh vào thư mục đích
        $file->storeAs('public/' . $destinationPath, $fileName);

        $url = $destinationPath . '/' . $fileName;

        return $url;
    }
}