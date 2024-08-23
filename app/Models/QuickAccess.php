<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuickAccess extends Model
{
    protected $fillable = ['slug', 'title', 'date', 'link'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
