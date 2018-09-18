<?php

namespace Musonza\Form\Http\Controllers;

use Form;
use Musonza\Form\Http\Requests\CreateFormRequest;
use Musonza\Form\Http\Requests\DeleteFormRequest;
use Musonza\Form\Http\Requests\ListFormRequest;
use Musonza\Form\Http\Requests\UpdateFormRequest;
use Musonza\Form\Models\Form as FormModel;
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
     * List forms.
     *
     * @param  ListFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(ListFormRequest $request)
    {
        $forms = FormModel::all();

        $forms = $this->formTransformer->transformCollection(FormModel::all());

        if (request()->wantsJson()) {
            return response($forms);
        }

        return view('laravel-forms::forms.index', compact('forms'));
    }

    public function create()
    {
        $form = [];

        return view('laravel-forms::forms.create', compact('form'));
    }

    /**
     * Gets the form by id.
     *
     * @param  FormModel $form
     * @return \Illuminate\Http\Response
     */
    public function show(FormModel $form)
    {
        $form = $this->formTransformer->transformItem($form);

        if (request()->wantsJson()) {
            return response($form);
        }

        return view('laravel-forms::forms.show', compact('form'));
    }

    public function edit(FormModel $form)
    {
        $form = $this->formTransformer->transformItem($form);

        return view('laravel-forms::forms.edit', compact('form'));
    }

    /**
     * Stores the created form.
     *
     * @param  CreateFormRequest $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Updates form details.
     *
     * @param  UpdateFormRequest $request
     * @param  FormModel         $form
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormRequest $request, FormModel $form)
    {
        $form->update($request->validated());

        $transformedForm = $this->formTransformer->transformItem($form);

        if (request()->wantsJson()) {
            return response($transformedForm);
        }

        $this->flashSuccess('Your form has been updated');

        return redirect()->route('forms.index');
    }

    /**
     * Deletes a form.
     *
     * @param  DeleteFormRequest $request
     * @param  FormModel         $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeleteFormRequest $request, FormModel $form)
    {
        $form->delete();

        if (request()->wantsJson()) {
            return response('', 201);
        }

        $this->flashError('Form has been deleted');

        // return redirect()->route('forms.index');
    }
}
