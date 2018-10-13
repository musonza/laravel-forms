<?php

namespace Musonza\Form\Http\Controllers;

use Illuminate\Http\Request;
use Musonza\Form\Models\Form as FormModel;
use Musonza\Form\Models\Submission;
use Musonza\Form\Transformers\FormTransformer;
use Musonza\Form\Transformers\SubmissionTransformer;

class FormSubmissionController extends Controller
{
    protected $formTransformer;

    public function __construct(FormTransformer $formTransformer, SubmissionTransformer $submissionTransformer)
    {
        $this->formTransformer = $formTransformer;
        $this->submissionTransformer = $submissionTransformer;
    }

    public function create(FormModel $form)
    {
        $form = $this->formTransformer->transformItem($form);

        return view('laravel-forms::submissions.edit', compact('form'));
    }

    public function store(Request $request, FormModel $form)
    {
        $data = $request->all();
        unset($data['_token']);

        $submission = $form->addSubmission($request->all());

        $answers = [];

        foreach ($data as $key => $value) {
            $questionId = str_replace('field_', '', $key);
            $answers[$questionId]['question_id'] = $questionId;
            $answers[$questionId]['value'] = $value;
            $answers[$questionId]['submission_id'] = $submission->id;
        }

        $submission->answers()->insert($answers);

        $this->flashSuccess('Your submission was stored');

        return back();
    }

    public function show(FormModel $form, Submission $submission)
    {
        $submission = $this->submissionTransformer->transformItem($submission);
        $form = $this->formTransformer->transformItem($form);

        if (request()->wantsJson()) {
            return response(['submission' => $submission, 'form' => $form]);
        }

        return view('laravel-forms::submissions.show', compact('submission', 'form'));
    }
}
