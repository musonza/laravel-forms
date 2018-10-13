<?php

namespace Musonza\Form\Fields;

class Radio extends FormField
{
    protected $controlType = 'radio';
    protected $hasChoices = true;

    public function radio($name, array $options, $selected, array $attributes = [])
    {
        if (!isset($attributes['name'])) {
            $attributes['name'] = $name;
        }

        if (!isset($attributes['id'])) {
            $attributes['id'] = $this->nameToId();
        }

        $attributes = $this->attributes($attributes);
        $html = "";

        foreach ($options as $value => $label) {
            $html .= '<input type="radio" ' . $attributes . '  value="' . $value . '"> ' . $label . '<br>';
        }
        return $html;
    }
}
