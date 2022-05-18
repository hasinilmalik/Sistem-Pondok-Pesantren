<?php

namespace App\View\Components\Form;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $type;
    public $label;
    public $placeholder;
    public $value;
    public $input;
    public function __construct($name, $type='', $label='', $placeholder='', $value='', $input='')
    {
        $this->name = $name;
        $this->type = $type;
        $new_label = str_replace('_', ' ', ucfirst($name));
        $this->label = $label ?: $new_label;
        $this->placeholder = $placeholder;
        $this->value =$value;
        $this->input = $input;
    }
    public function render()
    {
        return view('components.form.input');

    }
}