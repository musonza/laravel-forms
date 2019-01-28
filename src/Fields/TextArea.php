<?php

namespace Musonza\Form\Fields;

class TextArea extends FormField
{
    protected $controlType = 'textarea';

    public function input()
    {
        $value = '';
        $this->attributes['class'] = "form-control";
        $attributes = $this->attributes($this->attributes);
        return "<textarea{$attributes}>" . e($value) . "</textarea>";
    }
}
