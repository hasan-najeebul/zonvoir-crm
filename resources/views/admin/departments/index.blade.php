@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <h2>Departments</h2>
    @can('departments-create')
    <a class="btn btn-primary" href="{{ route('admin.departments.create') }}"><i class="fa fa-plus"></i> Add Department</a>
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
        @foreach($departments as $key => $department)
            <tr>
                <td>{{ $department->name }}</td>
                <td>
                    @can('departments-edit')
                    <a href="{{ route('admin.departments.edit', $department->id) }}"><i class="fa fa-edit"></i></a>
                    @endcan
                    @can('departments-delete')
                    <a href="{{ route('admin.departments.destroy', $department->id) }}" class="delete-item"><i class="fa fa-trash"></i></a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
