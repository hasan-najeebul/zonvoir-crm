
@extends('layouts.app')

@section('content')

<form action="{{ route('admin.settings.localization.saveOrUpdate') }}" method="post" class="localization-form" id="form">
    @csrf

    <div class="mb-3">
        <label for="date_format" class="form-label">Date Format</label>
        <select class="form-select" name="date_format">
            @foreach(get_available_date_formats() as $storedFormat => $displayFormat)
                <option value="{{ $storedFormat }}" {{ isset($localInfo['date_format']) && $localInfo['date_format'] == $storedFormat ? 'selected' : '' }}>
                    {{ $displayFormat }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="time_zone" class="form-label">Time Zone</label>
        <select class="form-select" name="time_zone">
            @foreach(timezone_identifiers_list() as $timeFormat => $timeDisplay)
                <option value="{{ $timeFormat }}" {{ isset($localInfo['time_zone']) && $localInfo['time_zone'] == $timeFormat ? 'selected' : '' }}>
                    {{ $timeDisplay }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="time_format" class="form-label">Time Format</label>
        <select class="form-select" name="time_format">
            <option value="h:i A" {{ isset($localInfo['time_format']) == "h:i A" ? 'selected' : '' }}>12-hour format</option>
            <option value="H:i" {{ isset($localInfo['time_format']) == "H:i" ? 'selected' : '' }}>24-hour format</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="default_language" class="form-label">Default Language</label>
        <select class="form-select" name="default_language">

            @foreach($languages as $language)
                <option value="{{ $language->name }}" {{ isset($localInfo['default_language']) && $language->name == $localInfo['default_language'] ? 'selected' : '' }}>
                    {{ $language->name }}
                </option>
            @endforeach
        </select>
    </div>


    <div class="mb-3">
        <label for="table_pagination_limit" class="form-label">Table Pagination Limits</label>
        <input type="number" class="form-control" name="table_pagination_limit" value="{{ $localInfo['table_pagination_limit'] ?? ''  }}">
    </div>

    <div class="mb-3">
        <label for="kanban_pagination_limit" class="form-label">Kanban Pagination Limits</label>
        <input type="number" class="form-control" name="kanban_pagination_limit" value="{{ $localInfo['kanban_pagination_limit'] ?? ''  }}">
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <button class="btn btn-primary float-end mr-2 settings-form-submit" type="submit">Save</button>
        </div>
    </div>
</form>

@endsection


