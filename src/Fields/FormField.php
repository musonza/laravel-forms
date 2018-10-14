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
    protected $hasChoices = false;

    /**
     * [__construct description]
     * @param string $name    [description]
     * @param array  $options [description]
     */
    public function __construct(string $name = 'text', $options = [])
    {
        $this->name = $name;
        $this->options = $options;
        $this->fieldHtmlId = $this->nameToId();
    }

    protected function input()
    {
        switch ($type) {
                // case 'textarea':
                //     $this->attributes['class'] = "form-control";
                //     $this->attributes = $this->attributes($this->attributes);
                //     return "<textarea{$attributes}>" . e($value) . "</textarea>";
                //     break;

                // case 'select':
                //     $this->attributes['class'] = "form-control";
                //     $this->attributes = $this->attributes($this->attributes);
                //     return $this->select($name, $this->options, $selected = '', $this->attributes);
                //     break;

                // case 'radio':
                //     $this->attributes = $this->attributes($this->attributes);
                //     return $this->radio($name, $this->options, $selected = '', $this->attributes);
                //     break;

                // case 'checkbox':
                //     $this->attributes = $this->attributes($this->attributes);
                //     return $this->radio($name, $this->options, $selected = '', $this->attributes);
                //     break;

                // default:
                //     $this->attributes['class'] = "form-control";
                //     $this->attributes['type'] = $type;
                //     $this->attributes['value'] = $value;
                //     $this->attributes = $this->attributes($this->attributes);
                //     return '<input' . $this->attributes . '>';
                //     break;
        }

        $this->attributes['type'] = $this->controlType;
        $this->attributes['value'] = '';
        $this->attributes = $this->attributes($this->attributes);
        return '<input' . $this->attributes . '>';
    }

    /**
     * [attributes description]
     * @param  array  $attributes [description]
     * @return [type]             [description]
     */
    protected function attributes(array $attributes)
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

    /**
     * [nameToId description]
     * @return [type] [description]
     */
    protected function nameToId()
    {
        return str_replace(array('.', '[]', '[', ']'), array('_', '', '_', ''), $this->name);
    }

    /**
     * [render description]
     * @return [type] [description]
     */
    public function render()
    {
        if (!isset($this->attributes['name'])) {
            $this->attributes['name'] = $this->name;
        }

        if (!isset($this->attributes['id'])) {
            $this->attributes['id'] = $this->nameToId();
        }

        $this->attributes['class'] = "form-control";

        return $this->input();
    }

    public function hasChoices()
    {
        return $this->hasChoices;
    }
}
