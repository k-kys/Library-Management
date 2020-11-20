<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    public function books()
    {
        # code...
        return $this->belongsToMany('App\Models\Book', 'book_category', 'category_id', 'book_id');
    }
}
