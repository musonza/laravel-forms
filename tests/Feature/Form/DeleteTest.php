<?php

namespace Musonza\Form\Tests\Feature\Form;

use Form;
use Musonza\Form\Tests\TestCase;

class DeleteTest extends TestCase
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

    public function testDeleteSuccess()
    {
        $response = $this
            ->deleteJson(route('forms.destroy', $this->form->id))
            ->assertStatus(201);
    }
}
