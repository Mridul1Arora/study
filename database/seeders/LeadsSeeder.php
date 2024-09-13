<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lead;
use Faker\Factory as Faker;


class LeadsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $leadStages = ['New', 'Contact', 'Follow-up', 'Proposal'];
        $leadStatuses = ['Active', 'Inactive', 'Closed'];
        $coursesOfStudy = ['Engineering', 'Business', 'Nursing', 'Medicine', 'Law'];
        $universities = ['University AA', 'University BB', 'University CC', 'University DD'];

        for ($i = 1; $i <= 50000; $i++) {
            Lead::create([
                'id' => $i,
                'lead_name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'lead_stage' => $faker->randomElement($leadStages),
                'city' => $faker->city,
                'current_state' => $faker->stateAbbr,
                'lead_owner' => $faker->name,
                'preferred_intake' => 'Fall ' . $faker->year('now + 3 years'),
                'ielts_score' => $faker->randomFloat(1, 5, 9),
                'sat_score' => $faker->numberBetween(800, 1600),
                'lead_status' => $faker->randomElement($leadStatuses),
                'work_experience' => $faker->numberBetween(0, 10) . ' years',
                'preferred_course_of_study' => $faker->randomElement($coursesOfStudy),
                'has_passport' => $faker->randomElement(['Yes', 'No']),
                'preferred_universities' => $faker->randomElement($universities) . ';' . $faker->randomElement($universities),
                'phone' => $faker->phoneNumber,
            ]);
        }
    }
}

