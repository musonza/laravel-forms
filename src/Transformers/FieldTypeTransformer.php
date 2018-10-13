<?php

namespace Musonza\Form\Transformers;

class FieldTypeTransformer extends Transformer
{
    public function transform($field)
    {
        return [
            'id' => 1,
            'title' => $this->title($field),
        ];
    }

    protected function title($field)
    {
        return substr($field, strrpos($field, '\\') + 1);
    }
}
