<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\NoReturn;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class DrgTable extends TableComponent
{


    public function query(): Builder
    {
        return \App\Models\DrgPeople::query();
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')->sortable(),
            Column::make("Ім'я (ru)", 'name_ru')->searchable()->sortable(),
            Column::make("Ім'я (lt)", 'name_lt')->searchable()->sortable(),
            Column::make("Дата народження", 'date_of_birthday')->searchable()->sortable(),
            Column::make("Паспорт", 'passport')->searchable()->sortable(),

            Column::make("Паспорт Id", 'passport_id')->searchable()->sortable(),
            Column::make("Адреса", 'address')->searchable()->sortable(),
            Column::make("phones", 'phones')->view('components.phones')->searchable(),

            Column::make("Фото", 'photo')->view('components.image'),

            Column::make('Створено', 'created_at')->searchable()->sortable(),
            Column::make('Оновлено', 'updated_at')->searchable()->sortable(),
        ];
    }

    #[NoReturn] public function deleteChecked()
    {
        \App\Models\DrgPeople::whereIn('id', $this->checkbox_values)->delete();
        $this->checkbox_values = [];
    }
}
