<?php

namespace Musonza\Form\Tests\Feature\Question;

use Form;
use Musonza\Form\Fields\Text;
use Musonza\Form\Tests\TestCase;

class UpdateTest extends TestCase
{
    protected $form;
    protected $question;

    public function setUp(): void
    {
        parent::setUp();
        $this->form = Form::create(['title' => 'Contact Form']);
        $this->data = [
            'label' => 'First Name',
            'description' => 'Description',
            'field_type' => Text::class,
            'form_id' => $this->form->id,
        ];
        $this->question = Form::createQuestion($this->data);
    }

    public function testUpdateSuccess()
    {
        $this->data['label'] = 'First Name Updated';

        $response = $this
            ->putJson(route('forms.fields.update', [$this->form->id, $this->question->id]), $this->data)
            ->assertStatus(200)
            ->assertJson([
                'label' => 'First Name Updated',
            ]);
    }
}
