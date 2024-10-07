<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;


use App\Models\Menu\Menu;
use MoonShine\Fields\Url;
use MoonShine\Fields\Text;
use MoonShine\Fields\Field;
use MoonShine\Fields\Number;
use MoonShine\Fields\Select;
use MoonShine\Fields\Switcher;
use MoonShine\Decorations\Block;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Menu>
 */
class MenuResource extends ModelResource
{
    protected string $model = Menu::class;

    protected string $title = 'Меню';
    protected string $column = 'title';

    public function import(): ?ImportHandler
    {
        return null;
    }

    public function export(): ?ExportHandler
    {
        return null;
    }

    public function filters(): array
    {
        return [
            Select::make('Выберите меню', 'menu')
            ->options([
                'Главное меню' => 'Главное меню',
                'Дополнительная информация' => 'Дополнительная информация'

            ])->nullable()->placeholder('Выберите пункт меню')
        ];
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Название', 'title'),
                Text::make('Ссылка', 'lnk'),
                Text::make('Меню', 'menu'),
                Number::make('Порядок сортировки', 'order')->sortable(),
            ]),
        ];
    }

    /**
     * @param Menu $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
