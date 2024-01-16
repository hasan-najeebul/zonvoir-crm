@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <h2>Edit Skill</h2>
    <a class="btn btn-primary" href="{{ route('admin.skills.index') }}">< BAck</a>
</div>
<form action="{{ route('admin.skills.update',$skill->id) }}" method="post" id="form">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <label>Name</label>
            <input name="name" value="{{ $skill->name }}" id="name" class="form-control" type="text" required />
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <button class="btn btn-primary float-end" type="submit">Submit <i class="fa fa-spinner fa-spin" style="display:none;"></i></button>
        </div>
    </div>
</form>
@endsection
