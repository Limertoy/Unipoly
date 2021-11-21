<?php

namespace Database\Seeders;

use App\Models\Items;
use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'id' => 1,
                'name' => 'Pionek "Trójkąt"',
                'type' => 'pawn',
                'rarity' => 'ordinary',
                'img' => '/img/triangle_pawn.png',
            ],
            [
                'id' => 2,
                'name' => 'Pionek "Gwiazda"',
                'type' => 'pawn',
                'rarity' => 'rare',
                'img' => '/img/stars_pawn.png',
            ],
            [
                'id' => 3,
                'name' => 'Kości NAZWA',
                'type' => 'dice',
                'rarity' => 'rare',
                'img' => '/img/forest_dice.png',
            ],
            [
                'id' => 4,
                'name' => 'Kości CZAT',
                'type' => 'dice',
                'rarity' => 'secret',
                'img' => '/img/elegancy_dice.png',
            ],
            [
                'id' => 5,
                'name' => 'Elektroniczne kości',
                'type' => 'dice',
                'rarity' => 'contraband',
                'img' => '/img/spring_dice.png',
            ],
            [
                'id' => 6,
                'name' => 'Pionek "Cicho!"',
                'type' => 'pawn',
                'rarity' => 'secret',
                'img' => '/img/silence_pawn.png',
            ],
        ];
        foreach ($items as $item){
            Items::create($item);
        }
    }
}
