@foreach($form['questions']['data'] as $question)
<div class="form-row">
	<div class="form-group col-md-10">
		<label
		for="{{ $question['title'] }}"
		class="col-form-label text-md-right">{{ $question['label'] }}</label>
		<div class="">
			{!! $question['render'] !!}
			@if(isset($question['help_text']))
				<small class="form-text text-muted">{{ $question['help_text'] }}</small>
			@endif
		</div>
	</div>
	<div class="col-md-2">
		<a href="{{ route('forms.fields.edit', ['form' => $form['id'], 'question' => $question['id']]) }}">
			<span class="btn btn-link btn-sm" >Edit</span>
		</a>
		<a href="{{ route('forms.fields.destroy', ['form' => $form['id'], 'question' => $question['id']]) }}" data-method="DELETE" data-confirm="Are you sure?">
			<span class="btn btn-link text-danger btn-sm" >Delete</span>
		</a>
	</div>
</div>
@endforeach
