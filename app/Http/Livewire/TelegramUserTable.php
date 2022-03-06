<?php

namespace App\Http\Livewire;

use App\Models\TelegramUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\NoReturn;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class TelegramUserTable extends TableComponent
{


    public function query(): Builder
    {
        return TelegramUser::query();
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'user_id')->sortable(),
            Column::make("Ім'я", 'first_name')->searchable()->sortable(),
            Column::make("Прізвище", 'last_name')->searchable()->sortable(),
            Column::make("Нікнейм", 'username')->searchable()->sortable(),
            Column::make("Телефон", 'phone')->searchable()->sortable(),

            Column::make('Створено', 'created_at')->searchable()->sortable(),
            Column::make('Оновлено', 'updated_at')->searchable()->sortable(),
            Column::make('Дії', 'enabled')->view('components.banned'),

        ];
    }

    #[NoReturn] public function ban($id)
    {
        TelegramUser::where('id', $id)->update(['enabled' => false]);
    }

    #[NoReturn] public function unban($id)
    {
        TelegramUser::where('id', $id)->update(['enabled' => true]);
    }
}
