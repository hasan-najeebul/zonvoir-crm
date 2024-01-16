@extends('layouts.app')
@section('content')
<div class="d-flex align-items-center justify-content-between">
    <h2>@lang('app.contact')</h2>
</div>
<form action="{{ route('admin.customer-contacts.store') }}" method="post" class="contact-form" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="customer_id" value="{{$customer_id}}">
    <div class="row">
        <div class="col-md-4">
            <label>@lang('app.customer.contact.profileImage')</label>
            <input name="profile_image" id="profile_image" class="form-control" type="file" />
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.contact.firstName')</label>
            <input name="first_name" id="first_name" class="form-control" type="text" required />
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.contact.lastName')</label>
            <input name="last_name" id="last_name" class="form-control" type="text" required />
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <label>@lang('app.customer.contact.positionInCompany')</label>
            <input name="position_in_company" id="position_in_company" class="form-control" type="text" />
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.contact.email')</label>
            <input name="email" id="email" class="form-control" type="email" required />
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.contact.contactNo')</label>
            <input name="contact_number" id="contact_number" class="form-control" type="text"/>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <label>@lang('app.customer.contact.password')</label>
            <input name="password" id="password" class="form-control" type="password" required />
        </div>
        <div class="col-md-4 mt-4">
            <input type="checkbox" name="primary_contact" id="primary_contact" >
            <label for="primary_contact">@lang('app.customer.contact.primaryContact')</label>
        </div>
    </div>
    <div class="row mt-4">
        <p class="fw-bold">@lang('app.customer.contact.contactPermissions')</p>
        <p class="text-danger">@lang('app.customer.contact.contactPermissionsInfo')</p>
        @foreach($contactPermissions as $permission)
        <div class="col-md-6 row">
            <div class="row">
                <div class="col-md-6 mtop10 border-right">
                    <span>{{$permission['name']}}</span>
                </div>
                <div class="col-md-6 mtop10">
                    <div class="onoffswitch">
                        <input type="checkbox" id="{{ $permission['id'] }}" class="onoffswitch-checkbox" value="{{ $permission['id'] }}" name="permissions[]">
                        <label class="onoffswitch-label" for="{{ $permission['id'] }}"></label>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row mt-4">
        <p class="fw-bold">@lang('app.customer.contact.emailNotifications')</p>
        <div class="col-md-6 row">
            <div class="row">
                <div class="col-md-6 mtop10 border-right">
                    <span>@lang('app.customer.contact.contactPermissionInvoice')</span>
                </div>
                <div class="col-md-6 mtop10">
                    <div class="onoffswitch">
                        <input type="checkbox" id="invoice_emails" data-perm-id="" class="onoffswitch-checkbox" value="invoice_emails" name="invoice_emails">
                        <label class="onoffswitch-label" for="invoice_emails"></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 row">
            <div class="row">
                <div class="col-md-6 mtop10 border-right">
                    <span>@lang('app.customer.contact.estimate')</span>
                </div>
                <div class="col-md-6 mtop10">
                    <div class="onoffswitch">
                        <input type="checkbox" id="estimate_emails" data-perm-id="" class="onoffswitch-checkbox" value="estimate_emails" name="estimate_emails">
                        <label class="onoffswitch-label" for="estimate_emails"></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 row">
            <div class="row">
                <div class="col-md-6 mtop10 border-right">
                    <span>@lang('app.customer.contact.creditNote')</span>
                </div>
                <div class="col-md-6 mtop10">
                    <div class="onoffswitch">
                        <input type="checkbox" id="credit_note_emails" data-perm-id="" class="onoffswitch-checkbox" value="credit_note_emails" name="credit_note_emails">
                        <label class="onoffswitch-label" for="credit_note_emails"></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 row">
            <div class="row">
                <div class="col-md-6 mtop10 border-right">
                    <span>@lang('app.customer.contact.supportTicket')</span>
                </div>
                <div class="col-md-6 mtop10">
                    <div class="onoffswitch">
                        <input type="checkbox" id="support_ticket_emails" data-perm-id="" class="onoffswitch-checkbox" value="support_ticket_emails" name="support_ticket_emails">
                        <label class="onoffswitch-label" for="support_ticket_emails"></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 row">
            <div class="row">
                <div class="col-md-6 mtop10 border-right">
                    <span>@lang('app.customer.contact.projects')</span>
                </div>
                <div class="col-md-6 mtop10">
                    <div class="onoffswitch">
                        <input type="checkbox" id="project_emails" data-perm-id="" class="onoffswitch-checkbox" value="project_emails" name="project_emails">
                        <label class="onoffswitch-label" for="project_emails"></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 row">
            <div class="row">
                <div class="col-md-6 mtop10 border-right">
                    <span>@lang('app.customer.contact.contactPermissionContract')</span>
                </div>
                <div class="col-md-6 mtop10">
                    <div class="onoffswitch">
                        <input type="checkbox" id="contract_emails" data-perm-id="" class="onoffswitch-checkbox" value="contract_emails" name="contract_emails">
                        <label class="onoffswitch-label" for="contract_emails"></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 row">
            <div class="row">
                <div class="col-md-6 mtop10 border-right">
                    <span>@lang('app.customer.contact.task')</span>
                </div>
                <div class="col-md-6 mtop10">
                    <div class="onoffswitch">
                        <input type="checkbox" id="task_emails" data-perm-id="" class="onoffswitch-checkbox" value="task_emails" name="task_emails">
                        <label class="onoffswitch-label" for="task_emails"></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 row">
            <div class="row">
                <div class="col-md-6 mtop10 border-right">
                    <span>@lang('app.customer.contact.contactPermissionProposal')</span>
                </div>
                <div class="col-md-6 mtop10">
                    <div class="onoffswitch">
                        <input type="checkbox" id="proposal_emails" data-perm-id="" class="onoffswitch-checkbox" value="proposal_emails" name="proposal_emails">
                        <label class="onoffswitch-label" for="proposal_emails"></label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <button class="btn btn-primary float-end" onclick="save_contact();">@lang('app.save')</button>
        </div>
    </div>
</form>

@endsection
