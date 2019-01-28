<?php

namespace Musonza\Form\Transformers;

class FieldTransformer extends Transformer
{
    public function transform($question)
    {
        return [
            'id' => $question->id,
            'title' => $question->title,
            'label' => $question->label,
            'field_type' => $question->field_type,
            'field_type_name' => $this->fieldTypeTitle($question->field_type),
            'has_choices' => $this->hasChoices($question->field_type),
            'help_text' => $question->help_text,
            'placeholder' => $question->placeholder,
            'render' => $question->field()->render(),
            'is_required' => $question->is_required,
            'description' => $question->description,
            'validations' => $question->validations,
            'options' => $question->options,
            'options_text' => implode(PHP_EOL, $question->options),
            'position' => $question->position,
            'default_value' => $question->default_value,
            'columns_count' => $question->columns_count ?? 12,
        ];
    }

    protected function fieldTypeTitle($field)
    {
        return substr($field, strrpos($field, '\\') + 1);
    }

    protected function hasChoices($field)
    {
        return app($field)->hasChoices();
    }
}

// "id": {
//     "id": 1,
//     "form_id": "1",
//     "title": "wqeqw",
//     "label": "qweqwe",
//     "place_holder": "qweqwe",
//     "help_text": null,
//     "is_required": true,
//     "description": "eqweqweqwe",
//     "field_type": "Musonza\\Form\\Fields\\CheckBox",
//     "validations": null,
//     "properties": null,
//     "options": [],
//     "created_at": "2018-10-13 16:33:29",
//     "updated_at": "2018-10-13 16:33:29"
// }
