<?php

namespace Musonza\Form\Http\Controllers;

use Musonza\Form\Form;
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
     * @var Form
     */
    private $form;

    /**
     * FormController constructor.
     *
     * @param FormTransformer $formTransformer
     */
    public function __construct(FormTransformer $formTransformer, Form $form)
    {
        $this->formTransformer = $formTransformer;
        $this->form = $form;
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

        return response($this->formTransformer->transformCollection($forms));
    }

    /**
     * Gets the form by id.
     *
     * @param  FormModel $form
     * @return \Illuminate\Http\Response
     */
    public function show(FormModel $form)
    {
        request()->query->add(['include' => 'questions']);

        return response($this->formTransformer->transformItem($form));
    }

    /**
     * Stores the created form.
     *
     * @param  CreateFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFormRequest $request)
    {
        $form = $this->form->create($request->validated());

        return response($this->formTransformer->transformItem($form));
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

        return response($this->formTransformer->transformItem($form));
    }

    /**
     * Deletes a form.
     *
     * @param DeleteFormRequest $request
     * @param FormModel $form
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(DeleteFormRequest $request, FormModel $form)
    {
        $form->delete();

        return response('', 201);
    }
}
