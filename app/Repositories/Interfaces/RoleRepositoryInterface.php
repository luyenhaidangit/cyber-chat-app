<?php

namespace App\Repositories\Interfaces;

interface RoleRepositoryInterface
{
    public function getAll();
    public function findOneByConditions(array $conditions);
    // public function update(Role $role, array $data);
}