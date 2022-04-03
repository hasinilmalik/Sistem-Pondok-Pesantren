<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminDashboard extends Component
{
    public $jumlah;
    public function __construct($jumlah)
    {
        $this->jumlah = $jumlah;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin-dashboard');
    }
}
