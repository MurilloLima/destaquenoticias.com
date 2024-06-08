<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classificado extends Model
{
    use HasFactory;

    // public function categoria()
    // {
    //     return $this->belongsTo(CategoriaClassificados::class, 'cat_id');
    // }

    public function categoria()
    {
        return $this->hasOne(CategoriaClassificados::class, 'id', 'cat_id');
    }

}
