@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <h2>Languages</h2>
    @can('languages-create')
    <a class="btn btn-primary" href="{{ route('admin.languages.create') }}"><i class="fa fa-plus"></i> Add Language</a>
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
        @foreach($languages as $key => $language)
            <tr>
                <td>{{ $language->name }}</td>
                <td>
                    @can('languages-edit')
                    <a href="{{ route('admin.languages.edit', $language->id) }}"><i class="fa fa-edit"></i></a>
                    @endcan
                    @can('languages-delete')
                    <a href="{{ route('admin.languages.destroy', $language->id) }}" class="delete-item"><i class="fa fa-trash"></i></a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
