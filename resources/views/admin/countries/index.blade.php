@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <h2>Countries</h2>
    @can('countries-create')
    <a class="btn btn-primary" href="{{ route('admin.countries.create') }}"><i class="fa fa-plus"></i> Add Country</a>
    @endcan
</div>

<table class="table" style="margin-top:25px;">
    <thead>
        <tr>
            <th>Name</th>
            <th>Short Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($countries as $key => $country)
            <tr>
                <td>{{ $country->name }}</td>
                <td>{{ $country->shortname }}</td>
                <td>
                    @can('countries-edit')
                    <a href="{{ route('admin.countries.edit', $country->id) }}"><i class="fa fa-edit"></i></a>
                    @endcan
                    @can('countries-delete')
                    <a href="{{ route('admin.countries.destroy', $country->id) }}" class="delete-item"><i class="fa fa-trash"></i></a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $countries->links() }}
@endsection
