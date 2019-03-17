<?php

namespace Musonza\Form\Tests\Unit;

use Form;
use Musonza\Form\Fields\Text;
use Musonza\Form\Models\Answer;
use Musonza\Form\Models\Submission;
use Musonza\Form\Tests\TestCase;

class AnswerTest extends TestCase
{
    protected $form;
    protected $question;
    protected $answer;

    public function setUp(): void
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

        $submission = $this->form->addSubmission([]);
        $question = $this->form->questions()->first();
        $this->answer = $question->answers()->create([
            'value' => 'Jane',
            'submission_id' => $submission->id,
        ]);
    }

    public function testCreateFormQuestionAnswer()
    {
        $this->assertInstanceOf(Answer::class, $this->answer);
        $this->assertInstanceOf(Submission::class, $this->answer->submission);
    }

    public function testGetAnswerById()
    {
        $answer = Form::answerService()->getById(1);
        $this->assertEquals($this->answer->id, $answer->id);
        $this->assertInstanceOf(Answer::class, $answer);
    }

    public function testDeleteAnswer()
    {
        $this->assertDatabaseHas($this->tablePrefix . 'answers', ['id' => 1, 'value' => 'Jane']);

        Form::answerService()
            ->getById(1)
            ->delete();

        $this->assertDatabaseMissing($this->tablePrefix . 'answers', ['id' => 1, 'value' => 'Jane']);
    }
}
