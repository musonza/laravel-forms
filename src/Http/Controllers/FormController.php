<?php

namespace Musonza\Form\Http\Controllers;

use Form;
use Musonza\Form\Http\Requests\CreateFormRequest;
use Musonza\Form\Transformers\FormTransformer;

class FormController extends Controller
{
    private $formTransformer;

    /**
     * FormController constructor.
     *
     * @param FormTransformer $formTransformer
     */
    public function __construct(FormTransformer $formTransformer)
    {
        $this->formTransformer = $formTransformer;
    }

    /**
     * List forms
     *
     * @return Response
     */
    public function index()
    {
    }

    public function store(CreateFormRequest $request)
    {
        $form = Form::create($request->validated());
        $transformedForm = $this->formTransformer->transformItem($form);

        if (request()->wantsJson()) {
            return response($transformedForm);
        }

        $this->flashSuccess('Your form has been created');

        return redirect()->route('forms.index');
    }
}
