<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->insert([
            'phone' => '6 56 29 69 92',
            'contact_email' => "contact@shoc.com",
            'booking_email' => 'booking@shoc.com',
            'tech_email' => 'tech@shop.com',
            'location' => 'Bafoussam, Cameroun'
        ]);
    }
}
