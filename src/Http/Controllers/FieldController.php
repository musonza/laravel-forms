<?php

namespace Musonza\Form\Http\Controllers;

use Musonza\Form\Transformers\FieldTypeTransformer;

class FieldController extends Controller
{
    /**
     * @var FieldTypeTransformer
     */
    private $fieldTransformer;

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
