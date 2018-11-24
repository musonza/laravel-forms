<?php

namespace Musonza\Form\Http\Controllers;

use Form;
use Illuminate\Http\Request;
use Musonza\Form\Http\Requests\CreateFormQuestionRequest;
use Musonza\Form\Http\Requests\UpdateFormQuestionRequest;
use Musonza\Form\Models\Form as FormModel;
use Musonza\Form\Models\Question;
use Musonza\Form\Transformers\FieldTransformer;
use Musonza\Form\Transformers\FieldTypeTransformer;

class FormFieldController extends Controller
{
    public function __construct(FieldTransformer $fieldTransformer, FieldTypeTransformer $fieldTypeTransformer)
    {
        $this->fieldTransformer = $fieldTransformer;
        $this->fieldTypeTransformer = $fieldTypeTransformer;
    }

    public function index(FormModel $form)
    {
        $questions = $this->fieldTransformer->transformCollection($form->questions);

        if (request()->wantsJson()) {
            return response($questions);
        }

        return view('laravel-forms::fields.index', compact('form', 'questions'));
    }

    public function create(FormModel $form)
    {
        $fieldTypes = $this->fieldTypes();

        $field = [];

        //return view('laravel-forms::forms.fields.form-builder', compact('form', 'fieldTypes', 'field'));

        return view('laravel-forms::forms.fields.create', compact('form', 'fieldTypes', 'field'));
    }

    public function show(FormModel $form, Question $field)
    {
        return response($field);
    }

    public function store(CreateFormQuestionRequest $request, FormModel $form)
    {
        $data = $request->all();
        $data['options'] = [];
        $data['title'] = 'Foo';

        if ($request->options) {
            $options = $this->normalizeOptions($request->options);
            $data['options'] = $options;
        }

        $field = $form->questions()->create($data);

        if (request()->wantsJson()) {
            return response($field);
        }

        $this->flashSuccess('Your form field has been created');

        return back();
    }

    public function destroy(Request $request, FormModel $form, Question $field)
    {
        $field->delete();

        if (request()->wantsJson()) {
            return response('', 201);
        }

        $this->flashError('Field has been deleted');

        return back();
    }

    public function edit(FormModel $form, Question $field)
    {
        $field = $this->fieldTransformer->transformItem($field);
        $fieldTypes = $this->fieldTypes();

        return view('laravel-forms::forms.fields.edit', compact('form', 'field', 'fieldTypes'));
    }

    public function update(UpdateFormQuestionRequest $request, FormModel $form, Question $field)
    {
        $data = $request->all();
        $data['options'] = [];

        if ($request->options) {
            $options = $this->normalizeOptions($request->options);
            $data['options'] = $options;
        }

        $field->update($data);

        if (request()->wantsJson()) {
            return response($field);
        }

        $this->flashSuccess('Your form field has been updated');

        return back();
    }

    protected function normalizeOptions(string $options)
    {
        $options = array_map('trim', explode(PHP_EOL, $options));
        $options = array_unique($options);

        return array_values($options);
    }

    protected function fieldTypes($value = '')
    {
        return $this->fieldTypeTransformer->transformCollection(config('laravel_forms.fields'));
    }
}
