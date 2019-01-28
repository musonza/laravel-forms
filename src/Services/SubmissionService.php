<?php

namespace Musonza\Form\Services;

use Musonza\Form\Models\Submission;

class SubmissionService
{
    public function __construct(Submission $submission)
    {
        $this->submission = $submission;
    }

    public function getById($id)
    {
        return $this->submission->findOrFail($id);
    }
}
