<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookLoan extends Model
{
    use HasFactory;
    protected $table = 'book_loan';

    public function book()
    {
        # belongsTo('Models', 'khoa ngoai cua bang', 'id cua book')
        return $this->belongsTo('App\Models\Book', 'book_id', 'id');
    }

    public function student()
    {
        # code...
        return $this->belongsTo('App\Models\Student', 'student_id', 'id');
    }
}
