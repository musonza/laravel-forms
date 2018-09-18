@extends('laravel-forms::layouts.default')

@section('title', 'Forms')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    New Form
                </div>
                <div class="card-body">
                    <form role="form" method="post" action="{{ route('forms.store') }}">
                        {{ csrf_field() }}
                        @include('laravel-forms::forms._form-details')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
