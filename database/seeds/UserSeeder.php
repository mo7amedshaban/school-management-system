<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert([
            'name' => 'mohamed shaban',
            'email' => 'mohamed@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
