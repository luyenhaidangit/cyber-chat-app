<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ConfigDestroyDetail;

class ConfigDestroy extends Model
{
    use SoftDeletes;

    protected $table = 'cs_config_destroy';
    protected $primaryKey = 'id';
    protected $fillable = ['service', 'service_status', 'status', 'created_by', 'updated_by', 'deleted_by'];

    public function configDestroyDetails()
    {
        return $this->hasMany(ConfigDestroyDetail::class, 'destroy_id');
    }
}