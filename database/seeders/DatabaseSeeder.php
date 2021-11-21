<?php

namespace Database\Seeders;

use App\Models\Missions;
use App\Models\Properties;
use App\Models\UsersMissions;
use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //User::factory(10)->create();
        User::factory()->create([
            'id' => 0,
            'name' => 'System',
            'email' => 'system@ukr.net',
            'password' => 'абвгд'
        ]);
        User::factory()->create([
           'name' => 'Andriy',
           'email' => 'limertoy@ukr.net',
           'password' => '$2y$10$Hc0Gp5j0Yn5SKycPdTicCOgc/k/eVR.jliaoRRiWdSdUD79LPPKSK',
            'is_admin' => true,
        ]);
        User::factory()->create([
            'name' => 'Limertoy',
            'email' => 'adamovich_avav@ukr.net',
            'password' => '$2y$10$Hc0Gp5j0Yn5SKycPdTicCOgc/k/eVR.jliaoRRiWdSdUD79LPPKSK',
            'is_moderator' => true
        ]);
        User::factory()->create([
            'name' => 'Limerkek',
            'email' => 'limerkek@ukr.net',
            'password' => '$2y$10$Hc0Gp5j0Yn5SKycPdTicCOgc/k/eVR.jliaoRRiWdSdUD79LPPKSK'
        ]);




        $this->call(PropertiesSeeder::class);
        $this->call(ItemsSeeder::class);
        $this->call(MissionsSeeder::class);
        $this->call(UsersMissionsSeeder::class);
        $this->call(StatsSeeder::class);
    }
}
