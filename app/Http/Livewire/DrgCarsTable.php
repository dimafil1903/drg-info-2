<?php

namespace App\Http\Livewire;

use App\Models\DrgCar;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\NoReturn;
use Kdion4891\LaravelLivewireTables\Column;
use Kdion4891\LaravelLivewireTables\TableComponent;

class DrgCarsTable extends TableComponent
{


    public function query(): Builder
    {
        return DrgCar::query();
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')->sortable(),
            Column::make("Номер",'number')->searchable()->sortable(),
            Column::make("Фото", 'photo')->view('components.image'),
            Column::make("Примітка", 'description')->searchable()->sortable(),

            Column::make('Створено', 'created_at')->searchable()->sortable(),
            Column::make('Оновлено', 'updated_at')->searchable()->sortable(),
        ];
    }

    #[NoReturn] public function deleteChecked()
    {
        \App\Models\DrgCar::whereIn('id', $this->checkbox_values)->delete();
        $this->checkbox_values = [];
    }
}
