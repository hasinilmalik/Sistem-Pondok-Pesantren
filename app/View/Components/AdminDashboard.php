<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminDashboard extends Component
{
    public $putra;
    public $putri;
    public $alumni;
    public function __construct($putra, $putri,$alumni)
    {
        $this->putra = $putra;
        $this->putri = $putri;
        $this->alumni = $alumni;
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
