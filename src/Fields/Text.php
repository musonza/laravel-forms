<?php

namespace Musonza\Form\Fields;

class Text extends FormField
{
    protected $controlType = 'text';

    public function render()
    {
        return "<input{$this->getAttributes()}>";
    }
}
