<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\Drug;
use App\Models\Message;
use App\Models\Room;
use App\Models\Nurse;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      Nurse::factory(20)->create();
    }
}
