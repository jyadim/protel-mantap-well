<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProducts extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'video', 'image1', 'image2'];

    // Update the relationship method to match the foreign key "products_id"
    public function descriptionPoints()
    {
        return $this->hasMany(DescriptionPoints::class, 'products_id');
    }
}
