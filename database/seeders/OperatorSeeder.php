<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
