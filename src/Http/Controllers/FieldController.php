<?php

namespace Musonza\Form\Http\Controllers;

use Form;
use Musonza\Form\Transformers\FieldTypeTransformer;

class FieldController extends Controller
{
    public function __construct(FieldTypeTransformer $fieldTransformer)
    {
        $this->fieldTransformer = $fieldTransformer;
    }

    public function index()
    {
        $fields = $this->fieldTransformer->transformCollection(config('laravel_forms.fields'));

        return response($fields);
    }
}
