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
            'render' => $question->field()->render(),
            'options' => $question->options,
        ];
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
