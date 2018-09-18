@extends('laravel-forms::layouts.default')

@section('content')
<div class="container">
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
</div>
@endsection
