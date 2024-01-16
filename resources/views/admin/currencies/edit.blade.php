@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <h2>@lang('app.currency.editCurrency')</h2>
    <a class="btn btn-primary" href="{{ route('admin.currencies.index') }}">< @lang('app.back')</a>
</div>
<form action="{{ route('admin.currencies.update', $currency->id) }}" method="post" id="form">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-4">
            <label>@lang('app.currency.currencyName')</label>
            <input name="currency_name" id="currency_name" class="form-control" type="text" value="{{$currency->currency_name}}"  />
        </div>
        <div class="col-md-4">
            <label>@lang('app.currency.currencyCode')</label>
            <input name="currency_code" id="currency_code" class="form-control" type="text" value="{{$currency->currency_code}}"  />
        </div>
        <div class="col-md-4">
            <label>@lang('app.currency.currencySymbol')</label>
            <input name="currency_symbol" id="currency_symbol" class="form-control" type="text" value="{{$currency->currency_symbol}}" />
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <button class="btn btn-primary float-end" type="submit">@lang('app.save') <i class="fa fa-spinner fa-spin" style="display:none;"></i></button>
        </div>
    </div>
</form>
@endsection
