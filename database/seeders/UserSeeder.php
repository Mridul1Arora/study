<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the current timestamp
        $currentTimestamp = Carbon::now();

        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'email_verified_at' => $currentTimestamp,
                'password' => Hash::make('password'), // hashed password
                'remember_token' => Str::random(10),
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'id' => 2,
                'name' => 'Administrator',
                'email' => 'administrator@example.com',
                'email_verified_at' => $currentTimestamp,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'id' => 3,
                'name' => 'Counselor',
                'email' => 'counselor@example.com',
                'email_verified_at' => $currentTimestamp,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'id' => 4,
                'name' => 'Product Manager',
                'email' => 'pmanager@example.com',
                'email_verified_at' => $currentTimestamp,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'id' => 5,
                'name' => 'Tech Manager',
                'email' => 'tmanager@example.com',
                'email_verified_at' => $currentTimestamp,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
        ]);
    }
}
