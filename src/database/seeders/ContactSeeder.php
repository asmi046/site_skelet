<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("contacts")->insert(
            [
                [
                    'name' => 'site_name',
                    'title' => 'Имя сайта',
                    'value' => 'СвайМастер',
                ],

                [
                    'name' => 'phone',
                    'title' => 'Телефон',
                    'value' => '+7 (3462) 59-71-71',
                ],

                [
                    'name' => 'phone_2',
                    'title' => 'Телефон',
                    'value' => '+7 904 450 32 07',
                ],

                [
                    'name' => 'tg_lnk',
                    'title' => 'Ссылка  на Телеграм',
                    'value' => 'tg://resolve?domain=ekaterems',
                ],

                [
                    'name' => 'ws_lnk',
                    'title' => 'Ссылка  на WhatsApp',
                    'value' => 'https://wa.me/79044503207',
                ],

                [
                    'name' => 'adress',
                    'title' => 'Адрес компании',
                    'value' => '628414, г. Сургут, улица Маяковского, 57, ТЦ Гуливер',
                ],

                [
                    'name' => 'work_time',
                    'title' => 'Время работы',
                    'value' => 'Пн-Пт 09:00 - 18:00 Сб-Вс 10:00 - 15:00',
                ],

                [
                    'name' => 'email',
                    'title' => 'E-mail',
                    'value' => 'zabor.86@internet.ru',
                ],

                [
                    'name' => 'company_name',
                    'title' => 'Имя компании',
                    'value' => 'ИП Хамроев Сарвар Султонбоевич ',
                ],

                [
                    'name' => 'inn',
                    'title' => 'ИНН',
                    'value' => '860249669343',
                ],

                [
                    'name' => 'ogrn',
                    'title' => 'ОГРН',
                    'value' => '322861700036299',
                ],

                [
                    'name' => 'rs',
                    'title' => 'Р/С',
                    'value' => '860249669343 ',
                ],

                [
                    'name' => 'person',
                    'title' => 'Контактное лицо',
                    'value' => 'Хамроев Сарвар Султонбоевич',
                ],

                [
                    'name' => 'geo',
                    'title' => 'Кординаты',
                    'value' => '61.26667125324669,73.42057220370485',
                ],

            ]
        );
    }
}
