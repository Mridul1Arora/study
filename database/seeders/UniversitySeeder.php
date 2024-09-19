<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create an instance of Faker
        $faker = Faker::create();

        for ($i = 0; $i < 1000000; $i++) {
            DB::table('universities')->insert([
                'name' => $faker->company,  // Random university name
                'cd_id' => $faker->numberBetween(1, 100),  // Random cd_id
                'country_id' => $faker->numberBetween(1, 200),  // Random country_id
                'state_id' => $faker->numberBetween(1, 50),  // Random state_id
                'college_id' => $faker->numberBetween(1, 100),  // Random college_id
                'campus_location' => $faker->address,  // Random campus address
                'city_id' => $faker->numberBetween(1, 500),  // Random city_id
                'city_2' => $faker->city,  // Random city name
                'desc' => $faker->paragraph,  // Random description text
                'university_owner' => $faker->name,  // Random university owner name
                'modified_by' => $faker->name,  // Random name for the person who modified it
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
