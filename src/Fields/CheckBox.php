<?php

namespace Musonza\Form\Fields;

class CheckBox extends FormField
{
    protected $controlType = 'checkbox';
    protected $hasChoices = true;

    public function input()
    {
        $this->attributes['class'] = "";
        $this->attributes['name'] = "{$this->attributes['name']}[]";

        $html = "";

        foreach ($this->options as $value => $label) {
            $html .= '<input type="checkbox" ' . $this->attributes($this->attributes)
                . '  value="'
                . $value
                . '"> '
                . $label
                . '<br>';
        }
        return $html;
    }
}
