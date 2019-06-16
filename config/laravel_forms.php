<?php

return [
    'dashboard_path_prefix' => 'laravel-forms',
    'dashboard_css_file' => 'app.css',
    /*
    |--------------------------------------------------------------------------
    | Field Types
    |--------------------------------------------------------------------------
    |
    | Here you may define add additional field types for use in your application.
    |
     */
    'fields' => [
        Musonza\Form\Fields\CheckBox::class,
        Musonza\Form\Fields\Date::class,
        Musonza\Form\Fields\File::class,
        Musonza\Form\Fields\Password::class,
        Musonza\Form\Fields\Radio::class,
        Musonza\Form\Fields\Select::class,
        Musonza\Form\Fields\Text::class,
        Musonza\Form\Fields\TextArea::class,
        Musonza\Form\Fields\Email::class,
        Musonza\Form\Fields\Number::class,
    ],
    /*
    |--------------------------------------------------------------------------
    | Form Statuses
    |--------------------------------------------------------------------------
    |
    |
     */
    'form_statuses' => [
        0 => [
            'label' => 'Draft',
            'class' => 'warning',
        ],
        1 => [
            'label' => 'Published',
            'class' => 'success',
        ],
        2 => [
            'label' => 'Unpublished',
            'class' => 'error',
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Google Recaptcha
    |--------------------------------------------------------------------------
    |
    |
     */
    'google_recaptcha_enabled' => true,
    'google_recaptcha_key' => env('GOOGLE_RECAPTCHA_KEY'),
    'google_recaptcha_secret' => env('GOOGLE_RECAPTCHA_SECRET'),
];
