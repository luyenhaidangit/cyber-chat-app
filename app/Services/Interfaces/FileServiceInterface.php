<?php

namespace App\Services\Interfaces;

interface FileServiceInterface
{
    public function uploadImage($file, $destinationPath);
}