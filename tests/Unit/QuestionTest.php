<?php

namespace Musonza\Form\Tests\Unit;

use Form;
use Musonza\Form\Fields\Text;
use Musonza\Form\Fields\TextArea;
use Musonza\Form\Tests\TestCase;

class QuestionTest extends TestCase
{
    protected $form;
    protected $question;

    public function setUp(): void
    {
        parent::setUp();
        $this->form = Form::create(['title' => 'Contact Form']);
        $this->question = Form::createQuestion(
            [
                'label' => 'First Name',
                'description' => 'Description',
                'field_type' => Text::class,
                'form_id' => $this->form->id,
            ]
        );
    }

    public function testCreatesQuestion()
    {
        $this->assertDatabaseHas($this->tablePrefix . 'questions', ['id' => 1]);
    }

    public function testGetQuestionById()
    {
        $question = Form::questionService()->getById(1);
        $this->assertEquals(1, $question->id);
    }

    public function testQuestionBelongsToForm()
    {
        $this->assertInstanceOf(\Musonza\Form\Models\Form::class, $this->question->form);
    }

    public function testUpdatesQuestion()
    {
        $this->question->update([
            'label' => 'New Label',
            'field_type' => TextArea::class,
        ]);

        $this->assertEquals('New Label', $this->question->label);
        $this->assertInstanceOf(TextArea::class, $this->question->field());
    }

    public function testDeleteQuestion()
    {
        $this->assertDatabaseHas($this->tablePrefix . 'questions', ['id' => 1]);
        Form::questionService()
            ->getById(1)
            ->delete();
        $this->assertDatabaseMissing($this->tablePrefix . 'questions', ['id' => 1]);
    }

    public function testAddQuestionValidations()
    {
        $validations = "required | email";
        $this->question->addValidations($validations);
        $this->assertEquals($validations, $this->question->validations);
    }

    public function testResolvesQuestionField()
    {
        $this->assertInstanceOf(Text::class, $this->question->field());
    }
}
