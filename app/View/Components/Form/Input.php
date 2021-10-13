<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Input extends Component
{
    public $type;

    public $name;

    public $label;

    public function __construct($type, $name, $label = null)
    {
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
    }

    public function render()
    {
        return view('components.form.input');
    }
}