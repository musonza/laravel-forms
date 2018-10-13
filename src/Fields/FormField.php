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
    protected $hasChoices = false;

    /**
     * [__construct description]
     * @param string $name    [description]
     * @param Form   $form    [description]
     * @param array  $options [description]
     */
    public function __construct(Form $form, string $name = 'text', $options = [])
    {
        $this->name = $name;
        $this->form = $form;
        $this->options = $options;
        $this->fieldHtmlId = $this->nameToId();
    }

    /**
     * [input description]
     * @param  string $type       [description]
     * @param  string $name       [description]
     * @param  [type] $value      [description]
     * @param  array  $attributes [description]
     * @return [type]             [description]
     */
    protected function input(string $type, string $name, $value, array $attributes = [])
    {
        if (!isset($attributes['name'])) {
            $attributes['name'] = $this->name;
        }

        if (!isset($attributes['id'])) {
            $attributes['id'] = $this->nameToId();
        }

        switch ($type) {
            case 'textarea':
                $attributes['class'] = "form-control";
                $attributes = $this->attributes($attributes);
                return "<textarea{$attributes}>" . e($value) . "</textarea>";
                break;

            case 'select':
                $attributes['class'] = "form-control";
                return $this->select($name, $this->options, $selected = '', $attributes);
                break;

            case 'radio':
                return $this->radio($name, $this->options, $selected = '', $attributes);
                break;

            default:
                $attributes['class'] = "form-control";
                $attributes['type'] = $type;
                $attributes['value'] = $value;
                $attributes = $this->attributes($attributes);
                return '<input' . $attributes . '>';
                break;
        }
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
        return $this->input($this->controlType, $this->name, $value = '');
    }

    public function hasChoices()
    {
        return $this->hasChoices;
    }
}
