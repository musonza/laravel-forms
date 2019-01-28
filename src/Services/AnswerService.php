<?php

namespace Musonza\Form\Services;

use Musonza\Form\Models\Answer;
use Musonza\Form\Models\Form;

class AnswerService
{
    public function __construct(Form $form, Answer $answer)
    {
        $this->form = $form;
        $this->answer = $answer;
    }

    public function getById($id)
    {
        return $this->answer->findOrFail($id);
    }
}
