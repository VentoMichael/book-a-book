<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reservation::create([
            'book_id' => '1',
            'order_id' => '1',
            'quantity' => '23'
        ]);
        Reservation::create([
            'book_id' => '3',
            'order_id' => '1',
            'quantity' => '2'
        ]);
        Reservation::create([
            'book_id' => '2',
            'order_id' => '1',
            'quantity' => '23'
        ]);
        Reservation::create([
            'book_id' => '10',
            'order_id' => '1',
            'quantity' => '2'
        ]);
        Reservation::create([
            'book_id' => '5',
            'order_id' => '1',
            'quantity' => '23'
        ]);
    }
}
