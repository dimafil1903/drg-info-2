<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DrgPeople extends Component
{
    public $phone;
    public $inputs = [];
    public $i = 1;

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function render()
    {
        return view('livewire.drg-people');
    }
}
