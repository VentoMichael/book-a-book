<?php

namespace Database\Seeders;

use App\Models\StatusChanges;
use Illuminate\Database\Seeder;

class StatusChangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusChanges::create([
            'status_id' => '2',
            'order_id' => '1'
        ]);
    }
}
