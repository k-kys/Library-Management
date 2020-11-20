<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Student extends Authenticatable
{
    use HasFactory;
    protected $table = 'students';

    public function book_loan()
    {
        return $this->hasOne('App\Models\BookLoan', 'student_id', 'id');
    }
}
