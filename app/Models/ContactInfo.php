<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $fillable =['link_maps', 'email', 'land_line', 'address', 'mobile'];
    use HasFactory;
}
