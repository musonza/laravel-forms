<?php

namespace Musonza\Form\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormQuestionRequest extends FormRequest
{
    public static $rules = [
        'title' => 'Required',
        'field_type' => 'Required',
        'help_text' => '',
        'placeholder' => '',
        'description' => '',
        'label' => '',
    ];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return self::$rules;
    }
}
