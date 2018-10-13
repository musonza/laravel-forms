<?php

namespace Musonza\Form\Http\Controllers;

use Form;
use Musonza\Form\Models\Form as FormModel;
use Musonza\Form\Transformers\FieldTypeTransformer;

class FormFieldController extends Controller
{
    public function __construct(FieldTypeTransformer $fieldTransformer)
    {
        $this->fieldTransformer = $fieldTransformer;
    }

    public function create(FormModel $form)
    {
        $fieldTypes = $this->fieldTransformer->transformCollection(config('laravel_forms.fields'));

        return view('laravel-forms::fields.create', compact('form', 'fieldTypes'));
    }
}
