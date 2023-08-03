<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Role;
use App\Models\Conversation;
use App\Models\Message;
use Ramsey\Uuid\Uuid;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'username',
        'password',
        'full_name',
        'email',
        'avatar',
        'status',
        'updated_by',
        'created_by',
        'email_verification_token',
        'email_verified_at'
    ];

    protected $dates = ['deleted_at', 'email_verified_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id');
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class, 'owner_user_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function getPermissions()
    {
        $permissions = collect();

        // Get all the roles associated with the user
        $roles = $this->roles()->with('permissions')->get();

        // Extract and merge the permissions from each role
        foreach ($roles as $role) {
            $permissions = $permissions->merge($role->permissions);
        }

        return $permissions->pluck('code')->unique();
    }

    public function hasRole($roleName)
    {
        $roles = $this->roles()->pluck('name')->toArray();
        return in_array($roleName, $roles);
    }

    public function friends()
    {
        return $this->belongsToMany(User::class, 'friendships', 'user_id', 'friend_id')
            ->wherePivot('status', 'accepted');
    }

    public function friendRequests()
    {
        return $this->belongsToMany(User::class, 'friendships', 'user_id', 'friend_id')
            ->withPivot('status');
    }

}