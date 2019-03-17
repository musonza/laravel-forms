<?php

namespace Musonza\Form\Tests\Feature\Question;

use Form;
use Musonza\Form\Fields\Text;
use Musonza\Form\Tests\TestCase;

class CreateTest extends TestCase
{
    /**
     * @var Form
     */
    private $form;

    public function setUp(): void
    {
        parent::setUp();
        $this->form = Form::create(['title' => 'Contact Form']);
    }

    public function testCreateSuccess()
    {
        $data = [
            'label' => 'First Name Label',
            'description' => 'Description',
            'field_type' => Text::class,
        ];

        $response = $this->postJson(route('forms.fields.store', $this->form->id), $data);

        $response
            ->assertStatus(200)
            ->assertJson([
                'label' => 'First Name Label',
                'description' => 'Description',
                'field_type' => 'Musonza\Form\Fields\Text',
            ]);
    }

    public function testQuestionRequiresLabel()
    {
        $data = [
            'description' => 'Description',
            'field_type' => Text::class,
        ];

        $response = $this->postJson(route('forms.fields.store', $this->form->id), $data)
            ->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
            ]);
    }

    public function testQuestionRequiresFieldType()
    {
        $data = [
            'label' => 'First Name Label',
            'description' => 'Description',
        ];

        $response = $this->postJson(route('forms.fields.store', $this->form->id), $data)
            ->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
            ]);
    }
}
