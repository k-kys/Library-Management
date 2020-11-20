<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StudentsSeeder extends Seeder
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
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'password' => bcrypt('123456'),
        ];
        Student::insert($data);
    }
}
