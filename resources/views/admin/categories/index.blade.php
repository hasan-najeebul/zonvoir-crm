@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <h2>@lang('app.category.categories')</h2>
    @can('categories-create')
    <a class="btn btn-primary" href="{{ route('admin.categories.create') }}"><i class="fa fa-plus"></i> @lang('app.category.addCategory')</a>
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
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>
                    @can('categories-edit')
                    <a href="{{ route('admin.categories.edit', $category->id) }}"><i class="fa fa-edit"></i></a>
                    @endcan
                    @can('categories-delete')
                    <a href="{{ route('admin.categories.destroy', $category->id) }}" class="delete-item"><i class="fa fa-trash"></i></a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
