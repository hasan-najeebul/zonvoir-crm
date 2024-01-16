@extends('layouts.app')

@section('content')
<div class="row mt-3">
    <div class="col-md-6">
        <h2>@lang('app.project.projects')</h2>
    </div>
    <div class="col-md-6">
        @can('projects-create')
        <a class="btn btn-primary float-end marginRight5" href="{{ route('admin.projects.create') }}"><i class="fa fa-plus"></i> @lang('app.project.addProject')</a>
        @endcan
    </div>
</div>

<table class="table" style="margin-top:25px;">
    <thead>
        <tr>
            <th>@lang('app.project.projectName')</th>
            {{-- <th>@lang('app.project.members')</th> --}}
            <th>@lang('app.project.startDate')</th>
            <th>@lang('app.project.deadline')</th>
            <th>@lang('app.project.customer')</th>
            <th>@lang('app.status')</th>
            <th>@lang('app.action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
            <tr>
                <td>{{$project->project_name}}</td>
                {{-- <td></td> --}}
                <td>{{$project->start_date}}</td>
                <td>{{$project->deadline}}</td>
                <td>{{$project->customer_id ? $project->customer->company_name : '' }}</td>
                <td>{{getProjectStatus($project->status)}}</td>
                <td>
                    @can('projects-edit')
                    <a href="{{ route('admin.projects.edit', $project->id) }}"><i class="fa fa-edit"></i></a>
                    @endcan
                    @can('projects-delete')
                    <a href="{{ route('admin.projects.destroy', $project->id) }}" class="delete-item"><i class="fa fa-trash"></i></a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>

</table>
@endsection
