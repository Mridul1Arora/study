<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  Faker\Factory as Faker;

class AttachmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('attachments')->insert([
                'file_path' => $faker->filePath,
                'file_name' => $faker->fileName,
                'field_type' => $faker->optional()->word,
                'lead_id' => $faker->numberBetween(1, 100),
                'user_id' => $faker->numberBetween(1, 10),
                'file_size' => $faker->optional()->numberBetween(1000, 1000000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
