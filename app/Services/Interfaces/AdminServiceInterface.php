<?php

namespace App\Services\Interfaces;

interface AdminServiceInterface
{
    public function get($pageIndex, $pageSize, $conditions);
    // public function create($pageIndex, $pageSize);
    // public function edit($pageIndex, $pageSize);
    // public function delete($pageIndex, $pageSize);
}