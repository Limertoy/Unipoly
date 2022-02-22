<?php

namespace Database\Seeders;

use App\Models\Chances;
use Illuminate\Database\Seeder;

class ChancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chances = [
            [
                'text' => ' idzie na Start i otrzymuje 200 zł.',
                'amount' => 200,
                'goto' => 1,
                'type' => 'go'
            ],
            [
                'text' => ' idzie na pole "Laboratoria". Jeżeli przechodzi przez pole "Start", otrzymuję 200 zł.',
                'amount' => 200,
                'goto' => 28,
                'type' => 'go'
            ],
            [
                'text' => ' idzie na pole "Kulturalia".',
                'goto' => 28,
                'type' => 'go'
            ],
            [
                'text' => ' płaci mandat za przyspieszenie - 100 zł.',
                'amount' => 100,
                'type' => 'ticket'
            ],
            [
                'text' => ' idzie do Dziekanatu załatwić sprawy.',
                'goto' => 11,
                'type' => 'prison'
            ],
            [
                'text' => ' dostaję 40 zł przez błąd systemu.',
                'amount' => 40,
                'type' => 'gain'
            ],
            [
                'text' => ' spóźnił się na zajęcia. Musi zapłacić mandat 50 zł.',
                'amount' => 50,
                'type' => 'ticket'
            ],
            [
                'text' => ' otrzymuje wynagrodzenie za bardzo dobre oceny - 50 zł.',
                'amount' => 50,
                'type' => 'gain'
            ],
            [
                'text' => ' nie zdążył zaliczyć sesje, musi zapłacić 100 zł za warunek.',
                'amount' => 50,
                'type' => 'ticket'
            ],
            [
                'text' => ' idzie na pole "Mechatron". Jeżeli przechodzi przez pole "Start", otrzymuję 200 zł.',
                'amount' => 200,
                'goto' => 15,
                'type' => 'go'
            ],
            [
                'text' => ' zrobił błędy w projekcie. Zapłaci 30 zł.',
                'amount' => 30,
                'type' => 'ticket'
            ],
            [
                'text' => ' wygrał w zdrapkach 400 zł.',
                'amount' => 400,
                'type' => 'gain'
            ],
            [
                'text' => ' stracił legitymację studencką. Opłata za wyrobienie nowej - 100 zł.',
                'amount' => 100,
                'type' => 'ticket'
            ],
            [
                'text' => ' dostał stypendium. Otrzymujesz 100 zł.',
                'amount' => 100,
                'type' => 'gain'
            ],
            [
                'text' => ' zaliczył sesje w pierwszym terminie. Dostałeś 75 zł.',
                'amount' => 75,
                'type' => 'gain'
            ],
            [
                'text' => ' zgubił bilet w autobusie. Mandat 50 zł.',
                'amount' => 50,
                'type' => 'gain'
            ],

        ];

        foreach($chances as $chance){
            Chances::create($chance);
        }
    }
}
