<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Forms</title>
    <!-- Style sheets-->
    <link href="{{ asset(mix($cssFile, 'vendor/laravel-forms')) }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons">
</head>
<body>
<div id="laravel-forms" v-cloak>
  <v-app>
    <v-container grid-list-md fluid>
        <v-layout row>
          <v-flex xs2>
            <nav-component></nav-component>
          </v-flex>
          <v-flex xs10>
            <alert :message="alert.message"
                  :title="alert.title"
                  :type="alert.type"
                  :show="alert.show"
                  :auto-dismiss="alert.autoDismiss"
                  :confirmation-agree="alert.confirmationAgree"
                  v-if="alert.type"></alert>
            <router-view></router-view>
          </v-flex>
        </v-layout>
    </v-container>
  </v-app>
</div>

<script src="{{asset(mix('app.js', 'vendor/laravel-forms'))}}"></script>
</body>
</html>
