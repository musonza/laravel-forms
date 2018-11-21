<?php

Route::group(['middleware' => 'web'], function () {
    Route::resource('fields', 'Musonza\Form\Http\Controllers\FieldController');
    Route::resource('forms', 'Musonza\Form\Http\Controllers\FormController');
    // Route::resource('forms.questions', 'Musonza\Form\Http\Controllers\FormQuestionController');
    Route::resource('forms.fields', 'Musonza\Form\Http\Controllers\FormFieldController');
    Route::resource('forms.submissions', 'Musonza\Form\Http\Controllers\FormSubmissionController');
});

Route::group(['middleware' => 'web'], function () {
    Route::get('laravel-forms', 'Musonza\Form\Http\Controllers\HomeController@index');
});
