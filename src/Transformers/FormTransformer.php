<?php

namespace Musonza\Form\Transformers;

class FormTransformer extends Transformer
{
    protected $availableIncludes = ['questions'];
    protected $defaultIncludes = [];

    public function transform($form)
    {
        $statuses = config('laravel_forms.form_statuses');

        return [
            'id' => $form->id,
            'title' => $form->title,
            'description' => $form->description,
            'created_at' => $form->created_at,
            'status' => [
                'value' => (int)$form->status,
                'label' => $statuses[$form->status]['label'],
                'class' => $statuses[$form->status]['class'],
            ],
            'statuses' => $statuses,
            'submissions_count' => $form->submissions->count(),
        ];
    }

    public function includeQuestions($form)
    {
        return $this->collection($form->questions, new FieldTransformer());
    }
}
