<?php

namespace Musonza\Form\Tests\Unit;

use Form;
use Illuminate\Database\Eloquent\Collection;
use Musonza\Form\Tests\TestCase;

class SubmissionTest extends TestCase
{
    protected $form;
    protected $question;

    public function setUp()
    {
        parent::setUp();
        $this->form = Form::create(['title' => 'Contact Form']);
    }

    public function testFormSubmissions()
    {
        $this->assertInstanceOf(Collection::class, $this->form->submissions);
    }
}
