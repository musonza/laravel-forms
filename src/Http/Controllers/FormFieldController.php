<?php

namespace Musonza\Form\Http\Controllers;

use Illuminate\Http\Request;
use Musonza\Form\Http\Requests\CreateFormQuestionRequest;
use Musonza\Form\Http\Requests\UpdateFormQuestionRequest;
use Musonza\Form\Models\Form as FormModel;
use Musonza\Form\Models\Question;
use Musonza\Form\Transformers\FieldTransformer;
use Musonza\Form\Transformers\FieldTypeTransformer;

class FormFieldController extends Controller
{
    /**
     * @var FieldTypeTransformer
     */
    private $fieldTypeTransformer;

    /**
     * @var FieldTransformer
     */
    private $fieldTransformer;

    public function __construct(FieldTransformer $fieldTransformer, FieldTypeTransformer $fieldTypeTransformer)
    {
        $this->fieldTransformer = $fieldTransformer;
        $this->fieldTypeTransformer = $fieldTypeTransformer;
    }

    public function index(FormModel $form)
    {
        $fields = $form->questions()->orderBy('position')->get();

        $fields = $this->fieldTransformer->transformCollection($fields);

        return response($fields);
    }

    public function create(FormModel $form)
    {
        $fieldTypes = $this->fieldTypes();

        $field = [];

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

        if ($request->options) {
            $options = $this->normalizeOptions($request->options);
            $data['options'] = $options;
        }

        $field = $form->questions()->create($data);
        return response($field);
    }

    public function destroy(Request $request, FormModel $form, Question $field)
    {
        $field->delete();
        return response('', 201);
    }

    public function edit(FormModel $form, Question $field)
    {
        $field = $this->fieldTransformer->transformItem($field);
        $fieldTypes = $this->fieldTypes();
        return view('laravel-forms::forms.fields.edit', compact('form', 'field', 'fieldTypes'));
    }

    public function update(UpdateFormQuestionRequest $request, FormModel $form, Question $field)
    {
        $data = $request->validated();
        $data['options'] = [];

        if ($request->options) {
            $options = $this->normalizeOptions($request->options);
            $data['options'] = $options;
        }

        if ($request->position && $request->position != $field->position) {
            $field->insertAt($request->position);
        }

        $field->update($data);

        return response($this->fieldTransformer->transformItem($field));
    }

    protected function normalizeOptions($options)
    {
        $options = array_unique($options);
        return array_values($options);
    }

    protected function fieldTypes($value = '')
    {
        return $this->fieldTypeTransformer->transformCollection(config('laravel_forms.fields'));
    }
}
