<?php

namespace Musonza\Form\Fields;

class Radio extends FormField
{
    protected $controlType = 'radio';
    protected $hasChoices = true;

    public function input()
    {
        $this->attributes['class'] = "";
        $attributes = $this->attributes($this->attributes);

        $html = "";

        foreach ($this->options as $value => $label) {
            $html .= '<input type="' . $this->controlType
                . '" '
                . $attributes
                . ' value="'
                . $value
                . '"> '
                . $label
                . '<br>';
        }

        return $html;
    }
}
