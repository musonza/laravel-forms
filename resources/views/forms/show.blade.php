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

    <small class="text-muted">
    Form Url: <a href="{{ route('forms.submissions.create', $form['id']) }}"
    target="_blank">{{ route('forms.submissions.create', $form['id']) }}</a><br/><br/>
    </small>

    <div class="card">
        <div class="card-header">Form Details</div>
        <div class="card-body">
        	@include('laravel-forms::forms._form-questions')
        </div>
    </div>
</div>
@endsection
