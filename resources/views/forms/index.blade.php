@extends('laravel-forms::layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Forms</div>
                <div class="card-body">
                    <div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td>Id</td>
                                <td>Title</td>
                                <td>Status</td>
                                <td>Submissions</td>
                                <td>Created At</td>
                                <td>Actions</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($forms['data'] as $form)
                                <tr>
                                    <td>{{ $form['id'] }}</td>
                                    <td>{{ $form['title'] }}</td>
                                    <td>
                                        <span
                                        class="badge badge-{{$form['status']['class']}} p-2">{{ $form['status']['label'] }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('forms.submissions.index', ['form' => $form['id']]) }}">
                                            <span class="btn btn-link btn-sm">{{ $form['submissions_count'] }}</span>
                                        </a>
                                    </td>
                                    <td>{{ $form['created_at'] }}</td>
                                    <td class="minimal_cell">
                                        <a href="{{ route('forms.edit', ['form' => $form['id']]) }}">
                                            <span class="btn btn-link btn-sm">Edit</span>
                                        </a>&nbsp;&nbsp;
                                        <a href="{{ route('forms.destroy', ['form' => $form['id']]) }}"
                                            data-method="DELETE"
                                            data-confirm="Are you sure?">
                                            <span class="btn btn-link text-danger btn-sm" >Delete</span>
                                        </a>&nbsp;&nbsp;
                                        <a href="{{ route('forms.show', ['form' => $form['id']]) }}">
                                            <span class="btn btn-link btn-sm">Preview</span>
                                        </a>
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