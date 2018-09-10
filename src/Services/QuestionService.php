<?php

namespace Musonza\Form\Services;

use Musonza\Form\Models\Form;
use Musonza\Form\Models\Question;

class QuestionService
{
    public function __construct(Form $form, Question $question)
    {
        $this->form = $form;
        $this->question = $question;
    }

    public function create(array $data)
    {
        return $this->question->create($data);
    }

    public function getById($id)
    {
        return $this->question->findOrFail($id);
    }
}
