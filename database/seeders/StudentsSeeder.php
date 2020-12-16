<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

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
            'name' => 'Student1',
            'email' => 'student1@gmail.com',
            'password' => bcrypt('123456'),
            'created_at' => '2020-12-01',
            'updated_at' => '2020-12-01',
        ];
        Student::insert($data);
    }
}
