
@extends('layouts.app')

@section('content')

<form action="{{ route('admin.settings.currencySetting.saveOrUpdate') }}" method="post" class="currencySetting-form" id="form">
    @csrf

    <div class="mb-3">
        <label for="decimal_separator" class="form-label">Decimal Separator</label>
        <select class="form-select" name="decimal_separator">
            <option value="," {{ isset($currencyInfo['decimal_separator']) && $currencyInfo['decimal_separator'] == ',' ? 'selected' : '' }}>,</option>
            <option value="." {{ isset($currencyInfo['decimal_separator']) && $currencyInfo['decimal_separator'] == '.' ? 'selected' : '' }}>.</option>
        </select>
    </div>


            <div class="mb-3">
                <label for="thousands_separator" class="form-label">Thousands Separator</label>
                <select class="form-select" name="thousands_separator">
                    <option value="," {{ isset($currencyInfo['thousands_separator']) && $currencyInfo['thousands_separator'] == ',' ? 'selected' : '' }}>,</option>
                    <option value="." {{ isset($currencyInfo['thousands_separator']) && $currencyInfo['thousands_separator'] == '.' ? 'selected' : '' }}>.</option>
                    <option value="'"{{isset($currencyInfo['thousands_separator']) && $currencyInfo['thousands_separator']  == "'" ? 'selected' : ''}}>'</option>
                    <option value="None"{{isset($currencyInfo['thousands_separator']) && $currencyInfo['thousands_separator']  == 'None' ? 'selected' : ''}}>None</option>
                    <option value="Space"{{isset($currencyInfo['thousands_separator']) && $currencyInfo['thousands_separator']  == 'Space' ? 'selected' : ''}}>Space</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="show_tax_per_item" class="form-label">Show TAX per item</label>
                <select class="form-select" name="show_tax_per_item">
                    <option value="Yes" {{isset($currencyInfo['show_tax_per_item']) && $currencyInfo['show_tax_per_item']  == 'Yes' ? 'selected' : ''}}>Yes</option>
                    <option value="No" {{isset($currencyInfo['show_tax_per_item']) && $currencyInfo['show_tax_per_item']  == 'No' ? 'selected' : ''}}>No</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="default_tax" class="form-label">Default Tax</label>
                <input type="text" class="form-control" name="default_tax" value="{{ $currencyInfo['default_tax'] ?? '' }}">
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <button class="btn btn-primary float-end mr-2 settings-form-submit" type="submit">Save</button>
                </div>
            </div>
</form>


@endsection


