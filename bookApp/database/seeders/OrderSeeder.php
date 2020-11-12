<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'user_id' => '2',
            'academic_year_id' => '1'
        ]);
        Order::create([
            'user_id' => '2',
            'academic_year_id' => '1'
        ]);
    }
}
