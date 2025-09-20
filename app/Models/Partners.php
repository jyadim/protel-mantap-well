<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{
    use HasFactory;
    protected $table ='partner';
    protected $fillable = [ 'partner_title', 'image_path'];

    // Define the hasMany relationship with the Partner model
    public function partners()
    {
        return $this->hasMany(Partner::class, 'partner_id');
    }

    // Define the relationship with Reference
    public function reference()
    {
        return $this->belongsTo(Reference::class, 'references_id');
    }
}
