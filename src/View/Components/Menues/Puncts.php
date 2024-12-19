<?php

namespace App\View\Components\Menues;

use Closure;
use App\Models\Menu\Menu;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Puncts extends Component
{
    public $puncts;
    /**
     * Create a new component instance.
     */
    public function __construct(public string $name = "Главное меню")
    {
        try {
            $this->puncts = Menu::where('menu', $name)->get();
        } catch (\Throwable $e) {
            $this->puncts = null;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menues.puncts');
    }
}
