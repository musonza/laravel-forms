# Laravel Forms

[![Build Status](https://travis-ci.org/musonza/laravel-forms.svg?branch=master)](https://travis-ci.org/musonza/laravel-forms)
[![Packagist](https://img.shields.io/packagist/v/musonza/laravel-forms.svg)](https://packagist.org/packages/musonza/laravel-forms)

<img src="screenshots/forms_list.png" alt="forms list">

## Installation
1. Install composer package
    ```sh
    composer require musonza/laravel-forms
    ```

1. Publish Assets
    ```sh
    php artisan vendor:publish
    ```
1. Add Form facade to `config/app.php`
    ```php
    'Form' => Musonza\Form\Facades\FormFacade::class,
    ```
    
1. Run migrations
    ```sh
    php artisan migrate
    ```  

1. Check the published file config/laravel_forms.php
    - You can enable / disable captcha
    - You can configure the path for your forms dashboard
    - You can add custom field types
    
1. Access dashboard at

    http//your-url.com/laravel-forms (you can change the path in config/laravel_forms.php)

## Adding a Form
<img src="screenshots/new_form.png" alt="adding a form">

## Form details
<img src="screenshots/form_details.png" alt="form details">

## Adding a Field
<img src="screenshots/new_field.png" alt="adding a field">

## Field details
<img src="screenshots/field_details.png" alt="field details">

## Sample Form Output
<img src="screenshots/front_end_form.png" alt="form output">

## Sample Submission
<img src="screenshots/submission_details.png">

## TODO
- Multi page forms

## Credits
https://github.com/laravel/telescope for some of the front-end structuring 
