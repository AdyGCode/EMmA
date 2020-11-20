<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => "Administrator",
                'email' => "admin@example.com",
                'password' => Hash::make('Password1'),
            ], [
                'name' => "Student",
                'email' => "student@example.com",
                'password' => Hash::make('Password1'),
            ], [
                'name' => "Ady G",
                'email' => "ady@example.com",
                'password' => Hash::make('Password1'),
            ],
        ];

        foreach ($users as $user) {
            \App\Models\User::insert([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
            ]);
        }
        \App\Models\User::factory(10)->create();
    }
}
