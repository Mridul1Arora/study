<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;


class CallLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $data = [];

        for ($i = 0; $i < 1000000; $i++) {
            $data[] = [
                'call_to' => $faker->numberBetween(1, 100),
                'call_from' => $faker->numberBetween(1, 100),
                'call_type' => $faker->randomElement([1, 2]), // 1-inbound, 2-outbound
                'call_start_time' => Carbon::now()->subMinutes(rand(1, 10000))->format('Y-m-d H:i:s'),
                'time_duration' => $faker->time('H:i:s'),
                'call_purpose' => $faker->numberBetween(1, 5), // Example: 1-L1, 2-L2, etc.
                'call_agenda' => $faker->sentence(),
                'call_result' => $faker->randomElement([1, 2, 3]), // 1-Connected, 2-Missed, 3-Call Back
                'description' => $faker->paragraph(),
                'call_status' => $faker->randomElement(['completed', 'pending', 'failed']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            // Insert in batches to avoid memory overload
            if (count($data) == 1000) {
                DB::table('call_logs')->insert($data);
                $data = []; // Reset array for next batch
            }
        }

        // Insert remaining data (if any)
        if (!empty($data)) {
            DB::table('call_logs')->insert($data);
        }
    }
}
