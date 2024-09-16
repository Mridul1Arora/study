<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CallLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'call_to' => 1,
                'call_from' => 2,
                'call_type' => 1, // 1-inbound
                'call_start_time' => Carbon::now()->format('Y-m-d H:i:s'),
                'time_duration' => '00:15:30', // 15 minutes 30 seconds
                'call_purpose' => 1, // 1-L1
                'call_agenda' => 'Meeting',
                'call_result' => 1, // 1-Connected
                'description' => 'Discussed project details.',
                'call_status' => 'completed',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'call_to' => 3,
                'call_from' => 4,
                'call_type' => 2, // 2-outbound
                'call_start_time' => Carbon::now()->format('Y-m-d H:i:s'),
                'time_duration' => '00:05:00', // 5 minutes
                'call_purpose' => 2, // 2-L2
                'call_agenda' => 'Follow-up',
                'call_result' => 3, // 3-Call Back
                'description' => 'Scheduled a follow-up meeting.',
                'call_status' => 'completed',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insert data into the table
        DB::table('call_logs')->insert($data);
    }
}
