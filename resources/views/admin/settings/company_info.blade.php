@extends('layouts.app')

@section('content')

<form action="{{ route('admin.settings.companyInfo.saveOrUpdate') }}" method="post" class="companyInfo-form" id="form">
    @csrf
    <div class="row">
        <div class="mb-3">
            <label class="form-label">@lang('app.comapny_info.company_name')</label>
            <input type="text" class="form-control" name="company_name" value="{{ $companyInfo['company_name'] ?? '' }}">
        </div>

    <div class="mb-3">
        <label for="company_address" class="form-label">@lang('app.comapny_info.company_address')</label>
        <input type="text" class="form-control"  name="company_address" value="{{ $companyInfo['company_address'] ?? '' }}">
    </div>

    <div class="mb-3">
        <label for="city" class="form-label">@lang('app.comapny_info.city')</label>
        <input type="text" class="form-control"  name="city" value="{{ $companyInfo['city'] ?? '' }}">
    </div>
    <div class="mb-3">
        <label for="state" class="form-label">@lang('app.comapny_info.state')</label>
        <input type="text" class="form-control"  name="state" value="{{ $companyInfo['state'] ?? '' }}">
    </div>
    <div class="mb-3">
        <label for="country" class="form-label">@lang('app.comapny_info.country')</label>
        <input type="text" class="form-control"  name="country" value="{{ $companyInfo['country'] ?? '' }}">
    </div>
    <div class="mb-3">
        <label for="zip_code" class="form-label">@lang('app.comapny_info.zip_code')</label>
        <input type="text" class="form-control"  name="zip_code" value="{{ $companyInfo['zip_code'] ?? '' }}">

    <div class="mb-3">
        <label for="contact_no" class="form-label">@lang('app.comapny_info.contact_no')</label>
        <input type="text" class="form-control"  name="contact_no" value="{{ $companyInfo['contact_no'] ?? '' }}">
    </div>
    <div class="mb-3">
        <label for="vat_no" class="form-label">@lang('app.comapny_info.vat_no')</label>
        <input type="text" class="form-control"  name="vat_no" value="{{ $companyInfo['vat_no'] ?? '' }}">
    </div>
    <div class="mb-3">
        <label for="gst_no" class="form-label">@lang('app.comapny_info.gst_no')</label>
        <input type="text" class="form-control"  name="gst_no" value="{{ $companyInfo['gst_no'] ?? '' }}">
    </div>
    <div class="mb-3">
        <label for="tan_no" class="form-label">@lang('app.comapny_info.tan_no')</label>
        <input type="text" class="form-control"  name="tan_no" value="{{ $companyInfo['tan_no'] ?? '' }}">
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <button class="btn btn-primary float-end mr-2 companyInfo-form-submiter" type="submit">Save</button>
        </div>
    </div>

</div>
</form>


@endsection


