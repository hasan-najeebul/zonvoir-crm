@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <h2>@lang('app.employeeType.addEmployeeType')</h2>
    <a class="btn btn-primary" href="{{ route('admin.employee-types.index') }}">< @lang('app.back')</a>
</div>
<form action="{{ route('admin.employee-types.store') }}" method="post" id="form">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <label>@lang('app.name')</label>
            <input name="name" id="name" class="form-control" type="text" required />
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <button class="btn btn-primary float-end" type="submit">@lang('app.save') <i class="fa fa-spinner fa-spin" style="display:none;"></i></button>
        </div>
    </div>
</form>
@endsection
