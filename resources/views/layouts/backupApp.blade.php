<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title.' ||' : ''  }} {{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- color picker --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link href="{{ asset("assets/toastr/css/toastr.min.css?v='.time()") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("css/custom.css?v='.time()") }}" rel="stylesheet" type="text/css"/>

</head>
<body>
    <div class="container mt-4">
        <div id="app">
            <main class="py-4">
                @if(Auth::check())
                <p>
                    <a class="btn btn-success" href="{{ route('admin.dashboard') }}" >@lang('app.dashboard')</a>
                    <a class="btn btn-success" href="{{ route('admin.users.index') }}">Users</a>
                    @can('genders-list')
                    <a class="btn btn-success" href="{{ route('admin.genders.index') }}">@lang('app.gender.genders')</a>
                    @endcan
                    @can('employee-types-list')
                    <a class="btn btn-success" href="{{ route('admin.employee-types.index') }}">@lang('app.employeeType.employeeTypes')</a>
                    @endcan
                    @can('skills-list')
                    <a class="btn btn-success" href="{{ route('admin.skills.index') }}">Skills</a>
                    @endcan
                    @can('languages-list')
                    <a class="btn btn-success" href="{{ route('admin.languages.index') }}">Languages</a>
                    @endcan
                    @can('countries-list')
                    <a class="btn btn-success" href="{{ route('admin.countries.index') }}">Countries</a>
                    @endcan
                    @can('departments-list')
                    <a class="btn btn-success" href="{{ route('admin.departments.index') }}">Departments</a>
                    @endcan
                    @can('resignation_statuses-list')
                    <a class="btn btn-success" href="{{ route('admin.resignation-statuses.index') }}">Resignation Status</a>
                    @endcan
                    @can('customers-list')
                    <a class="btn btn-success" href="{{ route('admin.customers.index') }}">@lang('app.customer.customers')</a>
                    @endcan
                    @can('company_types-list')
                    <a class="btn btn-success" href="{{ route('admin.company-types.index') }}">@lang('app.companyType.companyTypes')</a>
                    @endcan
                    @can('currencies-list')
                    <a class="btn btn-success" href="{{ route('admin.currencies.index') }}">@lang('app.currency.currencies')</a>
                    @endcan
                    @can('categories-list')
                    <a class="btn btn-success" href="{{ route('admin.categories.index') }}">@lang('app.category.categories')</a>
                    @endcan
                    @can('sources-list')
                    <a class="btn btn-success" href="{{ route('admin.sources.index') }}">@lang('app.source.sources')</a>
                    @endcan
                    <a class="btn btn-success" href="{{ route('admin.settings.general') }}">@lang('app.general.general')</a>
                    <a class="btn btn-success" href="{{ route('admin.settings.companyInfo') }}">@lang('app.comapny_info.company_name')</a>
                    <a class="btn btn-success" href="{{ route('admin.settings.localization') }}">@lang('app.localization.localization')</a>
                    <a class="btn btn-success" href="{{ route('admin.settings.emailSetting') }}">@lang('app.emailSetting.emailSetting')</a>
                    <a class="btn btn-success" href="{{ route('admin.settings.currencySetting') }}">@lang('app.currencySetting.currencySetting')</a>
                    @can('leads-list')
                    <a class="btn btn-success" href="{{ route('admin.leads.index') }}">@lang('app.lead.leads')</a>
                    @endcan
                    @can('role-list')
                    <a class="btn btn-success" href="{{ route('admin.roles.index') }}">@lang('app.role.roles')</a>
                    @endcan
                    @can('projects-list')
                    <a class="btn btn-success my-2" href="{{ route('admin.projects.index') }}">@lang('app.project.projects')</a>
                    @endcan
                    <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">@lang('app.logout')</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </p>
                @endif
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ asset("assets/toastr/js/toastr.init.js?v='.time()") }}"></script>
    <script src="{{ asset("assets/toastr/js/toastr.min.js?v='.time()") }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <script src="{{ asset("js/custom.js?v='.time()") }}"></script>
    @yield('script')
  </body>
</html>
