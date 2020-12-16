<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
            'name' => 'Thơ',
            'created_at' => '2020-12-01',
            'updated_at' => '2020-12-01',
        ];
        Category::insert($data);
    }
}
