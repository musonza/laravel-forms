<?php

namespace Musonza\Form\Tests\Unit;

use Form;
use Illuminate\Database\Eloquent\Collection;
use Musonza\Form\Models\Submission;
use Musonza\Form\Tests\TestCase;

class SubmissionTest extends TestCase
{
    protected $form;
    protected $question;
    protected $submission;

    public function setUp(): void
    {
        parent::setUp();
        $this->form = Form::create(['title' => 'Contact Form']);
        $this->submission = $this->form->addSubmission([]);
    }

    public function testFormSubmissions()
    {
        $this->assertInstanceOf(Collection::class, $this->form->submissions);
    }

    public function testGetSubmissionById()
    {
        $submission = Form::submissionService()->getById(1);
        $this->assertEquals($this->submission->id, $submission->id);
        $this->assertInstanceOf(Submission::class, $submission);
    }
}
