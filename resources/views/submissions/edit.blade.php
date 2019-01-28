@extends('laravel-forms::layouts.front')

@section('content')

<h1>{{ $form['title'] }}</h1>

<form role="form" method="post" action="{{ route('forms.submissions.store', $form['id']) }}">
	{{ csrf_field() }}

	@include('laravel-forms::forms._form-questions')

	@if($googleRecaptchaEnabled)
	<div class="form-group col-md-12">
		<div class="g-recaptcha"
	        data-sitekey="{{ config('laravel_forms.google_recaptcha_key') }}">
		</div>
	</div>
	@endif

	<!-- Submit Button -->
	<div class="form-group row">
	    <div class="offset-md-2 col-md-10">
	        <button type="submit" class="btn btn-primary">Submit</button>
	    </div>
	</div>
</form>
@endsection
