@extends('layouts.app')

@section('content')
    <form action="{{ route('admin.settings.general.saveOrUpdate') }}" method="post" enctype="multipart/form-data"
        class="general-form" id="form">
        @csrf

            <div class="row">

                    <div class="col-md-4">
                        <label class="companyLogoLabel">Company Logo</label>

                        @if (!empty($generalInfo['company_logo']))
                            <img src="{{ asset('images/logo/' . ($generalInfo['company_logo'])) }}" alt="Company Logo"
                                class="selected-logo" style="max-width: 100px; max-height: 100px;">
                        @endif

                        <input name="company_logo" id="company_logo" class="form-control" type="file"
                            value="{{ $generalInfo['company_logo'] ?? '' }}" required />
                    </div>
                    <div class="col-md-4">
                        <label>Company DARK Logo</label>

                        @if (!empty($generalInfo['company_dark_logo']))
                            <img src="{{ asset('images/logo/' . ($generalInfo['company_dark_logo'])) }}" alt="Company Dark Logo"
                                class="selected-logo" style="max-width: 100px; max-height: 100px;">
                        @endif

                        <input name="company_dark_logo" id="company_dark_logo" class="form-control" type="file"  value="{{ $generalInfo['company_dark_logo'] ?? '' }}"
                            required />
                    </div>
                    <div class="col-md-4">
                        <label>Favicon</label>

                        @if (!empty($generalInfo['favicon']))
                            <img src="{{ asset('images/logo/' . ($generalInfo['favicon'])) }}" alt="Favicon"
                                class="selected-logo" style="max-width: 100px; max-height: 100px;">
                        @endif

                        <input name="favicon" id="favicon" class="form-control gstNumber" type="file" value="{{ $generalInfo['favicon'] ?? '' }}"/>
                    </div>
            </div>

            <div class="row mt-2">
                    <div class="col-md-4">
                        <label>App Title</label>
                        <input name="apptitle" id="apptitle" class="form-control" value="{{ $generalInfo['apptitle'] ?? '' }}" type="text" />
                    </div>

                    <div class="col-md-4">
                        <label>Allowed File Types</label>
                        <input name="allowed_file_types" id="allowed_file_types" class="form-control" value="{{ $generalInfo['allowed_file_types'] ?? '' }}" type="text" />
                    </div>
            </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <button class="btn btn-primary float-end marginRight5 general-form-submitter" type="submit">Save</button>
            </div>
        </div>
    </form>
@endsection
