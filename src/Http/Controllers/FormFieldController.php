<?php

namespace Musonza\Form\Http\Controllers;

use Form;
use Musonza\Form\Models\Form as FormModel;

class FormFieldController extends Controller
{
    public function create(FormModel $form)
    {
        $field = [];

        return view('laravel-forms::fields.create', compact('form', 'field'));
    }
}
