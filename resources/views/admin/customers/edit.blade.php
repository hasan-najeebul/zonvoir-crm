@extends('layouts.app')

@section('content')
<div class="row mt-3">
    <div class="col-md-6">
        <h2>@lang('app.customer.editCustomer')</h2>
    </div>
    <div class="col-md-6">
        <a class="btn btn-primary float-end" href="{{ route('admin.customers.index') }}">< @lang('app.back')</a>
        @can('contacts-create')
        <a class="btn btn-primary float-end marginRight5" href="{{ route('admin.createCustomerContact',['id' => $customer->id]) }}"><i class="fa fa-plus"></i> @lang('app.customer.contact.addContact')</a>
        @endcan
    </div>
</div>
<form action="{{ route('admin.customers.update',$customer->id) }}" method="post" class="customer-form">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-4">
            <label class="editCompanyNameLabel">@lang('app.customer.companyName')</label>
            <label class="editNameLabel">@lang('app.name')</label>
            <input name="company_name" id="company_name" class="form-control editNameField" type="text" required value="{{$customer->company_name}}"/>
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.customerType')</label>
            <select name="customer_type" id="customer_type" class="form-control editType" required>
                <option value="Organisation" @if(isset($customer->customer_type)) {{ ($customer->customer_type == 'Organisation' ? "selected":"") }} @endif>Organisation</option>
                <option value="Person" @if(isset($customer->customer_type)) {{ ($customer->customer_type == 'Person' ? "selected":"") }} @endif>Person</option>
            </select>
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.vatNumber')</label>
            <input name="vat_number" id="vat_number" class="form-control editVatNumber" type="text" value="{{$customer->vat_number}}"/>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <label>@lang('app.customer.gstNumber')</label>
            <input name="gst_number" id="gst_number" class="form-control editGstNumber" type="text" value="{{$customer->gst_number}}"/>
        </div>
        <div class="col-md-4">
            <label class="editOfficialContactNoLabel">@lang('app.customer.officialContactNo')</label>
            <label class="editContactNumberLabel">@lang('app.customer.contactNumber')</label>
            <input name="official_contact_no" id="official_contact_no" class="form-control editContactField" type="text" value="{{$customer->official_contact_no}}"/>
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.email')</label>
            <input name="email" id="email" class="form-control" type="email" value="{{$customer->email}}"/>
            @error('email')
                <span class="error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <label>@lang('app.customer.website')</label>
            <input name="website" id="website" class="form-control" type="text" value="{{$customer->website}}"/>
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.source')</label>
            <select name="source_id" id="source_id" class="form-control">
                <option value="">@lang('app.select')</option>
                @foreach($data['sources'] as $source)
                <option value="{{ $source->id }}" @if(!empty($customer->source_id)) {{ ($customer->source->id == $source->id ? "selected":"") }} @endif>{{ $source->name }}</option>
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
                    <option value="{{ $companyType->id }}" @if(!empty($customer->company_type_id)) {{ ($customer->companyType->id == $companyType->id ? "selected":"") }} @endif>{{ $companyType->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.category')</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="">@lang('app.select')</option>
                @foreach($data['categories'] as $category)
                    <option value="{{ $category->id }}" @if(!empty($customer->category_id)) {{ ($customer->category->id == $category->id ? "selected":"") }} @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.currency')</label>
            <select name="currency_id" id="currency_id" class="form-control">
                <option value="">@lang('app.select')</option>
                @foreach($data['currencies'] as $currency)
                <option value="{{ $currency->id }}" @if(!empty($customer->currency_id)) {{ ($customer->currency->id == $currency->id ? "selected":"") }} @endif>{{ $currency->currency_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <label>@lang('app.customer.address')</label>
            <input name="address" id="address" class="form-control" type="text" value="{{$customer->address}}"/>
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.country')</label>
            <select name="country_id" id="country_id" class="form-control">
                <option value="">@lang('app.select')</option>
                @foreach($data['countries'] as $country)
                <option value="{{ $country->id }}" @if(!empty($customer->country_id)) {{ ($customer->country->id == $country->id ? "selected":"") }} @endif>{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.state')</label>
            <input name="state" id="state" class="form-control" type="text" value="{{$customer->state}}"/>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <label>@lang('app.customer.city')</label>
            <input name="city" id="city" class="form-control" type="text" value="{{$customer->city}}"/>
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.zipCode')</label>
            <input name="zipcode" id="zipcode" class="form-control" type="text" value="{{$customer->zipcode}}"/>
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.language')</label>
            <select name="language_ids[]" id="language_ids" class="form-control select2" multiple>
                <option value="">@lang('app.select')</option>
                @foreach($data['languages'] as $language)
                    <option value="{{ $language->id }}" {{ in_array($language->id, $customer->languages->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $language->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12">
            <label>@lang('app.customer.companyInformation')</label>
            <textarea name="company_information" rows="2" id="company_information" class="form-control">{{$customer->company_information}}</textarea>
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
            <input name="billing_address" id="billing_address" class="form-control" type="text" value="{{$customer->billing_address}}"/>
        </div>
        <div class="col-md-6">
            <label>@lang('app.customer.shipping_address')</label>
            <input name="shipping_address" id="shipping_address" class="form-control" type="text" value="{{$customer->shipping_address}}"/>
        </div>
        <div class="col-md-6">
            <label>@lang('app.customer.billingCity')</label>
            <input name="billing_city" id="billing_city" class="form-control" type="text" value="{{$customer->billing_city}}"/>
        </div>
        <div class="col-md-6">
            <label>@lang('app.customer.shippingCity')</label>
            <input name="shipping_city" id="shipping_city" class="form-control" type="text" value="{{$customer->shipping_city}}"/>
        </div>
        <div class="col-md-6">
            <label>@lang('app.customer.billingState')</label>
            <input name="billing_state" id="billing_state" class="form-control" type="text" value="{{$customer->billing_state}}"/>
        </div>
        <div class="col-md-6">
            <label>@lang('app.customer.shippingState')</label>
            <input name="shipping_state" id="shipping_state" class="form-control" type="text" value="{{$customer->shipping_state}}"/>
        </div>
        <div class="col-md-6">
            <label>@lang('app.customer.billingZip')</label>
            <input name="billing_zip" id="billing_zip" class="form-control" type="text" value="{{$customer->billing_zip}}"/>
        </div>
        <div class="col-md-6">
            <label>@lang('app.customer.shippingZip')</label>
            <input name="shipping_zip" id="shipping_zip" class="form-control" type="text" value="{{$customer->shipping_zip}}"/>
        </div>
        <div class="col-md-6">
            <label>@lang('app.customer.billingCountry')</label>
            <select name="billing_country" id="billing_country" class="form-control">
                <option value="">@lang('app.select')</option>
                @foreach($data['countries'] as $country)
                <option value="{{ $country->id }}" @if(!empty($customer->billing_country)) {{ ($customer->billing_country == $country->id ? "selected":"") }} @endif>{{ $country->name }}</option>

                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label>@lang('app.customer.shippingCountry')</label>
            <select name="shipping_country" id="shipping_country" class="form-control">
                <option value="">@lang('app.select')</option>
                @foreach($data['countries'] as $country)
                <option value="{{ $country->id }}" @if(!empty($customer->shipping_country)) {{ ($customer->shipping_country == $country->id ? "selected":"") }} @endif>{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <button class="btn btn-primary float-end" onclick="save_customer();">@lang('app.save') <i class="fa fa-spinner fa-spin" style="display:none;"></i></button>
        </div>
    </div>
</form>

@endsection

@section('script')
<script>

    let editVatNumber = $('.editVatNumber').val();
    let editGstNumber = $('.editGstNumber').val();
    let editNameField = $('.editNameField').val();
    let editContactField = $('.editContactField').val();
    var type = "{{$customer->customer_type}}";

    $("body").on('change', '.editType', function(){
        let typeVal = $(this).find(":selected").val();
        // Organization type handling
        if(typeVal == "Organisation" && type == "Organisation"){
            $('.editCompanyNameLabel, .editOfficialContactNoLabel').removeClass('d-none');
            $('.editContactNumberLabel, .editNameLabel').addClass('d-none');
            $('.editVatNumber').removeAttr("disabled").val(editVatNumber);
            $('.editGstNumber').removeAttr("disabled").val(editGstNumber);
            $('.editNameField').val(editNameField);
            $('.editContactField').val(editContactField);
        }
        // Person type handling
        else if(typeVal == "Person" && type == "Person"){
            $('.editCompanyNameLabel, .editOfficialContactNoLabel').addClass('d-none');
            $('.editContactNumberLabel, .editNameLabel').removeClass('d-none');
            $('.editVatNumber, .editGstNumber').attr("disabled", true).val('');
            $('.editNameField').val(editNameField);
            $('.editContactField').val(editContactField);
        }
        // Handling for other cases
        else if(typeVal == "Person"){
            $('.editCompanyNameLabel, .editOfficialContactNoLabel').addClass('d-none');
            $('.editContactNumberLabel, .editNameLabel').removeClass('d-none');
            $('.editVatNumber, .editGstNumber').attr("disabled", true).val('');
            $('.editNameField, .editContactField').val('');
        } else if(typeVal == "Organisation"){
            $('.editCompanyNameLabel, .editOfficialContactNoLabel').removeClass('d-none');
            $('.editContactNumberLabel, .editNameLabel').addClass('d-none');
            $('.editVatNumber, .editGstNumber').removeAttr("disabled").val('');
            $('.editNameField, .editContactField').val('');
        }
    });

</script>

@endsection
