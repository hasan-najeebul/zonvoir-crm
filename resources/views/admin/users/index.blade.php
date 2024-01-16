@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <h2>Users</h2>
    @can('users-create')
    <a class="btn btn-primary" href="{{ route('admin.users.create') }}"><i class="fa fa-plus"></i> Add User</a>
    @endcan
</div>


<table class="table" style="margin-top:25px;">
    <thead>
        <tr>
            <th>Employee ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Role</th>
            <th>Role Color</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $key => $user)
            <tr>
                <td>{{ $user->employee_id }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->gender ? $user->gender->name : '' }}</td>
                <td>{{ $user->roles->count() > 0 ? $user->roles()->first()->name : '' }}</td>
                <td style="background-color:{{ $user->roles->count() > 0 ? $user->roles->first()->color : '' }}; width:70px"></td>

                <td>
                    @can('users-edit')
                    <a href="{{ route('admin.users.edit', $user->id) }}"><i class="fa fa-edit"></i></a>
                    @endcan
                    @can('users-delete')
                    <a href="{{ route('admin.users.destroy', $user->id) }}" class="delete-item"><i class="fa fa-trash"></i></a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
