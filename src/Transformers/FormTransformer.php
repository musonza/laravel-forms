<?php

namespace Musonza\Form\Transformers;

class FormTransformer extends Transformer
{
    public function transform($form)
    {
        return [
            'id' => $form->id,
            'title' => $form->title,
            'description' => $form->description,
            'created_at' => $form->created_at,
        ];
    }
}
