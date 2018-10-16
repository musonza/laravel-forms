@extends('laravel-forms::layouts.default')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="card">
                    <div class="card-header">Form Submissions</div>
                    <div class="card-body">
                        <div>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <td>Id</td>
                                    <td>IP Address</td>
                                    <td>Created</td>
                                    <td>Status</td>
                                    <td>Actions</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($submissions['data'] as $sub)
                                    <tr>
                                        <td>{{ $sub['id'] }}</td>
                                        <td>{{ $sub['ip_address'] }}</td>
                                        <td>{{ $sub['created_at_readable'] }}</td>
                                        <td>
                                            @if ($sub['is_complete'])
                                                <span class="badge badge-success p-2">Complete</span>
                                            @else
                                                <span class="badge badge-warning p-2">In Progress</span>
                                            @endif
                                        </td>
                                        <td class="minimal_cell">
                                            <a href="{{ route('forms.submissions.destroy', ['form' => $sub['form_id'], 'submission' => $sub['id']]) }}"
                                                data-method="DELETE" data-confirm="Are you sure?">
                                                <span class="btn btn-link text-danger" >Delete</span>
                                            </a>&nbsp;&nbsp;
                                            <a href="{{ route('forms.submissions.show', ['form' => $sub['form_id'], 'submission' => $sub['id']]) }}">
                                                <span class="btn btn-sm btn-outline-info">View</span>
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
</div>
@endsection
