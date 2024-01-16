@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <h2>Skills</h2>
    @can('skills-create')
    <a class="btn btn-primary" href="{{ route('admin.skills.create') }}"><i class="fa fa-plus"></i> Add Skill</a>
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
        @foreach($skills as $key => $skill)
            <tr>
                <td>{{ $skill->name }}</td>
                <td>
                    @can('skills-edit')
                    <a href="{{ route('admin.skills.edit', $skill->id) }}"><i class="fa fa-edit"></i></a>
                    @endcan
                    @can('skills-delete')
                    <a href="{{ route('admin.skills.destroy', $skill->id) }}" class="delete-item"><i class="fa fa-trash"></i></a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
