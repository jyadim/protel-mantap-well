<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PDF extends Model
{
    protected $table = 'pdfs';
    protected $fillable = ['title', 'file_path', 'products_id'];

    public function pdfs()
    {
        return $this->belongsTo(DetailProducts::class, 'products_id');
    }
}
