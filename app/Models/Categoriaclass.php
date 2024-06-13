<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoriaclass extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    public function images()
    {
        return $this->hasMany(Image::class, 'id', 'cat_id');
    }
}
