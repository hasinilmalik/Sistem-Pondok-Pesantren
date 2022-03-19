<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PaymentChannels extends Component
{
    public $item;
    public $name;
    public $code;
    public function __construct($name,$code,$item)
    {
        $this->item = $item;
        $this->name = $name;
        $this->code = $code;
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
