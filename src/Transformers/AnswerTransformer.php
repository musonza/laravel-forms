<?php

namespace Musonza\Form\Transformers;

class AnswerTransformer extends Transformer
{
    public function transform($answer)
    {
        return array_merge(
            $answer->toArray(),
            [
                'response' => $this->getResponse($answer),
                'question' => $answer->question,
            ]
        );
    }

    public function getResponse($answer)
    {
        if ($answer->question->options && isset($answer->question->options[$answer->value])) {
            return $answer->question->options[$answer->value];
        }

        return $answer->value;
    }
}
