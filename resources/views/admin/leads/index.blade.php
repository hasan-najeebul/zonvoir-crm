@extends('layouts.app')

@section('content')
<div class="row mt-3">
    <div class="col-md-6">
        <h2>@lang('app.lead.leads')</h2>
    </div>
    <div class="col-md-6">
        @can('leads-create')
        <a class="btn btn-primary float-end marginRight5" href="{{ route('admin.leads.create') }}"><i class="fa fa-plus"></i> @lang('app.lead.addLead')</a>
        @endcan
    </div>
</div>

<table class="table" style="margin-top:25px;">
    <thead>
        <tr>
            <th>@lang('app.name')</th>
            <th>@lang('app.lead.address')</th>
            <th>@lang('app.lead.position')</th>
            <th>@lang('app.lead.city')</th>
            <th>@lang('app.lead.email')</th>
            <th>@lang('app.lead.state')</th>
            <th>@lang('app.lead.website')</th>
            <th>@lang('app.lead.country')</th>
            <th>@lang('app.lead.phone')</th>
            <th>@lang('app.lead.zip_code')</th>
            <th>@lang('app.lead.lead_value')</th>
            <th>@lang('app.lead.default_language')</th>
            <th>@lang('app.lead.company')</th>
            <th>@lang('app.lead.description')</th>
            <th>@lang('app.action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($leads as $lead)
            <tr>
                <td>{{ $lead->name }}</td>
                <td>{{ $lead->address }}</td>
                <td>{{ $lead->title }}</td>
                <td>{{ $lead->city }}</td>
                <td>{{ $lead->email }}</td>
                <td>{{ $lead->state }}</td>
                <td>{{ $lead->website }}</td>
                <td>{{ $countryMap[$lead->country] ?? '' }}</td>
                <td>{{ $lead->phonenumber }}</td>
                <td>{{ $lead->zip }}</td>
                <td>{{ $lead->lead_value }}</td>
                <td>{{ $languages[$lead->default_language] ?? '' }}</td>
                <td>{{ $lead->company }}</td>
                <td>{{ $lead->description }}</td>
                <td>{{ $lead->company_type_id ? $lead->companyType->name : '' }}</td>
                <td>
                    @can('leads-edit')
                    <a href="{{ route('admin.leads.edit', $lead->id) }}"><i class="fa fa-edit"></i></a>
                    @endcan
                    @can('leads-delete')
                    <a href="{{ route('admin.leads.destroy', $lead->id) }}" class="delete-item"><i class="fa fa-trash"></i></a>
                    @endcan
                    {{-- @can('contacts-list')
                    <a href="{{ route('admin.leadContactList' , $lead->id) }}"><i class="fa fa-user"></i></a>
                    @endcan --}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
