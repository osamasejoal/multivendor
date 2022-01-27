<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            'name' => 'Osama Sejoal',
            'email' => 'osamasejoal@mail.com',
            'password' => Hash::make('osamasejoal@mail.com'),
            'image' => 'default.png',
            'roll' => '1',
        ]);

    }
}
