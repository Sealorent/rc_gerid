<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newUser = new \App\Models\User();
        $newUser->name = 'administrator';
        $newUser->email = 'admin@gmail.com';
        $newUser->password = password_hash('password', PASSWORD_DEFAULT);
        $newUser->save();
    }
}
