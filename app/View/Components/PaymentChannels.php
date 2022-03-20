<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PaymentChannels extends Component
{
    public $channel;
    public function __construct($channel)
    {
        $this->channel = $channel;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.payment-channels');
    }
}
