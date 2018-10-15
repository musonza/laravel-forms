<?php

namespace Musonza\Form\Http\Controllers;

use Form;
use Illuminate\Http\Request;
use Musonza\Form\Http\Requests\CreateFormQuestionRequest;
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
        $fieldTypes = $this->fieldTypeTransformer->transformCollection(config('laravel_forms.fields'));

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

    public function destroy(Request $request, FormModel $form, Question $field)
    {
        $field->delete();

        if (request()->wantsJson()) {
            return response('', 201);
        }

        $this->flashError('Field has been deleted');

        return back();
    }

    protected function normalizeOptions(string $options)
    {
        $options = array_map('trim', explode(PHP_EOL, $options));
        $options = array_unique($options);

        return array_values($options);
    }
}
