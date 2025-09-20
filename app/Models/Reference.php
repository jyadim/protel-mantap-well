<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'image', 'description'];

    public function partners()
    {
        return $this->hasMany(Partner::class, 'reference_id'); // Adjust as needed
    }
    
    public function pdf_ref()
    {
        return $this->hasMany(pdf_ref::class);
    }
}
