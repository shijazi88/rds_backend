<?php

namespace Database\Seeders;
use App\Models\CrmRequest;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Define the number of fake records you want to generate
         $numberOfRecords = 40;

         // Generate fake data using the Request model factory
         CrmRequest::factory()->count($numberOfRecords)->create();
    }
}
