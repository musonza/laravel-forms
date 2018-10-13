<?php

namespace Musonza\Form\Transformers;

class AnswerTransformer extends Transformer
{
    public function transform($answer)
    {
        return array_merge(
            $answer->toArray(),
            [
                'response' => $answer->question->options ? $answer->question->options[$answer->value] : $answer->value,
                'question' => $answer->question,
            ]
        );
    }
}
