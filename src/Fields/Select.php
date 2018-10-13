<?php

namespace Musonza\Form\Fields;

class Select extends FormField
{
    protected $controlType = 'select';
    protected $hasChoices = true;

    public function select($name, array $options, $selected, array $attributes = [])
    {
        if (!isset($attributes['name'])) {
            $attributes['name'] = $name;
        }

        if (!isset($attributes['id'])) {
            $attributes['id'] = $this->nameToId();
        }

        $attributes = $this->attributes($attributes);
        $html = "<select{$attributes}>";
        foreach ($options as $value => $label) {
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
