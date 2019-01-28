<?php

use Faker\Generator as Faker;
use Musonza\Form\Fields\Text;
use Musonza\Form\Models\Form;
use Musonza\Form\Models\Question;
use Musonza\Form\Models\Submission;
use Musonza\Form\Models\SubmissionResponse;

$factory->define(Musonza\Form\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(Form::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->sentence,
    ];
});

$factory->define(Question::class, function (Faker $faker) {
    return [
        'label' => $faker->sentence,
        'description' => $faker->sentence,
        'form_id' => function () {
            return factory(Form::class)->create()->id;
        },
        'field_type' => Text::class,
        'is_required' => true,
    ];
});

$factory->define(Submission::class, function (Faker $faker) {
    return [
        'ip_address' => $faker->ipv4,
        'response' => [
            'field1' => [
                'field_identifier' => 'field1',
                'response_text' => $faker->sentence,
            ],
            'field2' => [
                'field_identifier' => 'field2',
                'response_text' => $faker->paragraph,
            ],
            'field3' => [
                'field_identifier' => 'field3',
                'response_text' => $faker->sentence,
            ],
        ],
        'form_id' => function () {
            return factory(Form::class)->create()->id;
        },
    ];
});

$factory->define(SubmissionResponse::class, function (Faker $faker) {
    return [
        'submission_id' => function () {
            return factory(Submission::class)->create()->id;
        },
        'question_id' => function () {
            return factory(Question::class)->create()->id;
        },
        'response_text' => $faker->sentence,
    ];
});
