<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
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
            'name' => 'Hồ Chí Minh',
            'created_at' => '2020-12-01',
            'updated_at' => '2020-12-01',
        ];
        Author::insert($data);
    }
}
