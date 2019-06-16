<?php

namespace Musonza\Form\Http\Controllers;

use Illuminate\Http\Request;
use Musonza\Form\Form;
use Musonza\Form\Http\Requests\CreateFormSubmissionRequest;
use Musonza\Form\Models\Form as FormModel;
use Musonza\Form\Models\Submission;
use Musonza\Form\Transformers\FormTransformer;
use Musonza\Form\Transformers\SubmissionTransformer;

class FormSubmissionController extends Controller
{
    /**
     * @var FormTransformer
     */
    protected $formTransformer;

    /**
     * @var SubmissionTransformer
     */
    private $submissionTransformer;

    /**
     * @var Form
     */
    private $form;

    public function __construct(
        FormTransformer $formTransformer,
        SubmissionTransformer $submissionTransformer,
        Form $form
    ){
        $this->formTransformer = $formTransformer;
        $this->submissionTransformer = $submissionTransformer;
        $this->form = $form;
    }

    public function index(FormModel $form)
    {
        $submissions = $this->submissionTransformer->transformCollection($form->submissions()->orderBy('id', 'DESC')->get());
        $data = ['form' => $this->formTransformer->transformItem($form), 'submissions' => $submissions];

        return response($data);
    }

    public function create(Request $request, FormModel $form)
    {
        request()->query->add(['include' => 'questions']);

        $form = $this->formTransformer->transformItem($form);

        if (request()->wantsJson()) {
            return response($form);
        }

        $googleRecaptchaEnabled = $this->form->googleRecaptchaEnabled();

        return view('laravel-forms::submissions.edit', compact('form', 'googleRecaptchaEnabled'));
    }

    public function store(CreateFormSubmissionRequest $request, FormModel $form)
    {
        $data = $request->except([
          'g-recaptcha-response',
          '_token'
        ]);

        $submission = $form->addSubmission($data);
        $answers = [];

        foreach ($data as $key => $value) {
            // if ($value) {
            $questionId = str_replace('field_', '', $key);
            $answers[$questionId]['question_id'] = $questionId;
            $answers[$questionId]['value'] = $value;
            $answers[$questionId]['submission_id'] = $submission->id;
            // }
        }

        $submission->answers()->insert($answers);

        // Do this in an event listener
        $submission->is_complete = true;
        $submission->save();

        $this->flashSuccess('Your submission was stored');

        return back();
    }

    public function show(FormModel $form, Submission $submission)
    {
        request()->query->add(['include' => 'answers']);

        return response($this->submissionTransformer->transformItem($submission));
    }
}
