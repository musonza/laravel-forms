<?php

namespace Musonza\Form\Tests\Unit;

use Form;
use Musonza\Form\Tests\TestCase;

class FormTest extends TestCase
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

    public function testCreatesForm()
    {
        $this->assertDatabaseHas($this->tablePrefix . 'forms', ['id' => 1, 'title' => 'Contact Form']);
    }

    public function testGetFormById()
    {
        $form = Form::formService()->getById($this->form->id);
        $this->assertEquals($this->form->id, $form->id);
    }

    public function testDeleteForm()
    {
        $this->assertDatabaseHas($this->tablePrefix . 'forms', ['id' => 1, 'title' => 'Contact Form']);

        Form::formService()
            ->getById($this->form->id)
            ->delete();

        $this->assertDatabaseMissing($this->tablePrefix . 'forms', ['id' => 1, 'title' => 'Contact Form']);
    }
}
