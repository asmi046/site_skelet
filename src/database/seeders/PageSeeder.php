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

        // Storage::disk('public')->put("main_bnr.webp", file_get_contents(public_path('img/main_bnr.webp')), 'public');

        // DB::table("pages")->insert(
        //     [
        //         [
        //             'title' => 'Тестовая страница',
        //             'slug' => Str::slug("Тестовая страница"),
        //             'img' => Storage::url("main_bnr.webp"),
        //             'description' => 'Тестовая страница Тестовая страница Тестовая страница',
        //             'seo_title' => 'Тестовая страница',
        //             'seo_description' => 'Тестовая страница',
        //         ],
        //         [
        //             'title' => 'Тестовая страница 1',
        //             'slug' => Str::slug("Тестовая страница 1"),
        //             'img' => Storage::url("main_bnr.webp"),
        //             'description' => 'Тестовая страница 1 Тестовая страница Тестовая страница',
        //             'seo_title' => 'Тестовая страница 1',
        //             'seo_description' => 'Тестовая страница 1',
        //         ]
        //     ]);

    }
}
