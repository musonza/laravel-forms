<?php

namespace Musonza\Form\Fields;

class Select extends FormField
{
    protected $controlType = 'select';
    protected $hasChoices = true;

    public function input()
    {
        $selected = '';

        $attributes = $this->attributes($this->attributes);
        $html = "<select{$attributes}>";
        foreach ($this->options as $value => $label) {
            if ($value == $selected) {
                $selectedAttribute = ' selected="selected"';
            } else {
                $selectedAttribute = '';
            }
            $html .= '<option value="' . $value . '"' . $selectedAttribute . '>' . $label . '</option>';
        }
        return $html . '</select>';
    }
}
