<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PictService extends Model
{
    protected $fillable = ['image_path', 'service_id'];
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
