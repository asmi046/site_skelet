<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                'title' => 'Политика конфиденциальности',
                'slug' => Str::slug("Политика конфиденциальности"),
                'menu' => '',
                'description' => file_get_contents(public_path('page_text//policy.html')),
            ],

            [
                'title' => 'О нас',
                'slug' => Str::slug("О нас"),
                'menu' => '',
                'description' => file_get_contents(public_path('page_text//about.html')),
            ],
        ];



        foreach ($data as $item) {
            // Storage::disk('public')->put("main_bnr.webp", file_get_contents(public_path('img/main_bnr.webp')), 'public');
            DB::table("pages")->insert($item);

            // DB::table("seo_data")->insert(
            //     [
            //         'url' => 'page/'.$item['slug'],
            //         'seo_title' => $item['title'],
            //         'seo_description' => $item['title'],
            //     ]
            // );
        }



    }
}
