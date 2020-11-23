<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *w
     * @return void
     */
    public function run()
    {
        Status::create(['name' => 'ordered', 'file_name' => 'ordered.public']);
        Status::create(['name' => 'paid', 'file_name' => 'paid.public']);
        Status::create(['name' => 'available', 'file_name' => 'available.public']);
        Status::create(['name' => 'delivered', 'file_name' => 'delivered.public']);
    }
}
