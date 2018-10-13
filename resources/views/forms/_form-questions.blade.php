@foreach($form['questions']['data'] as $question)
<div class="form-group row">
	<label
	for="{{ $question['title'] }}"
	class="col-md-2 col-form-label text-md-right">{{ $question['label'] }}</label>
	<div class="col-md-10">
		{!! $question['render'] !!}
	</div>
</div>
@endforeach
