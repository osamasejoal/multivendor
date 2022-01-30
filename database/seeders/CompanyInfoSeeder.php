<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company_infos')->insert([
            'name' => 'ToHoney',
            'phone' => '+8801962193675',
            'email' => 'tohoney@mail.com',
            'address' => '11/32, Dhanmondi, Dhaka, 1206',
            'logo' => 'default_logo.png',
        ]);

    }
}
