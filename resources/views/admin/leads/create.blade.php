@extends('layouts.app')

@section('content')

<div class="d-flex align-items-center justify-content-between">
    <h2>@lang('app.lead.addLead')</h2>
    <a class="btn btn-primary" href="{{ route('admin.leads.index') }}">@lang('app.back')</a>
</div>

<form action="{{ route('admin.leads.store') }}" method="post" class="lead-form" id="form">
    @csrf

    <div class="additional"></div>

    <div class="row">
        <div class="col-md-4">
            <label class="NameLabel">@lang('app.name')</label>
            <input name="name" id="name" class="form-control" type="text" required />
        </div>

        <div class="col-md-4">
            <label>@lang('app.lead.address')</label>
            <input name="address" id="address" class="form-control" type="text" />
        </div>

        <div class="col-md-4">
            <label>@lang('app.lead.position')</label>
            <input name="title" id="title" class="form-control" type="text" />
        </div>

        <div class="col-md-4">
            <label>@lang('app.lead.city')</label>
            <input name="city" id="city" class="form-control" type="text" />
        </div>

        <div class="col-md-4">
            <label>@lang('app.lead.state')</label>
            <input name="state" id="state" class="form-control" type="text" />
        </div>

        <div class="col-md-4">
            <label>@lang('app.lead.website')</label>
            <input name="website" id="website" class="form-control" type="text" />
        </div>

        <div class="col-md-4">
            <label>@lang('app.lead.country')</label>
            <select name="country" id="country" class="form-control">
                <option value="">@lang('app.select')</option>
                @foreach($data['countries'] as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label>@lang('app.lead.phone')</label>
            <input name="phonenumber" id="phonenumber" class="form-control" type="text" />
        </div>

        <div class="col-md-4">
            <label>@lang('app.lead.zip_code')</label>
            <input name="zip" id="zip" class="form-control" type="text" />
        </div>

        <div class="col-md-4">
            <label>@lang('app.lead.lead_value')</label>
            <input name="lead_value" id="lead_value" class="form-control" type="text" />
        </div>

        <div class="col-md-4">
            <label>@lang('app.lead.default_language')</label>
            <select name="default_language" id="default_language" class="form-control" >
                <option value="">@lang('app.select')</option>

                @foreach($data['languages'] as $language)
                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label>@lang('app.lead.company')</label>
            <input name="company" id="company" class="form-control" type="text" />
        </div>

        <!-- Add the rest of your form fields here -->

    </div>

    <div class="row mt-2">
        <div class="col-md-4">
            <label>@lang('app.lead.email')</label>
            <input name="email" id="email" class="form-control" type="email"/>
        </div>

        <div class="col-md-4">
            <label for="tags" class="control-label"><i class="fa fa-tag" aria-hidden="true"></i> Tags</label>
            <select id="tag-input" name="tags[]" multiple="multiple" class="form-control" data-role="tagsinput">
                @foreach($existingTags as $tag)
                    <option value="{{ $tag }}">{{ $tag }}</option>
                @endforeach
            </select>
        </div>
        <!-- Add other fields here -->
    </div>


    <div class="row">
        <div class="col-md-6">
            <label>@lang('app.lead.description')</label>
            <textarea name="description" id="description" class="form-control" rows="4"></textarea>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <button class="btn btn-primary float-end" type="submit">Submit <i class="fa fa-spinner fa-spin" style="display:none;"></i></button>
        </div>
    </div>

</form>

@endsection

