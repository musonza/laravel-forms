<?php

namespace Musonza\Form\Http\Controllers;

use Musonza\Form\Models\Submission;

class SubmissionController extends Controller
{
    public function destroy(Submission $submission)
    {
        $submission->delete();

        return response('', 201);
    }
}
