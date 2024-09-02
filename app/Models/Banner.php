<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subtitle', 'image_path', 'image_name']; // Pastikan kolom ini dapat diisi

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
