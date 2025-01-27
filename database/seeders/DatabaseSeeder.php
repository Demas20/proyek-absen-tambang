<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name' => 'Operator 1',
        //     'email' => 'demasabiansya@gmail.com',
        //     'password' => Hash::make('12345678'),
        //     'role' => 'operator', // atau 'atasan'
        // ]);
        $faker = Faker::create();

        for ($i = 0; $i < 18; $i++) {
            DB::table('operator')->insert([
                'nama' => $faker->name,
                'jenis_kelamin' => $faker->randomElement(['Pria', 'Wanita']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
