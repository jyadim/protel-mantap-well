<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['slug', 'title', 'date', 'link', 'user_id'];
    use HasFactory;
    // Define the relationship with the User model
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
