@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <h2>@lang('app.companyType.companyTypes')</h2>
    
    @can('company_types-create')
    <a class="btn btn-primary" href="{{ route('admin.company-types.create') }}"><i class="fa fa-plus"></i> @lang('app.companyType.addCompanyType')</a>
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
        @foreach($companyTypes as $companyType)
            <tr>
                <td>{{ $companyType->name }}</td>
                <td>
                    @can('company_types-edit')
                    <a href="{{ route('admin.company-types.edit', $companyType->id) }}"><i class="fa fa-edit"></i></a>
                    @endcan
                    @can('company_types-delete')
                    <a href="{{ route('admin.company-types.destroy', $companyType->id) }}" class="delete-item"><i class="fa fa-trash"></i></a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
