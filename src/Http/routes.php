<?php

Route::group(['middleware' => 'web', 'namespace' => 'Musonza\Form\Http\Controllers'], function () {
    Route::resource('fields', 'FieldController');
    Route::resource('forms', 'FormController');
    // Route::resource('forms.questions', 'Musonza\Form\Http\Controllers\FormQuestionController');
    Route::resource('forms.fields', 'FormFieldController');
    Route::resource('forms.submissions', 'FormSubmissionController');

    Route::resource('submissions', 'SubmissionController');
});

Route::group(['middleware' => 'web'], function () {
    Route::get('laravel-forms', 'Musonza\Form\Http\Controllers\HomeController@index');
});
