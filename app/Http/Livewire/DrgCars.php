<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DrgCars extends Component
{

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.drg-cars');
    }
}
