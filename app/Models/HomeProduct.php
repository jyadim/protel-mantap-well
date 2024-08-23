<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeProduct extends Model
{
    protected $fillable = ['slug', 'title', 'name', 'image_name', 'image_path', 'user_id'];
    
    // Define the relationship with the User model
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
