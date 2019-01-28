<?php

namespace Musonza\Form\Transformers;

use Musonza\Form\Transformers\Transformer;

class SubmissionTransformer extends Transformer
{
    protected $availableIncludes = ['answers'];
    protected $defaultIncludes = [];

    public function transform($submission)
    {
        return [
            'id' => $submission->id,
            'form_id' => $submission->form_id,
            'ip_address' => $submission->ip_address,
            'response' => $submission->response,
            'is_complete' => $submission->is_complete,
            'created_at_readable' => $submission->created_at->diffForHumans(),
            'created_at' => $submission->created_at,
            'updated_at' => $submission->updated_at,
        ];
    }

    public function includeAnswers($submission)
    {
        return $this->collection($submission->answers, new AnswerTransformer());
    }
}
