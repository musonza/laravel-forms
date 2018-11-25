<?php

namespace Musonza\Form\Http\Controllers;

use Illuminate\Http\Request;
use Musonza\Form\Models\Submission;

class SubmissionController extends Controller
{
    public function destroy(Submission $submission)
    {
        $submission->delete();

        if (request()->wantsJson()) {
            return response('', 201);
        }
    }
}
