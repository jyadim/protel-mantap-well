<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DescriptionPoints extends Model
{
    use HasFactory;

    protected $fillable = ['products_id', 'title', 'desc'];

    public function product()
    {
        return $this->belongsTo(DetailProducts::class, 'products_id');
    }
}
