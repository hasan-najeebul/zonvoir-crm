@extends('layouts.app')
@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        @if(Auth::guard('contact')->check())
        <?php $id = Auth::guard('contact')->id(); ?>
        <ul class="navbar-nav">
            @if (has_contact_permission('project', $id))
                <li class="nav-item"><a href="#">@lang('app.customer.contact.contactPermissionProject')</a></li>
            @endif
            @if (has_contact_permission('invoice', $id))
                <li class="nav-item"><a class="nav-link" href="#">@lang('app.customer.contact.contactPermissionInvoice')</a></li>
            @endif
            @if (has_contact_permission('contract', $id))
                <li class="nav-item"><a class="nav-link" href="#">@lang('app.customer.contact.contactPermissionContract')</a></li>
            @endif
            @if (has_contact_permission('estimates', $id))
                <li class="nav-item"><a class="nav-link" href="#">@lang('app.customer.contact.contactPermissionEstimate')</a></li>
            @endif
            @if (has_contact_permission('proposal', $id))
                <li class="nav-item"><a class="nav-link" href="#">@lang('app.customer.contact.contactPermissionProposal')</a></li>
            @endif
            @if (has_contact_permission('products', $id))
                <li class="nav-item"><a class="nav-link" href="#">@lang('app.customer.contact.contactPermissionProduct')</a></li>
            @endif
            @if (has_contact_permission('support', $id))
                <li class="nav-item"><a class="nav-link" href="#">@lang('app.customer.contact.contactPermissionSupport')</a></li>
            @endif

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if(isset($contact))
                    <img @if(!empty($contact->profile_image)) src="{{ asset($contact->profile_image) }}" @else src="{{ asset('img/avatar.png') }}" @endif
                    title="{{ $contact->first_name . ' ' .$contact->last_name }}" data-bs-toggle="tooltip" data-bs-placement="bottom" height="30" width="30" class="rounded-circle marginRight5" />
                    @endif
                </a>
                <ul class="dropdown-menu" style="z-index: 2000;">
                    <li>
                        <a class="dropdown-item" href="{{route('contact-logout')}}">@lang('app.logout')</a>
                    </li>
                </ul>
            </li>
        </ul>
        @endif
    </div>
</nav>
@endsection
