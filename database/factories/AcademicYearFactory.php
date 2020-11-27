<?php

namespace Database\Factories;

use App\Models\AcademicYear;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class AcademicYearFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AcademicYear::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $startYear = '2015-12-31 00:00:00';
        $date = Carbon::create($startYear);
        return [
            'starting_year' => $startYear,
            'ending_year' => $date->addYear(3)->format('Y-m-d H:i:s'),
        ];
    }
}
