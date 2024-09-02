<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['title', 'desc'];
    
    public function pictures()
    {
        return $this->hasMany(PictService::class, 'service_id');
    }
    use HasFactory;
}

