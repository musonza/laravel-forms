@extends('laravel-forms::layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Fields</div>
                <div class="card-body">
                    <div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td>Path</td>
                                <td>Title</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($fields['data'] as $field)
                                <tr>
                                    <td>{{ $field['id'] }}</td>
                                    <td>{{ $field['title'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
