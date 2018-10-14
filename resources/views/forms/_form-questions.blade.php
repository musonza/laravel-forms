@foreach($form['questions']['data'] as $question)
<div class="form-group row">
	<label
	for="{{ $question['title'] }}"
	class="col-md-4 col-form-label text-md-right">{{ $question['label'] }}</label>
	<div class="col-md-6">
		{!! $question['render'] !!}
		@if(isset($question['help_text']))
			<small class="form-text text-muted">{{ $question['help_text'] }}</small>
		@endif
	</div>
	<div class="col-md-1">
		<a href="{{ route('forms.questions.destroy', ['form' => $form['id'], 'question' => $question['id']]) }}" data-method="DELETE" data-confirm="Are you sure?">
			<span class="btn btn-link text-danger" >Delete</span>
		</a>
	</div>
</div>
@endforeach
