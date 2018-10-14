<?php

namespace Musonza\Form\Transformers;

class FormTransformer extends Transformer
{
    protected $availableIncludes = ['questions'];
    protected $defaultIncludes = [];

    public function transform($form)
    {
        return [
            'id' => $form->id,
            'title' => $form->title,
            'description' => $form->description,
            'created_at' => $form->created_at,
        ];
    }

    public function includeQuestions($form)
    {
        return $this->collection($form->questions, new FieldTransformer());
    }
}
