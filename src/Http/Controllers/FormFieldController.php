<?php

namespace Musonza\Form\Http\Controllers;

use Form;
use Illuminate\Http\Request;
use Musonza\Form\Http\Requests\CreateFormQuestionRequest;
use Musonza\Form\Models\Form as FormModel;
use Musonza\Form\Transformers\FieldTypeTransformer;

class FormFieldController extends Controller
{
    public function __construct(FieldTypeTransformer $fieldTransformer)
    {
        $this->fieldTransformer = $fieldTransformer;
    }

    public function index(FormModel $form)
    {
        $questions = $this->fieldTransformer->transformItem($form->questions);

        if (request()->wantsJson()) {
            return response($questions);
        }

        return view('laravel-forms::forms.fields.index', compact('questions'));
    }

    public function create(FormModel $form)
    {
        $fieldTypes = $this->fieldTransformer->transformCollection(config('laravel_forms.fields'));

        return view('laravel-forms::fields.create', compact('form', 'fieldTypes'));
    }

    public function store(CreateFormQuestionRequest $request, FormModel $form)
    {
        $data = $request->all();
        $data['options'] = [];

        if ($request->options) {
            $options = $this->normalizeOptions($request->options);
            $data['options'] = $options;
        }

        $question = $form->questions()->create($data);

        return back();
    }

    protected function normalizeOptions(string $options)
    {
        $options = array_map('trim', explode(',', $options));
        $options = array_unique($options);

        return array_values($options);
    }
}
