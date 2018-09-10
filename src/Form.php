<?php

namespace Musonza\Form;

use Musonza\Form\Services\AnswerService;
use Musonza\Form\Services\FormService;
use Musonza\Form\Services\QuestionService;

class Form
{
    protected $formService;

    public function __construct(
        FormService $formService,
        QuestionService $questionService,
        AnswerService $answerService) {
        $this->formService = $formService;
        $this->questionService = $questionService;
        $this->answerService = $answerService;
    }

    public function create(array $data)
    {
        return $this->formService->create($data);
    }

    public function formService()
    {
        return $this->formService;
    }

    public function createQuestion(array $data)
    {
        return $this->questionService->create($data);
    }

    public function questionService()
    {
        return $this->questionService;
    }

    public function answerService()
    {
        return $this->answerService;
    }
}
