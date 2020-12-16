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
            'name' => 'Nhật ký trong tù',
            'author_id' => '1',
            'price' => '500000',
            'quantity' => '50',
            'quantity_stock' => '49',
            'created_at' => '2020-12-01',
            'updated_at' => '2020-12-01',
        ];
        Book::insert($data);
    }
}
