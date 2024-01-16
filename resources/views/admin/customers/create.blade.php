@extends('layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between">
    <h2>@lang('app.customer.addCustomer')</h2>
    <a class="btn btn-primary" href="{{ route('admin.customers.index') }}">< @lang('app.back')</a>
</div>
<form action="{{ route('admin.customers.store') }}" method="post" class="customer-form">
    @csrf
    <div class="additional"></div>
    <div class="row">
        <div class="col-md-4">
            <label class="companyNameLabel">@lang('app.customer.companyName')</label>
            <label class="d-none nameLabel">@lang('app.name')</label>
            <input name="company_name" id="company_name" class="form-control" type="text" required />
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.customerType')</label>
            <select name="customer_type" id="customer_type" class="form-control addType" required>
                <option value="Organisation">Organisation</option>
                <option value="Person">Person</option>
            </select>
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.vatNumber')</label>
            <input name="vat_number" id="vat_number" class="form-control vatNumber" type="text" />
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <label>@lang('app.customer.gstNumber')</label>
            <input name="gst_number" id="gst_number" class="form-control gstNumber" type="text" />
        </div>
        <div class="col-md-4">
            <label class="officialContactNoLabel">@lang('app.customer.officialContactNo')</label>
            <label class="d-none contactNumberLabel">@lang('app.customer.contactNumber')</label>
            <input name="official_contact_no" id="official_contact_no" class="form-control" type="text"/>
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.email')</label>
            <input name="email" id="email" class="form-control" type="email"/>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <label>@lang('app.customer.website')</label>
            <input name="website" id="website" class="form-control" type="text" />
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.source')</label>
            <select name="source_id" id="source_id" class="form-control">
                <option value="">@lang('app.select')</option>
                @foreach($data['sources'] as $source)
                <option value="{{ $source->id }}">{{ $source->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <label>@lang('app.customer.companyType')</label>
            <select name="company_type_id" id="company_type_id" class="form-control">
                <option value="">@lang('app.select')</option>
                @foreach($data['companyTypes'] as $companyType)
                    <option value="{{ $companyType->id }}">{{ $companyType->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.category')</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="">@lang('app.select')</option>
                @foreach($data['categories'] as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.currency')</label>
            <select name="currency_id" id="currency_id" class="form-control">
                <option value="">@lang('app.select')</option>
                @foreach($data['currencies'] as $currency)
                <option value="{{ $currency->id }}">{{ $currency->currency_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <label>@lang('app.customer.address')</label>
            <input name="address" id="address" class="form-control" type="text" />
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.country')</label>
            <select name="country_id" id="country_id" class="form-control">
                <option value="">@lang('app.select')</option>
                @foreach($data['countries'] as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.state')</label>
            <input name="state" id="state" class="form-control" type="text" />
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <label>@lang('app.customer.city')</label>
            <input name="city" id="city" class="form-control" type="text" />
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.zipCode')</label>
            <input name="zipcode" id="zipcode" class="form-control" type="text" />
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.language')</label>
            <select name="language_ids[]" id="language_ids" class="form-control select2" multiple>
                <option value="">@lang('app.select')</option>
                @foreach($data['languages'] as $language)
                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12">
            <label>@lang('app.customer.companyInformation')</label>
            <textarea name="company_information" rows="2" id="company_information" class="form-control"></textarea>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <button type="button" id="billingShippingBtn" class="btn btn-primary">@lang('app.customer.billing & shipping')</button>
        </div>
    </div>

    <div class="row mt-2 d-none" id="billingshippingContent">
        <div class="row mt-3">
            <div class="col-md-3">
                <h6>@lang('app.customer.billingAddress')</h6>
            </div>
            <div class="col-md-3">
                <h6><a href="#" class="float-end billingSameAsCustomer"><small>@lang('app.customer.customerBillingSameAsCustomer')</small></a></h6>

            </div>
            <div class="col-md-3">
                <h6>@lang('app.customer.shippingAddress')</h6>
            </div>
            <div class="col-md-3">
                <h6><a href="#" class="float-end customerCopyBillingAddress"><small>@lang('app.customer.customerBillingCopy')</small></a></h6>
            </div>
        </div>

        <div class="col-md-6">
            <label>@lang('app.customer.billing_address')</label>
            <input name="billing_address" id="billing_address" class="form-control" type="text" />
        </div>
        <div class="col-md-6">
            <label>@lang('app.customer.shipping_address')</label>
            <input name="shipping_address" id="shipping_address" class="form-control" type="text" />
        </div>
        <div class="col-md-6">
            <label>@lang('app.customer.billingCity')</label>
            <input name="billing_city" id="billing_city" class="form-control" type="text" />
        </div>
        <div class="col-md-6">
            <label>@lang('app.customer.shippingCity')</label>
            <input name="shipping_city" id="shipping_city" class="form-control" type="text" />
        </div>
        <div class="col-md-6">
            <label>@lang('app.customer.billingState')</label>
            <input name="billing_state" id="billing_state" class="form-control" type="text" />
        </div>
        <div class="col-md-6">
            <label>@lang('app.customer.shippingState')</label>
            <input name="shipping_state" id="shipping_state" class="form-control" type="text" />
        </div>
        <div class="col-md-6">
            <label>@lang('app.customer.billingZip')</label>
            <input name="billing_zip" id="billing_zip" class="form-control" type="text" />
        </div>
        <div class="col-md-6">
            <label>@lang('app.customer.shippingZip')</label>
            <input name="shipping_zip" id="shipping_zip" class="form-control" type="text" />
        </div>
        <div class="col-md-6">
            <label>@lang('app.customer.billingCountry')</label>
            <select name="billing_country" id="billing_country" class="form-control">
                <option value="">@lang('app.select')</option>
                @foreach($data['countries'] as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label>@lang('app.customer.shippingCountry')</label>
            <select name="shipping_country" id="shipping_country" class="form-control">
                <option value="">@lang('app.select')</option>
                @foreach($data['countries'] as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <button class="btn btn-primary float-end  save-and-add-contact customer-form-submiter" onclick="save_customer();">@lang('app.saveCustomerAndAddContact')
            </button>
            <button class="btn btn-primary float-end marginRight5 customer-form-submiter" onclick="save_customer();">@lang('app.save')</button>
        </div>
    </div>
</form>

@endsection

@section('script')
    <script>
        $('.customer-form-submiter').on('click', function() {
            var form = $('.customer-form');
            if (form.valid()) {
                if ($(this).hasClass('save-and-add-contact')) {
                    form.find('.additional').html('<input type="hidden" name="save_and_add_contact" value="true">');
                } else {
                    form.find('.additional').html('');
                }
                form.submit();
            }
        });
    </script>
@endsection
