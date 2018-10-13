@extends('laravel-forms::layouts.default')

@section('title', 'Field')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    New Field
                </div>
                <div class="card-body">
                    <form role="form" method="post" action="{{ route('forms.fields.store', $form['id']) }}">
                        {{ csrf_field() }}
                        @include('laravel-forms::fields._field-details')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
