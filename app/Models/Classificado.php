<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classificado extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_id',
        'title',
        'desc',
        'valor',
        'image',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoriaclass::class, 'cat_id');
    }


    public function images()
    {
        return $this->belongsTo(Image::class, 'id', 'cat_id');
    }
}
