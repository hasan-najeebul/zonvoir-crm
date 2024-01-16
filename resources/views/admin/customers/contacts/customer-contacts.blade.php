@extends('layouts.app')

@section('content')
<div class="row mt-3">
    <div class="col-md-3">
        @can('contacts-create')
        <a class="btn btn-primary" href="{{ route('admin.createCustomerContact',['id' => $id]) }}"><i class="fa fa-plus"></i> @lang('app.customer.contact.addContact')</a>
        @endcan
    </div>
</div>

<table class="table" style="margin-top:25px;">
    <thead>
        <tr>
            <th>@lang('app.customer.contact.firstName')</th>
            <th>@lang('app.customer.contact.lastName')</th>
            <th>@lang('app.customer.contact.email')</th>
            <th>@lang('app.customer.contact.contactNo')</th>
            <th>@lang('app.customer.contact.positionInCompany')</th>
            <th>@lang('app.customer.contact.companyName')</th>
            <th>@lang('app.action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customerContactLists as $contact)
            <tr>
                <td><img @if(!empty($contact->profile_image)) src="{{ asset($contact->profile_image) }}" @else src="{{ asset('img/avatar.png') }}" @endif height="30" width="30" title="img" class="rounded-circle"> {{ $contact->first_name }}</td>
                <td>{{ $contact->last_name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->contact_number }}</td>
                <td>{{ $contact->position_in_company }}</td>
                <td>{{ $contact->customer_id ? $contact->customer->company_name : '' }}</td>
                <td>
                    @can('contacts-edit')
                    <a href="{{ route('admin.customer-contacts.edit', $contact->id) }}"><i class="fa fa-edit"></i></a>
                    @endcan
                    @can('contacts-delete')
                    <a href="{{ route('admin.customer-contacts.destroy', $contact->id) }}" class="delete-item"><i class="fa fa-trash"></i></a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
