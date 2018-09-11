<?php

namespace Musonza\Form\Tests\Feature\Form;

use Form;
use Musonza\Form\Tests\TestCase;

class ListTest extends TestCase
{
    /**
     * @var Form
     */
    private $form;

    public function setUp()
    {
        parent::setUp();
        Form::create(['title' => 'Contact Form1']);
        Form::create(['title' => 'Contact Form2']);
        Form::create(['title' => 'Contact Form3']);
    }

    public function testListForms()
    {
        $response = $this->getJson(route('forms.index'));

        $response
            ->assertStatus(200)
            ->assertJsonCount(3, 'data');
    }

    public function testGetForm()
    {
        $response = $this->getJson(route('forms.show', $id = 2));

        $response
            ->assertStatus(200)
            ->assertJson([
                'title' => 'Contact Form2',
            ]);
    }
}
