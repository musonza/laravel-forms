<?php

namespace Musonza\Form\Fields;

use Musonza\Form\Models\Form;
use Musonza\Form\Models\Question;

abstract class FormField
{
    protected $controlType = null;
    protected $validations = '';
    protected $required = false;
    protected $name;
    protected $fieldHtmlId;
    protected $hasChoices = false;
    protected $question;

    /**
     * [__construct description]
     * @param string $name    [description]
     * @param array  $options [description]
     */
    public function __construct(Question $question, $options = [])
    {
        $this->question = $question;
        $this->name = "field_{$question->id}";
        $this->options = $options;
        $this->fieldHtmlId = $this->nameToId();
    }

    protected function input()
    {
        $this->attributes['type'] = $this->controlType;
        $this->attributes['value'] = $this->question->value;
        $this->attributes['placeholder'] = $this->question->placeholder;
        $this->attributes = $this->attributes($this->attributes);

        $input = '<input' . $this->attributes . '>';

        //dd($input);

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

        if ($this->question->is_required) {
            $this->attributes['required'] = true;
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
