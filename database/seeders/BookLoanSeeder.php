<?php

namespace Database\Seeders;

use App\Models\BookLoan;
use Illuminate\Database\Seeder;

class BookLoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            'student_id' => 1,
            'book_id' => 1,
            'date_issued' => '2020-12-01',
            'date_due_for_return' => '2020-12-08',
            'created_at' => '2020-12-01',
            'updated_at' => '2020-12-01',
        ];
        BookLoan::insert($data);
    }
}
