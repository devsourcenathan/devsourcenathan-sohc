<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('configs')->insert([
            'phone' => '6 56 29 69 92',
            'contact_email' => "contact@shoc.com",
            'booking_email' => 'booking@shoc.com',
            'tech_email' => 'tech@shoc.com',
            'location' => 'Bafoussam, Cameroun'
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$Vuym7TV2g7frga4aCDDZp.FaCs6E1YfzHuO9L5c1NJtm/BA2/xlxy',
            'type' => 'admin'
        ]);
    }
}
