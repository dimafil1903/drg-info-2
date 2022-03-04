<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\NoReturn;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class UserTable extends TableComponent
{


    public function query(): Builder
    {
        return User::query()->where('id', '!=', auth()->user()->id);
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')->sortable(),
            Column::make("Ім'я", 'name')->searchable()->sortable(),
            Column::make("E-mail", 'email')->searchable()->sortable(),
            Column::make("Фото", 'photo')->view('components.image'),

            Column::make('Створено', 'created_at')->searchable()->sortable(),
            Column::make('Оновлено', 'updated_at')->searchable()->sortable(),
        ];
    }

    #[NoReturn] public function deleteChecked()
    {
        User::whereIn('id', $this->checkbox_values)->delete();
        $this->checkbox_values = [];
    }
}
