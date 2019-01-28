<?php

namespace Musonza\Form\Transformers;

class FieldTypeTransformer extends Transformer
{
    public function transform($field)
    {
        $fieldObj = app($field);

        return [
            'id' => $field,
            'title' => $this->title($field),
            'has_choices' => $fieldObj->hasChoices(),
        ];
    }

    protected function title($field)
    {
        return substr($field, strrpos($field, '\\') + 1);
    }
}
