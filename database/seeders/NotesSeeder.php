<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class NotesSeeder extends Seeder
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

        // Insert multiple records (you can modify the number of records as needed)
        for ($i = 0; $i < 1000000; $i++) {
            DB::table('notes')->insert([
                'added_by' => $faker->name, // Generating random names
                'lead_id' => $faker->numberBetween(1, 100), // Random lead_id between 1 and 100
                'note_text' => $faker->sentence, // Generate random text (adjust length as needed)
                'created_at' => $faker->dateTimeThisYear, // Random date within this year
                'updated_at' => $faker->dateTimeThisYear, // Random date within this year
                'attachment_id' => $faker->optional()->numberBetween(1, 1000), // Random or null attachment_id
            ]);
        }
    }
}
