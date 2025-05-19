<?php

namespace App\Livewire\Front\Components;

use Livewire\Component;

class RatingComponent extends Component
{
    public $rate = 3;
    public function render()
    {
        return view('livewire.front.components.rating-component');
    }
}
