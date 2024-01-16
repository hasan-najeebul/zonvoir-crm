@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <h2>@lang('app.gender.genders')</h2>
    @can('genders-create')
    <a class="btn btn-primary" href="{{ route('admin.genders.create') }}"><i class="fa fa-plus"></i> @lang('app.gender.addGender')</a>
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
        @foreach($genders as $key => $gender)
            <tr>
                <td>{{ $gender->name }}</td>
                <td>
                    @can('genders-edit')
                    <a href="{{ route('admin.genders.edit', $gender->id) }}"><i class="fa fa-edit"></i></a>
                    @endcan
                    @can('genders-delete')
                    <a href="{{ route('admin.genders.destroy', $gender->id) }}" class="delete-item"><i class="fa fa-trash"></i></a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
