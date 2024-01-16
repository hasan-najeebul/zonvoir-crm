@extends('layouts.app')

@section('content')
<div class="row mt-3">
    <div class="col-md-6">
        <h2>@lang('app.customer.customers')</h2>
    </div>
    <div class="col-md-6">
        @can('contacts-list')
        <a class="btn btn-primary float-end" href="{{ route('admin.customer-contacts.index') }}">@lang('app.customer.contact.contacts')</a>
        @endcan
        @can('customers-create')
        <a class="btn btn-primary float-end marginRight5" href="{{ route('admin.customers.create') }}"><i class="fa fa-plus"></i> @lang('app.customer.addCustomer')</a>
        @endcan
    </div>
</div>

<table class="table" style="margin-top:25px;">
    <thead>
        <tr>
            <th>@lang('app.name')</th>
            <th>@lang('app.customer.customerType')</th>
            <th>@lang('app.customer.vatNumber')</th>
            <th>@lang('app.customer.gstNumber')</th>
            <th>@lang('app.customer.officialContactNo')</th>
            <th>@lang('app.customer.email')</th>
            <th>@lang('app.customer.website')</th>
            <th>@lang('app.customer.address')</th>
            <th>@lang('app.customer.companyType')</th>
            <th>@lang('app.action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->company_name }}</td>
                <td>{{ $customer->customer_type }}</td>
                <td>{{ $customer->vat_number }}</td>
                <td>{{ $customer->gst_number }}</td>
                <td>{{ $customer->official_contact_no }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->website }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ $customer->company_type_id ? $customer->companyType->name : '' }}</td>
                <td>
                    @can('customers-edit')
                    <a href="{{ route('admin.customers.edit', $customer->id) }}"><i class="fa fa-edit"></i></a>
                    @endcan
                    @can('customers-delete')
                    <a href="{{ route('admin.customers.destroy', $customer->id) }}" class="delete-item"><i class="fa fa-trash"></i></a>
                    @endcan
                    @can('contacts-list')
                    <a href="{{ route('admin.customerContactList' , $customer->id) }}"><i class="fa fa-user"></i></a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
