@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.roles.index') }}"> Back </a>
        </div>
    </div>
</div>


<form method="POST" id="form" action="{{ route('admin.roles.update', $role->id) }}">
    @csrf
    @method('PATCH')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $role->name }}" placeholder="Name" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 form-group">
                <strong>Color:</strong>

                <input type="text" name="color" id="color" class="form-control colorpicker" value="{{ $role['color'] }}" placeholder="">

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permission:</strong>
                <br>

                @foreach($permission as $value)
                    <label>
                        <input type="checkbox" name="permission[]" value="{{ $value->name }}"
                            {{ in_array($value->id, $rolePermissions) ? 'checked' : '' }} class="name">
                        {{ $value->name }}
                    </label>
                    <br>
                @endforeach
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>
    <script>
        $('.colorpicker').colorpicker();
    </script>
@stop
