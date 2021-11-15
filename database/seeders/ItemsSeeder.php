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
                'img' => 'empty',
            ],
            [
                'id' => 2,
                'name' => 'Pionek "Gwiazda"',
                'type' => 'pawn',
                'rarity' => 'rare',
                'img' => 'empty',
            ],
            [
                'id' => 3,
                'name' => 'Kości NAZWA',
                'type' => 'dice',
                'rarity' => 'rare',
                'img' => 'empty',
            ],
            [
                'id' => 4,
                'name' => 'Kości CZAT',
                'type' => 'dice',
                'rarity' => 'secret',
                'img' => 'empty',
            ],
            [
                'id' => 5,
                'name' => 'Elektroniczne kości',
                'type' => 'dice',
                'rarity' => 'contraband',
                'img' => 'empty',
            ],
            [
                'id' => 6,
                'name' => 'Pionek "Cicho!"',
                'type' => 'pawn',
                'rarity' => 'secret',
                'img' => 'empty',
            ],

        ];
        foreach ($items as $item){
            Items::create($item);
        }
    }
}
