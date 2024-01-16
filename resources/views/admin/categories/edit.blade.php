@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <h2>@lang('app.category.editCategory')</h2>
    <a class="btn btn-primary" href="{{ route('admin.categories.index') }}">< @lang('app.back')</a>
</div>
<form action="{{ route('admin.categories.update',$category->id) }}" method="post" id="form">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <label>@lang('app.name')</label>
            <input name="name" id="name" class="form-control" type="text" required value="{{$category->name}}"/>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <button class="btn btn-primary float-end" type="submit">@lang('app.save') <i class="fa fa-spinner fa-spin" style="display:none;"></i></button>
        </div>
    </div>
</form>
@endsection