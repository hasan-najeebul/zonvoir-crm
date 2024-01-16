@extends('layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between">
    <h2>@lang('app.project.addProject')</h2>
    <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">< @lang('app.back')</a>
</div>
<form action="{{ route('admin.projects.store') }}" method="post" class="project-form" id="form" autocomplete="off">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <label for="project_name">@lang('app.project.projectName')</label>
            <input name="project_name" id="project_name" class="form-control" type="text" required/>
        </div>
        <div class="col-md-4">
            <label for="start_date">@lang('app.project.startDate')</label>
            <input name="start_date" id="start_date" class="form-control" type="date" required/>
        </div>
        <div class="col-md-4">
            <label for="deadline">@lang('app.project.deadline')</label>
            <input name="deadline" id="deadline" class="form-control" type="date"/>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <label for="customer_id ">@lang('app.project.customer')</label>
            <select name="customer_id" id="customer_id" class="form-control select2" required>
                <option value="">--</option>
                @foreach ($customers as $customer)
                    <option value="{{$customer->id}}">{{$customer->company_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="billing_type">@lang('app.project.billingType')</label>
            <select name="billing_type" id="billing_type" class="form-control" required>
                <option value=""></option>
                <option value="1">Fixed Rate</option>
                <option value="2">Project Hours</option>
                <option value="3" selected>Task Hours</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="status">@lang('app.status')</label>
            <select name="status" id="status" class="form-control">
                <option value=""></option>
                <option value="1">Not Started</option>
                <option value="2" selected>In Progress</option>
                <option value="3">On Hold</option>
                <option value="4">Cancelled</option>
                <option value="5">Finished</option>
            </select>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <input type="hidden" name="progress" value="">
            <label for="progressRange" class="form-label">@lang('app.project.progress') <span class="label_progress">0%</span></label>
            <input type="range" class="form-range" value="0" max="100" id="progressRange" disabled>
        </div>
        <div class="col-md-4 mt-4">
            <div class="checkbox checkbox-success">
                <input type="checkbox" checked name="progress_from_tasks" id="progress_from_tasks">
                <label for="progress_from_tasks">@lang('app.project.calculateProgressThroughTasks')</label>
            </div>
        </div>
        <div class="col-md-4 d-none" id="project_cost">
            <label for="project_cost" class="control-label">@lang('app.project.totalRate')</label>
            <input type="number" id="project_cost" name="project_cost" class="form-control">
        </div>
        <div class="col-md-4 d-none" id="project_rate_per_hour">
            <label for="project_rate_per_hour" class="control-label">@lang('app.project.ratePerHour')</label>
            <input type="number" id="project_rate_per_hour" name="project_rate_per_hour" class="form-control">
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-4">
            <label for="estimated_hours" class="control-label">@lang('app.project.estimatedHours')</label>
            <input type="number" id="estimated_hours" name="estimated_hours" class="form-control" value="">
        </div>
        <div class="col-md-4">
            <label for="members ">@lang('app.project.members')</label>
            <select name="members[]" id="members" class="form-control select2" multiple>
                <option value="">--</option>
                @foreach ($members as $member)
                    <option value="{{$member->id}}">{{$member->first_name .' '.$member->last_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12">
            <label for="tag-input" class="control-label"><i class="fa fa-tag" aria-hidden="true"></i> @lang('app.project.tags')</label>
            <select id="tag-input" name="tags[]" multiple class="form-control" data-role="tagsinput">
                @foreach($existingTags as $tag)
                    <option value="{{ $tag }}">{{ $tag }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12">
            <label for="project_description">@lang('app.project.description')</label>
            <textarea name="project_description" rows="2" id="project_description" class="form-control"></textarea>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <button class="btn btn-primary float-end marginRight5">@lang('app.save')</button>
        </div>
    </div>
</form>

@endsection
