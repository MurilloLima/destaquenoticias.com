<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'user_id',
        'cat_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(CategoriaClassif::class, 'cat_id');
    }
}
