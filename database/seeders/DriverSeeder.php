<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('drivers')->insert([
            'name' => 'driver',
            'password' => Hash::make('password'),  // Use Laravel's Hash facade to hash the password
            'status' => 'enabled',
            'mobile' => '0555555555',
            'email' => 'driver@driver.com',
            'language' => 'ar',
            'lat' => '32.555',
            'lng' => '32.555',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);
    }
}
