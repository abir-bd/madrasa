<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class CollegeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'college_name' => 'demo',
            'address' => 'dhaka,bangladesh',
            'mobile' => '01254875845',
            'email' => 'democollege@gmail.com',

        ]);
    }
}
