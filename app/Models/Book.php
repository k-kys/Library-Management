<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';

    public function author()
    {
        return $this->belongsTo('App\Models\Author', 'author_id', 'id');
    }

    public function book_loan()
    {
        # code...
        return $this->hasOne('App\Models\BookLoan', 'book_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'book_category', 'book_id', 'category_id');
    }
}
