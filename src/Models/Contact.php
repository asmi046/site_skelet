<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Contact extends Model
{
    public $fillable = [
        'name',
        'title',
        'value',
    ];

    public static function allFromCacheName(): Collection
    {
        return Cache::rememberForever('all_contacts_name', function () {
            return self::query()->get()->keyBy('name');
        });
    }

    public static function allFromCacheTitle(): Collection
    {
        return Cache::rememberForever('all_contacts_title', function () {
            return self::query()->get()->keyBy('title');
        });
    }
}
