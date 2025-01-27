<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Operator 1',
            'email' => 'demasabiansya@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'operator', // atau 'atasan'
        ]);
    }
}
