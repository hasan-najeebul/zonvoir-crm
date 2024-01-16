@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <h2>@lang('app.source.sources')</h2>
    @can('sources-create')
    <a class="btn btn-primary" href="{{ route('admin.sources.create') }}"><i class="fa fa-plus"></i> @lang('app.source.addSource')</a>
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
        @foreach($sources as $source)
            <tr>
                <td>{{ $source->name }}</td>
                <td>
                    @can('sources-edit')
                    <a href="{{ route('admin.sources.edit', $source->id) }}"><i class="fa fa-edit"></i></a>
                    @endcan
                    @can('sources-delete')
                    <a href="{{ route('admin.sources.destroy', $source->id) }}" class="delete-item"><i class="fa fa-trash"></i></a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
