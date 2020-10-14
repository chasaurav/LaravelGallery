<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Saurav Chakraborty',
            'email' => 'chasaurav@gmail.com',
            'username' => 'chasaurav',
            'password' => Hash::make('12345678')
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => Hash::make('12345678')
        ]);
    }
}
