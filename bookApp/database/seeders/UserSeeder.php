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
            'name'=> 'Toto',
            'surname' => 'Vento',
            'email'=>'vento@hotmail.com',
            'password'=>Hash::make('azeazeaze')
        ]);
        User::factory()->times(5)->create();
    }
}
