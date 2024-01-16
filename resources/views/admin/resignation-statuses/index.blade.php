@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <h2>Resignation statuses</h2>
    @can('resignation_statuses-create')
    <a class="btn btn-primary" href="{{ route('admin.resignation-statuses.create') }}"><i class="fa fa-plus"></i> Add Resignation status</a>
    @endcan
</div>

<table class="table" style="margin-top:25px;">
    <thead>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($resignationStatuses as $key => $resignationStatus)
            <tr>
                <td>{{ $resignationStatus->name }}</td>
                <td>
                    @can('resignation_statuses-edit')
                    <a href="{{ route('admin.resignation-statuses.edit', $resignationStatus->id) }}"><i class="fa fa-edit"></i></a>
                    @endcan
                    @can('resignation_statuses-delete')
                    <a href="{{ route('admin.resignation-statuses.destroy', $resignationStatus->id) }}" class="delete-item"><i class="fa fa-trash"></i></a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
