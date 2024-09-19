<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ActivityLog;

class ActivityLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ActivityLog::insert([
            [
                'module_id' => 1,
                'lead_id' => 10,
                'added_by' => 1,
                'action' => 'Created lead',
                'created_at' => now(),
            ],
            [
                'module_id' => 2,
                'lead_id' => 11,
                'added_by' => 2,
                'action' => 'Updated lead details',
                'created_at' => now(),
            ],
            [
                'module_id' => 1,
                'lead_id' => 12,
                'added_by' => 1,
                'action' => 'Assigned lead',
                'created_at' => now(),
            ],
            [
                'module_id' => 3,
                'lead_id' => 13,
                'added_by' => 3,
                'action' => 'Deleted lead',
                'created_at' => now(),
            ],
            [
                'module_id' => 2,
                'lead_id' => 14,
                'added_by' => 1,
                'action' => 'Viewed lead',
                'created_at' => now(),
            ],
            [
                'module_id' => 1,
                'lead_id' => 15,
                'added_by' => 4,
                'action' => 'Created lead',
                'created_at' => now(),
            ],
            [
                'module_id' => 2,
                'lead_id' => 16,
                'added_by' => 2,
                'action' => 'Updated lead status',
                'created_at' => now(),
            ],
            [
                'module_id' => 1,
                'lead_id' => 17,
                'added_by' => 3,
                'action' => 'Assigned lead',
                'created_at' => now(),
            ],
            [
                'module_id' => 3,
                'lead_id' => 18,
                'added_by' => 2,
                'action' => 'Deleted lead',
                'created_at' => now(),
            ],
            [
                'module_id' => 2,
                'lead_id' => 19,
                'added_by' => 1,
                'action' => 'Viewed lead details',
                'created_at' => now(),
            ],
        ]);
    }
}
