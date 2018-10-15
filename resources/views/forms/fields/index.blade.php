@extends('laravel-forms::layouts.default')

@section('title', 'Forms')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex flex-row-reverse">
                <a href="{{ route('forms.fields.create', $form['id']) }}">
                    <button type="submit" class="btn btn-primary mb-2">Create Field</button>
                </a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Form Fields</div>
                <div class="card-body">
                    <div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td>Id</td>
                                <td>Title</td>
                                <td>Field Type</td>
                                <td>Actions</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($questions['data'] as $field)
                                <tr>
                                    <td>{{ $field['id'] }}</td>
                                    <td>{{ $field['title'] }}</td>
                                    <td>{{ $field['field_type_name'] }}</td>
                                    <td class="minimal_cell">
                                        <span class="btn btn-link btn-sm">Edit</span>&nbsp;&nbsp;
                                        <span class="btn btn-link text-danger btn-sm">Delete</span>
                                    </td>
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
