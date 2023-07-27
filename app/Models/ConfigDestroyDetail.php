<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConfigDestroyDetail extends Model
{
    use SoftDeletes;

    protected $table = 'cs_config_destroy_detail';
    protected $primaryKey = 'id';
    protected $fillable = [
        'destroy_id',
        'from',
        'to',
        'date_type',
        'penalty_type',
        'penalty_money',
        'penalty_rate',
        'minimum_money',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    // Các trường timestamps (created_at, updated_at, deleted_at) sẽ được Laravel quản lý tự động.

    // Định nghĩa các liên kết hoặc ràng buộc nếu có
    // Ví dụ:
    // public function configDestroy()
    // {
    //     return $this->belongsTo(ConfigDestroy::class, 'destroy_id', 'id');
    // }

    // public function createdByUser()
    // {
    //     return $this->belongsTo(User::class, 'created_by', 'id');
    // }

    // public function updatedByUser()
    // {
    //     return $this->belongsTo(User::class, 'updated_by', 'id');
    // }

    // public function deletedByUser()
    // {
    //     return $this->belongsTo(User::class, 'deleted_by', 'id');
    // }
}