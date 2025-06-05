<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Contact;
use MoonShine\UI\Fields\ID;

use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use Illuminate\Database\Eloquent\Model;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Laravel\Resources\ModelResource;

/**
 * @extends ModelResource<Contact>
 */
class ContactResource extends ModelResource
{
    protected string $model = Contact::class;

    protected string $title = 'Контакты';

    protected string $column = 'title';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Имя параметра', 'name'),
            Text::make('Название', 'title'),
            Textarea::make('Значение', 'value'),
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make(),
                Text::make('Имя параметра', 'name'),
                Text::make('Название', 'title'),
                Textarea::make('Значение', 'value'),
            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make(),
            Text::make('Имя параметра', 'name'),
            Text::make('Название', 'title'),
            Textarea::make('Значение', 'value'),
        ];
    }


    protected function filters(): iterable
    {
        return [
            Text::make('Название', 'title'),
            Text::make('Значение', 'value'),
        ];
    }

    /**
     * @param Contact $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [
            'name' => ['required'],
            'title' => ['required'],
        ];
    }
}
