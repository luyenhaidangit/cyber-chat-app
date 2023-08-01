<?php

namespace App\Services\Interfaces;

interface RoleServiceInterface
{
    public function getAll();
    public function editRole($id, array $data);
    public function findOneByConditions($conditions);
}