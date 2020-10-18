<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'surname' => 'Michael',
            'name' => 'Vento',
            'email' => 'michael.vento@hotmail.com',
            'password' => Hash::make('michael')
        ]);
        User::factory()->times(5)->create();
    }
}
