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

                        @include('laravel-forms::forms.fields._field-details')

                        <div id="field_choices">
                        @include('laravel-forms::forms.fields._field-choices')
                        </div>
                        <!-- Submit Button -->
                        <div class="form-group row">
                            <div class="offset-md-2 col-md-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
