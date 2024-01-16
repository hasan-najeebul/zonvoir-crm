@extends('layouts.app')
@section('content')
<div class="d-flex align-items-center justify-content-between">
    <h2>@lang('app.contact')</h2>
</div>
<form action="{{ route('admin.customer-contacts.update',$contact->id) }}" class="contact-form" autocomplete="off" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div>
            @if(isset($contact))
                <img @if(!empty($contact->profile_image)) src="{{ asset($contact->profile_image) }}" @else src="{{ asset('img/avatar.png') }}" @endif height="100" width="100" title="img" class="rounded-circle" />
                <hr />
            @endif
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.contact.profileImage')</label>
            <input name="profile_image" id="profile_image" class="form-control" type="file" value="{{$contact->profile_image}}"/>
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.contact.firstName')</label>
            <input name="first_name" id="first_name" class="form-control" type="text" required value="{{$contact->first_name}}"/>
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.contact.lastName')</label>
            <input name="last_name" id="last_name" class="form-control" type="text" required value="{{$contact->last_name}}"/>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <label>@lang('app.customer.contact.positionInCompany')</label>
            <input name="position_in_company" id="position_in_company" class="form-control" type="text" value="{{$contact->position_in_company}}"/>
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.contact.email')</label>
            <input name="email" id="email" class="form-control" type="email" required value="{{$contact->email}}"/>
        </div>
        <div class="col-md-4">
            <label>@lang('app.customer.contact.contactNo')</label>
            <input name="contact_number" id="contact_number" class="form-control" type="text" value="{{$contact->contact_number}}" />
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <label>@lang('app.customer.contact.password')</label>
            <input name="password" id="password" class="form-control" type="password" />
        </div>
        <div class="col-md-4 mt-4">
            <input type="checkbox" name="primary_contact" id="primary_contact" @if($contact->primary_contact == 1) checked @endif >
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
                    <span>{{ $permission['name'] }}</span>
                </div>
                <div class="col-md-6 mtop10">
                    <div class="onoffswitch">
                        <input type="checkbox" id="{{$permission['id']}}" class="onoffswitch-checkbox" @if(isset($contact) && has_contact_permission($permission['short_name'],$contact->id)) checked @endif value="{{ $permission['id'] }}" name="permissions[]">
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
                        <input type="checkbox" id="invoice_emails" data-perm-id="" class="onoffswitch-checkbox" @if(isset($contact) && $contact->invoice_emails == '1') checked @endif value="invoice_emails" name="invoice_emails">
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
                        <input type="checkbox" id="estimate_emails" data-perm-id="" class="onoffswitch-checkbox" @if(isset($contact) && $contact->estimate_emails == '1') checked @endif value="estimate_emails" name="estimate_emails">
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
                        <input type="checkbox" id="credit_note_emails" data-perm-id="" class="onoffswitch-checkbox" @if(isset($contact) && $contact->credit_note_emails == '1') checked @endif value="credit_note_emails" name="credit_note_emails">
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
                        <input type="checkbox" id="support_ticket_emails" data-perm-id="" class="onoffswitch-checkbox" @if(isset($contact) && $contact->support_ticket_emails == '1') checked @endif value="support_ticket_emails" name="support_ticket_emails">
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
                        <input type="checkbox" id="project_emails" data-perm-id="" class="onoffswitch-checkbox" @if(isset($contact) && $contact->project_emails == '1') checked @endif value="project_emails" name="project_emails">
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
                        <input type="checkbox" id="contract_emails" data-perm-id="" class="onoffswitch-checkbox" @if(isset($contact) && $contact->contract_emails == '1') checked @endif value="contract_emails" name="contract_emails">
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
                        <input type="checkbox" id="task_emails" data-perm-id="" class="onoffswitch-checkbox" @if(isset($contact) && $contact->task_emails == '1') checked @endif value="task_emails" name="task_emails">
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
                        <input type="checkbox" id="proposal_emails" data-perm-id="" class="onoffswitch-checkbox" @if(isset($contact) && $contact->proposal_emails == '1') checked @endif value="proposal_emails" name="proposal_emails">
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

