<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regalo extends Model
{
    protected $fillable = ['nombre', 'url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
