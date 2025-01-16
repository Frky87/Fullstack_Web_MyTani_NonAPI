<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'bbb',
            'email' => 'bbb@gmail.com',
            'password' => bcrypt('12345678'),
            'role_id' => 0
        ]);

        User::create([
            'name' => 'DAMNN',
            'email' => 'aaa@gmail.com',
            'password' => bcrypt('12345678'),
            'role_id' => 1
        ]);
    }
}
