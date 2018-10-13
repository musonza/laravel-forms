<?php

namespace Musonza\Form\Transformers;

class AnswerTransformer extends Transformer
{
    public function transform($answer)
    {
        return array_merge(
            $answer->toArray(),
            [
                'response' => 'hello',
                'question' => $answer->question,
            ]
        );
    }
}
