@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <h2>@lang('app.employeeType.employeeTypes')</h2>
    @can('employee_types-create')
    <a class="btn btn-primary" href="{{ route('admin.employee-types.create') }}"><i class="fa fa-plus"></i> @lang('app.employeeType.addEmployeeType')</a>
    @endcan
</div>

<table class="table" style="margin-top:25px;">
    <thead>
        <tr>
            <th>@lang('app.name')</th>
            <th>@lang('app.action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employeeTypes as $key => $employeeType)
            <tr>
                <td>{{ $employeeType->name }}</td>
                <td>
                    @can('employee_types-edit')
                    <a href="{{ route('admin.employee-types.edit', $employeeType->id) }}"><i class="fa fa-edit"></i></a>
                    @endcan
                    @can('employee_types-delete')
                    <a href="{{ route('admin.employee-types.destroy', $employeeType->id) }}" class="delete-item"><i class="fa fa-trash"></i></a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
