<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaClassificados extends Model
{
    use HasFactory;

    public function classificado()
    {
        return $this->hasMany(Classificado::class);
    }
}
