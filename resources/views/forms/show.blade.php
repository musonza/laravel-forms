@extends('laravel-forms::layouts.default')

@section('content')
<div class="container">
    @include('laravel-forms::forms._top-bar')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Form Details</div>
                <div class="card-body">
                	@include('laravel-forms::forms._form-questions')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
