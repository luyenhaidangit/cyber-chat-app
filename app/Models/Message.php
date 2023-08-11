<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Message extends Model
{
    use Searchable;
    protected $fillable = [
        'user_id',
        'conversation_id',
        'message',
        'status',
        'created_by',
        'updated_by',
        'uuid',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function conversation()
    {
        return $this->belongsTo(Conversation::class, 'conversation_id');
    }

    public function toSearchableArray()
    {
        return [
            'message' => $this->message
        ];
    }
}