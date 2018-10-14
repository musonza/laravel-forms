@extends('laravel-forms::layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Submission #{{$submission['id']}}
                </div>
                <div class="card-body">
                    @foreach ($submission['answers']['data'] as $answer)
                        <!-- <h6>{{ $loop->iteration }}.&nbsp;{{ $answer['question']['label'] }}</h6> -->
                        <h6>{{ $answer['question']['label'] }}</h6>
                        <div class="border border-white mb-2">
                        {{ $answer['response'] }} <br/>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
