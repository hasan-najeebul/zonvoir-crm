@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Management</h2>
        </div>
        <div class="pull-right">
            @can('role-create')
                <a class="btn btn-success" href="{{ route('admin.roles.create') }}"> Create New Role </a>
            @endcan
        </div>
    </div>
</div>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Color</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($roles as $key => $role)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $role->name }}</td>
            <td style="background-color:{{ $role->color }}; width:70px"></td>
            <td>
                <a href="{{ route('admin.roles.show', $role->id) }}"><i class="fa fa-eye"></i></a>
                @can('role-edit')
                    <a href="{{ route('admin.roles.edit', $role->id) }}"><i class="fa fa-edit"></i></a>
                    @endcan
                @can('role-delete')
                    <a href="{{ route('admin.roles.destroy', $role->id) }}" class="delete-item"><i class="fa fa-trash"></i></a>
                @endcan
            </td>
        </tr>
    @endforeach
</table>

{{ $roles->render() }}

@endsection
