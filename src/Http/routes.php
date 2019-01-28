<?php

$dashboardPathPrefix = config('laravel_forms.dashboard_path_prefix');

Route::group([
    'middleware' => 'web',
    'namespace' => 'Musonza\Form\Http\Controllers',
], function () {
    Route::resource('fields', 'FieldController');
    Route::resource('forms', 'FormController');
    Route::resource('forms.fields', 'FormFieldController');
    Route::resource('forms.submissions', 'FormSubmissionController');
    Route::resource('submissions', 'SubmissionController');
});

Route::group([
    'middleware' => 'web',
    'namespace' => 'Musonza\Form\Http\Controllers',
], function () use ($dashboardPathPrefix) {
    Route::get($dashboardPathPrefix, 'DashboardController@index');
});
