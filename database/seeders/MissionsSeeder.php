<?php

namespace Database\Seeders;

use App\Models\Missions;
use Illuminate\Database\Seeder;

class MissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $missions = [
            [
                'id' => 1,
                'name' => 'Siema!',
                'description' => 'Dodaj 1 przyjaciela',
                'goal' => 1,
                'item_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Początek',
                'description' => 'Zagraj jedną grę (Gra powinna trwać conajmniej 10 minut)',
                'goal' => 1,
                'item_id' => 2,
            ],
            [
                'id' => 3,
                'name' => 'Wygranko!',
                'description' => 'Wygraj 1 grę',
                'goal' => 1,
                'item_id' => 3,
            ],
            [
                'id' => 4,
                'name' => 'Słowotok',
                'description' => 'Napisz 100 powiadomień do czatu głównego',
                'goal' => 100,
                'item_id' => 4,
            ],
            [
                'id' => 5,
                'name' => 'Wysoki poziom',
                'description' => 'Wygraj 5 gier',
                'goal' => 5,
                'item_id' => 5,
            ],
            [
                'id' => 6,
                'name' => 'Cicho!',
                'description' => 'Dostań bana czatu',
                'goal' => 1,
                'item_id' => 6,
                'hidden' => true
            ]
        ];
        foreach ($missions as $mission){
            Missions::create($mission);
        }
    }
}
