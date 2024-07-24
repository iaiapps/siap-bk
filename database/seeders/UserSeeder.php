<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
        ]);
        $admin->assignRole('admin');

        $teacher = User::create([
            'name' => 'teacher',
            'email' => 'teacher@gmail.com',
            'password' => Hash::make('password123'),
        ]);
        $teacher->assignRole('teacher');


        $student = User::create([
            'name' => 'student',
            'email' => 'student@gmail.com',
            'password' => Hash::make('password123'),
        ]);
        $student->assignRole('student');
    }
}
