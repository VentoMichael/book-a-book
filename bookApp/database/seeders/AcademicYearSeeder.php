<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use Database\Factories\AcademicYearFactory;
use Illuminate\Database\Seeder;

class AcademicYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AcademicYear::factory(5)->create();
    }
}
