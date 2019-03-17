<?php

namespace Musonza\Form\Tests\Feature\Form;

use Form;
use Musonza\Form\Tests\TestCase;

class CreateTest extends TestCase
{
    public function testCreateSuccess()
    {
        $response = $this->postJson(route('forms.store'), ['title' => 'Contact Form', 'description' => 'Our Form']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'title' => 'Contact Form',
                'description' => 'Our Form',
            ]);
    }

    public function testFormRequiresTitle()
    {
        $response = $this->postJson(route('forms.store'), [])
            ->assertStatus(422)
            ->assertJson([
                'message' => 'The given data was invalid.',
            ]);
    }
}
