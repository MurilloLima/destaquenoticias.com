<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classificado extends Model
{
    use HasFactory;

    public function categoria()
    {
        return $this->belongsTo(CategoriaClassificados::class, 'cat_id');
    }


    public function fotos()
    {
        return $this->belongsTo(Image::class, 'id', 'cat_id');
    }
}
