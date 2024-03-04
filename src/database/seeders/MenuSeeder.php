<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("menus")->insert(
            [
                [
                    'lnk' => "/audioroliki",
                    'order' => 1,
                    'title' => "Изготовление аудиороликов",
                ],
                [
                    'lnk' => "/dictori",
                    'order' => 2,
                    'title' => "Дикторские голоса",
                ],

                [
                    'lnk' => "/prognoz-pogodi",
                    'order' => 3,
                    'title' => "Прогноз погоды",
                ],

            ]);


    }
}
