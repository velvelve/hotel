<?php

namespace App\View\Components\Rooms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Slider extends Component
{
    /**
     * CreateBookingRequest a new component instance.
     */

    public function __construct(public $rooms)
    {
        //
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.slider.slider');
    }
}
