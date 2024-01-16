@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <h2>Edit LangCountryuage</h2>
    <a class="btn btn-primary" href="{{ route('admin.countries.index') }}">< BAck</a>
</div>
<form action="{{ route('admin.countries.update',$country->id) }}" method="post" id="form">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <label>Short Name</label>
            <input name="shortname" id="shortname" class="form-control" type="text" required />
        </div>
        <div class="col-md-6">
            <label>Name</label>
            <input name="name" value="{{ $country->name }}" id="name" class="form-control" type="text" required/>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <button class="btn btn-primary float-end" type="submit">Submit <i class="fa fa-spinner fa-spin" style="display:none;"></i></button>
        </div>
    </div>
</form>
@endsection
