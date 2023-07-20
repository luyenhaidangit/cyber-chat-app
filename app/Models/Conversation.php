<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Message;


class Conversation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'owner_user_id',
        'uuid',
        'name',
        'avatar',
        'status',
        'type',
        'updated_by',
        'created_by',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_user_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_conversations', 'conversation_id', 'user_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}