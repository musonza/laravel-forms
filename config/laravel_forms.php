<?php

return [
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
];
