<?php

namespace Musonza\Form\Tests\Feature\Form;

use Form;
use Musonza\Form\Tests\TestCase;

class UpdateTest extends TestCase
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

    public function testUpdateSuccess()
    {
        $response = $this->putJson(route('forms.update', $this->form->id), [
            'title' => 'Contact Form2',
            'label' => 'Contact Form2',
            'description' => 'Our Form2',
        ]);

        $response
            ->assertStatus(200)
            ->assertJson([
                'title' => 'Contact Form2',
                'description' => 'Our Form2',
            ]);
    }
}
