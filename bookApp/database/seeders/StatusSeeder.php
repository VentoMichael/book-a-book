<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create(['name' => 'ordered']);
        Status::create(['name' => 'paid']);
        Status::create(['name' => 'available']);
        Status::create(['name' => 'delivered']);
    }
}
