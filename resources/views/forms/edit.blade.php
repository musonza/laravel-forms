@extends('laravel-forms::layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex flex-row-reverse">
                <a href="{{ route('forms.fields.create',  $form['id']) }}">
                    <button type="submit" class="btn btn-primary mb-2">Add Field</button>
                </a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Form
                </div>
                <div class="card-body">
                    <form role="form" method="post" action="{{ route('forms.update', $form['id']) }}">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        @include('laravel-forms::forms._form-details')
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Fields</div>
                <div class="card-body">
                    @include('laravel-forms::forms._form-questions')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
