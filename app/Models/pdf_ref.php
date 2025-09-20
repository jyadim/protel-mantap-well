<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pdf_ref extends Model
{
    protected $table = 'pdf_ref';
    protected $fillable = ['pdf_title', 'pdf_path', 'references_id'];

    public function pdf_ref()
    {
        return $this->belongsTo(Reference::class, 'references_id');
    }
}
