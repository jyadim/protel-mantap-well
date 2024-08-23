<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = ['desc1', 'desc2', 'image_name', 'image_path'];
    use HasFactory;
}
