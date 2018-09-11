<?php

Route::group(['middleware' => 'web'], function () {
    Route::resource('forms', 'Musonza\Form\Http\Controllers\FormController');
});
