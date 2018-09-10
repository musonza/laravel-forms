<?php

namespace Musonza\Form\Tests\Unit;

use Form;
use Musonza\Form\Fields\Text;
use Musonza\Form\Models\Answer;
use Musonza\Form\Tests\TestCase;

class AnswerTest extends TestCase
{
    protected $form;
    protected $question;

    public function setUp()
    {
        parent::setUp();
        $this->form = Form::create(['title' => 'Contact Form']);
        $this->question = Form::createQuestion(
            [
                'title' => 'First Name',
                'label' => 'First Name',
                'description' => 'Description',
                'field_type' => Text::class,
                'form_id' => $this->form->id,
            ]
        );
    }

    public function testCreateFormQuestionAnswer()
    {
        $question = $this->form->questions()->first();
        $answer = $question->answers()->create([
            'value' => 'Jane',
        ]);

        $this->assertInstanceOf(Answer::class, $answer);
    }
}
