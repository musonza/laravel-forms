<?php

Route::group(['middleware' => 'web'], function () {
    Route::resource('forms', 'Musonza\Form\Http\Controllers\FormController');
    Route::resource('forms.questions', 'Musonza\Form\Http\Controllers\FormQuestionController');
    Route::resource('forms.fields', 'Musonza\Form\Http\Controllers\FormFieldController');
});
