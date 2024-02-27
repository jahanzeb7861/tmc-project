<?php

namespace App\View\Components;

use App\Models\Event;
use Closure;
use Illuminate\View\Component; 

class EventsComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $events;

    public function __construct()
    {
        // Use $this->events to assign the retrieved events to the class property
        $this->events = Event::where('is_publish', 'publish')->orderBy('id', 'desc')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.events');
    }
}
