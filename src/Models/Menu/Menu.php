<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_name',
        'title',
        'order',
        'parent',
        'lnk',
    ];
}
