<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    protected $table = 'productgallery';
    protected $fillable = ['products_id', 'image'];
    
    use HasFactory;
    public function gallery(){
        return $this->belongsTo(DetailProducts::class, 'products_id');
    }
}
