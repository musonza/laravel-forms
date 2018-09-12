<?php

namespace Musonza\Form\Fields;

use Musonza\Form\Models\Form;

abstract class FormField
{
    protected $controlType = null;
    protected $validations = '';
    protected $required = false;
    protected $name;
    protected $fieldHtmlId;
    protected $form;

    public function __construct($name, Form $form, array $options = [])
    {
        $this->name = $name;
        $this->form = $form;
        $this->fieldHtmlId = $this->nameToId();
    }

    protected function getAttributes()
    {
        if ($this->controlType) {
            $attributes['type'] = $this->controlType;
        }

        $attributes['name'] = $this->name;
        $attributes['id'] = $this->fieldHtmlId; // ???

        return $this->attributes($attributes);
    }

    protected function attributes($attributes)
    {
        $html = array();

        foreach ((array) $attributes as $key => $value) {
            if (is_numeric($key)) {
                $key = $value;
            }
            if ($value !== null) {
                $html[] = $key . '="' . e($value) . '"';
            }
        }
        return empty($html) ? '' : ' ' . implode(' ', $html);
    }

    protected function nameToId()
    {
        return str_replace(array('.', '[]', '[', ']'), array('_', '', '_', ''), $this->name);
    }

    abstract public function render();
}
