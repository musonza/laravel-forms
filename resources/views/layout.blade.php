<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Forms</title>
</head>
<body>
<div id="laravel-forms" v-cloak>
    <div class="container mb-5">
        <div class="row mt-4">
            <div class="col-10">
                <router-view></router-view>
            </div>
        </div>
    </div>
</div>

<script src="{{asset(mix('app.js', 'vendor/laravel-forms'))}}"></script>
Hello there...
</body>
</html>
