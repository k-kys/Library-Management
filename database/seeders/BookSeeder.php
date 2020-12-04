<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
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
            'name' => 'Doremon',
            'author_id' => '1',
            'created_at' => '2020-12-01',
        ];
        Book::insert($data);
    }
}
