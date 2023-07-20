<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Role;

class Permission extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'uuid',
        'updated_by',
        'created_by',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permissions', 'permission_id', 'role_id');
    }
}