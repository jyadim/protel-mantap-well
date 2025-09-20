<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $table = 'partners';
    
    protected $fillable = ['reference_id', 'partner_id', 'title', 'text', 'link'];

    // Define the belongsTo relationship with Partners
    public function partner()
    {
        return $this->belongsTo(Partners::class, 'partner_id');
    }
    
    // Define the relationship with Reference if needed
    public function reference()
    {
        return $this->belongsTo(Reference::class, 'reference_id');
    }
}
