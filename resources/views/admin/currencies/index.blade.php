@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <h2>@lang('app.currency.currencies')</h2>
    @can('currencies-create')
    <a class="btn btn-primary" href="{{ route('admin.currencies.create') }}"><i class="fa fa-plus"></i> @lang('app.currency.addCurrency')</a>
    @endcan
</div>

<table class="table" style="margin-top:25px;">
    <thead>
        <tr>
            <th>@lang('app.currency.currencyName')</th>
            <th>@lang('app.currency.currencyCode')</th>
            <th>@lang('app.currency.currencySymbol')</th>
            <th>@lang('app.action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($currencies as $currency)
            <tr>
                <td>{{ $currency->currency_name }}</td>
                <td>{{ $currency->currency_code }}</td>
                <td>{{ $currency->currency_symbol }}</td>

                <td>
                    @can('currencies-edit')
                    <a href="{{ route('admin.currencies.edit', $currency->id) }}"><i class="fa fa-edit"></i></a>
                    @endcan
                    @can('currencies-delete')
                    <a href="{{ route('admin.currencies.destroy', $currency->id) }}" class="delete-item"><i class="fa fa-trash"></i></a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
