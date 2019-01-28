@php
 $count = 0;
@endphp

<div class="form-row">

@if ($errors->any())
    <ul class="alert alert-danger p2">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@foreach($form['questions']['data'] as $question)

@php
 $count += $question['columns_count'];
@endphp
	<div class="form-group col-md-{{ $question['columns_count'] }}">
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

@if($count == 12)
</div>
<div class="form-row">
@endif
@endforeach
