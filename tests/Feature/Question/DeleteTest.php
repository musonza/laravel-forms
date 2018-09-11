<?php

namespace Musonza\Form\Tests\Feature\Question;

use Form;
use Musonza\Form\Fields\Text;
use Musonza\Form\Tests\TestCase;

class DeleteTest extends TestCase
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

    public function testDeleteSuccess()
    {
        $response = $this
            ->deleteJson(route('forms.questions.destroy', [$this->form->id, $this->question->id]))
            ->assertStatus(201);
    }
}
