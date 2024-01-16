@extends('layouts.app')

@section('content')
<div class="d-flex align-items-center justify-content-between">
    <h2>Create User</h2>
    <a class="btn btn-primary" href="{{ route('admin.users.index') }}">< BAck</a>
</div>
<form action="{{ route('admin.users.store') }}" method="post" id="form">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <label>Profile Image</label>
            <input name="profile_image" id="profile_image" class="form-control" type="file"/>
        </div>
        <div class="col-md-4">
            <label>First Name</label>
            <input name="first_name" id="first_name" class="form-control" type="text" required />
        </div>
        <div class="col-md-4">
            <label>Last Name</label>
            <input name="last_name" id="last_name" class="form-control" type="text" required />
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <label>Date of Birth</label>
            <input name="dob" id="dob" class="form-control" type="date" />
        </div>
        <div class="col-md-4">
            <label>Gender</label>
            <select name="gender_id" id="gender_id" class="form-control" required>
                <option value="">Select</option>
                @foreach($data['genders'] as $gender)
                    <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label>Email</label>
            <input name="email" id="email" class="form-control" type="email" required />
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <label>Password</label>
            <input name="password" id="password" class="form-control" type="password" required />
        </div>
        <div class="col-md-4">
            <label>Employee Types</label>
            <select name="employee_type_id" id="employee_type_id" class="form-control">
                <option value="">Select</option>
                @foreach($data['employeeTypes'] as $employeeType)
                    <option value="{{ $employeeType->id }}">{{ $employeeType->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label>Contact Number</label>
            <input name="contact_number" id="first_name" class="form-control" type="text" />
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <label>Marital Status</label>
            <select name="marital_status" id="marital_status" class="form-control">
                <option value="">Select</option>
                <option value="Married">Married</option>
                <option value="Unmarried">Unmarried</option>
            </select>
        </div>
        <div class="col-md-4">
            <label>Skills</label>
            <select name="skill_ids[]" id="skill_ids" class="form-control select2" multiple>
                <option value="">Select</option>
                @foreach($data['skills'] as $skill)
                    <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label>Languages</label>
            <select name="language_ids[]" id="language_ids" class="form-control select2" multiple>
                <option value="">Select</option>
                @foreach($data['languages'] as $language)
                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <label>Parent Name</label>
            <input name="parent_name" id="parent_name" class="form-control" type="text" />
        </div>
        <div class="col-md-4">
            <label>Address</label>
            <input name="address" id="address" class="form-control" type="text" />
        </div>
        <div class="col-md-4">
            <label>Country</label>
            <select name="country_id" id="country_id" class="form-control">
                <option value="">Select</option>
                @foreach($data['countries'] as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <label>State</label>
            <input name="state" id="state" class="form-control" type="text" />
        </div>
        <div class="col-md-4">
            <label>City</label>
            <input name="city" id="city" class="form-control" type="text" />
        </div>
        <div class="col-md-4">
            <label>Zip Code</label>
            <input name="zipcode" id="zipcode" class="form-control" type="text" />
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <label>Personal Email</label>
            <input name="personal_email" id="personal_email" class="form-control" type="email" />
        </div>
        <div class="col-md-4">
            <label>Roles</label>
            <select name="role_id" id="role_id" class="form-control" required>
                <option value="">Select</option>
                @foreach($data['roles'] as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label>Date of Joining</label>
            <input name="doj" id="doj" class="form-control" type="date" />
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <label>Hourly Rate</label>
            <input name="hourly_rate" id="hourly_rate" class="form-control" type="number" placeholder="0.0" />
        </div>
        <div class="col-md-4">
            <label>Monthly Salary</label>
            <input name="monthly_salary" id="monthly_salary" class="form-control" type="number" placeholder="0.0" />
        </div>
        <div class="col-md-4">
            <label>Department</label>
            <select name="department_id" id="department_id" class="form-control">
                <option value="">Select</option>
                @foreach($data['departments'] as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <label>Resignation Status</label>
            <select name="resignation_status_id" id="resignation_status_id" class="form-control">
                <option value="">Select</option>
                @foreach($data['resignationStatuses'] as $resignationStatus)
                    <option value="{{ $resignationStatus->id }}">{{ $resignationStatus->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label>Notice Period Start Date</label>
            <input name="notice_period_start_date" id="notice_period_start_date" class="form-control" type="date" />
        </div>

        <div class="col-md-4">
            <label>Last Working Date</label>
            <input name="last_working_date" id="last_working_date" class="form-control" type="date" />
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <label>Skype ID</label>
            <input name="skype_id" id="skype_id" class="form-control" type="text" />
        </div>
        <div class="col-md-4">
            <label>Slack ID</label>
            <input name="slack_id" id="slack_id" class="form-control" type="text" />
        </div>
        <div class="col-md-4">
            <label>Status</label>
            <select name="status" id="status" class="form-control">
                <option value="">Select</option>
                <option value="Active">Active</option>
                <option value="Deactive">Deactive</option>
            </select>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12">
            <label>Email Signature</label>
            <textarea name="email_signature" rows="4" id="email_signature" class="form-control"></textarea>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <button class="btn btn-primary float-end" type="submit">Submit <i class="fa fa-spinner fa-spin" style="display:none;"></i></button>
        </div>
    </div>
</form>
@endsection
