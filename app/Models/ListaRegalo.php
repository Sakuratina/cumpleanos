<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListaRegalo extends Model
{
    public function regalos()
    {
        return $this->hasMany(Regalo::class);
    }
}
