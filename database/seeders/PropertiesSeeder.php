<?php

namespace Database\Seeders;

use App\Models\Properties;
use Illuminate\Database\Seeder;
use PhpParser\Builder;

class PropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @mixin Builder
     * @return void
     */
    public function run()
    {
        $properties = [
            [
                'id' => 1,
                'name' => 'START',
                'price' => 0,
                'type' => 'start',
                'family' => 'corner'
            ],
            [
                'id' => 2,
                'name' => 'KSERO',
                'price' => 550,
                'type' => 'field',
                'family' => 'prints'
            ],
            [
                'id' => 3,
                'name' => 'SZANSA',
                'price' => 0,
                'type' => 'start',
                'family' => 'chance'
            ],
            [
                'id' => 4,
                'name' => 'DRUK',
                'price' => 200,
                'type' => 'field',
                'family' => 'prints'
            ],
            [
                'id' => 5,
                'name' => 'UBEZPIECZENIE',
                'price' => 1000,
                'type' => 'fine',
                'family' => 'fine'
            ],
            [
                'id' => 6,
                'name' => 'NAUKI HUMAN.',
                'price' => 300,
                'type' => 'field',
                'family' => 'science'
            ],
            [
                'id' => 7,
                'name' => 'PUSTO',
                'price' => 400,
                'type' => 'field',
                'family' => 'empty'
            ],
            [
                'id' => 8,
                'name' => 'SZANSA',
                'price' => 0,
                'type' => 'chance',
                'family' => 'chance'
            ],
            [
                'id' => 9,
                'name' => 'PUSTO',
                'price' => 450,
                'type' => 'field',
                'family' => 'empty'
            ],
            [
                'id' => 10,
                'name' => 'PUSTO',
                'price' => 500,
                'type' => 'field',
                'family' => 'empty'
            ],
            [
                'id' => 11,
                'name' => 'DZIEKANAT',
                'price' => 0,
                'type' => 'prison',
                'family' => 'corner'
            ],
            [
                'id' => 12,
                'name' => 'NEURON',
                'price' => 200,
                'type' => 'field',
                'family' => 'club'
            ],
            [
                'id' => 13,
                'name' => 'BUR',
                'price' => 250,
                'type' => 'start',
                'family' => 'webpage'
            ],
            [
                'id' => 14,
                'name' => 'KAUKAZ',
                'price' => 550,
                'type' => 'field',
                'family' => 'club'
            ],
            [
                'id' => 15,
                'name' => 'MECHATRON',
                'price' => 550,
                'type' => 'field',
                'family' => 'club'
            ],
            [
                'id' => 16,
                'name' => 'NAUKI MEDYCZNE',
                'price' => 200,
                'type' => 'field',
                'family' => 'science'
            ],
            [
                'id' => 17,
                'name' => 'MUR',
                'price' => 550,
                'type' => 'field',
                'family' => 'school'
            ],
            [
                'id' => 18,
                'name' => 'SZANSA',
                'price' => 0,
                'type' => 'chance',
                'family' => 'chance'
            ],
            [
                'id' => 19,
                'name' => 'UTW',
                'price' => 200,
                'type' => 'field',
                'family' => 'school'
            ],
            [
                'id' => 20,
                'name' => 'LICEUM',
                'price' => 200,
                'type' => 'field',
                'family' => 'school'
            ],
            [
                'id' => 21,
                'name' => 'AUTOMAT KAWOWY',
                'price' => 0,
                'type' => 'free',
                'family' => 'corner'
            ],
            [
                'id' => 22,
                'name' => 'MOST',
                'price' => 200,
                'type' => 'field',
                'family' => 'program'
            ],
            [
                'id' => 23,
                'name' => 'NAWA',
                'price' => 200,
                'type' => 'field',
                'family' => 'program'
            ],
            [
                'id' => 24,
                'name' => 'SZANSA',
                'price' => 0,
                'type' => 'chance',
                'family' => 'chance'
            ],
            [
                'id' => 25,
                'name' => 'ERASMUS+',
                'price' => 200,
                'type' => 'field',
                'family' => 'program'
            ],
            [
                'id' => 26,
                'name' => 'NAUKI PRZYR.',
                'price' => 200,
                'type' => 'field',
                'family' => 'program'
            ],
            [
                'id' => 27,
                'name' => 'ĆWICZENIA',
                'price' => 200,
                'type' => 'field',
                'family' => 'classes'
            ],
            [
                'id' => 28,
                'name' => 'LABORATORIA',
                'price' => 200,
                'type' => 'field',
                'family' => 'classes'
            ],
            [
                'id' => 29,
                'name' => 'WU',
                'price' => 200,
                'type' => 'field',
                'family' => 'webpage'
            ],
            [
                'id' => 30,
                'name' => 'WYKŁAD',
                'price' => 200,
                'type' => 'field',
                'family' => 'classes'
            ],
            [
                'id' => 31,
                'name' => 'IDŹ DO DZIEKANATU',
                'price' => 0,
                'type' => 'go_to_prison',
                'family' => 'corner'
            ],
            [
                'id' => 32,
                'name' => 'FILON',
                'price' => 200,
                'type' => 'field',
                'family' => 'dormitory'
            ],
            [
                'id' => 33,
                'name' => 'SZANSA',
                'price' => 0,
                'type' => 'chance',
                'family' => 'chance'
            ],
            [
                'id' => 34,
                'name' => 'LAURA',
                'price' => 200,
                'type' => 'field',
                'family' => 'dormitory'
            ],
            [
                'id' => 35,
                'name' => 'OLIMP',
                'price' => 200,
                'type' => 'field',
                'family' => 'dormitory'
            ],
            [
                'id' => 36,
                'name' => 'NAUKI SPOŁ.',
                'price' => 200,
                'type' => 'field',
                'family' => 'program'
            ],
            [
                'id' => 37,
                'name' => 'SZANSA',
                'price' => 0,
                'type' => 'chance',
                'family' => 'chance'
            ],
            [
                'id' => 38,
                'name' => 'TARGI PRACY',
                'price' => 200,
                'type' => 'field',
                'family' => 'festival'
            ],
            [
                'id' => 39,
                'name' => 'IMPREZA',
                'price' => 200,
                'type' => 'fine',
                'family' => 'fine'
            ],
            [
                'id' => 40,
                'name' => 'KULTURALIA',
                'price' => 200,
                'type' => 'field',
                'family' => 'festival'
            ],
        ];
        foreach($properties as $property){
            Properties::create($property);
        }
    }
}
