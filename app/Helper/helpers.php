<?php

use App\Models\ContactPermission;

/**
 * Predefined contact permission
 * @return array
 */
function get_contact_permissions()
{
    $permissions = [
        [
            'id'         => 1,
            'name'       => __('app.customer.contact.contactPermissionInvoice'),
            'short_name' => 'invoice',
        ],
        [
            'id'         => 2,
            'name'       => __('app.customer.contact.contactPermissionEstimate'),
            'short_name' => 'estimates',
        ],
        [
            'id'         => 3,
            'name'       => __('app.customer.contact.contactPermissionContract'),
            'short_name' => 'contract',
        ],
        [
            'id'         => 4,
            'name'       => __('app.customer.contact.contactPermissionProduct'),
            'short_name' => 'products',
        ],
        [
            'id'         => 5,
            'name'       => __('app.customer.contact.contactPermissionProposal'),
            'short_name' => 'proposal',
        ],
        [
            'id'         => 6,
            'name'       => __('app.customer.contact.contactPermissionProject'),
            'short_name' => 'project',
        ],
        [
            'id'         => 7,
            'name'       => __('app.customer.contact.contactPermissionSupport'),
            'short_name' => 'support',
        ],
    ];

    return  $permissions;
}

/**
 * Check if contact has permission
 * @param  string  $permission permission name
 * @param  string  $contact_id     contact id
 * @return boolean
 */
function has_contact_permission($permission, $contact_id = '')
{
    $permissions = get_contact_permissions();
    foreach ($permissions as $_permission) {
        if ($_permission['short_name'] == $permission) {
            return ContactPermission::where('permission_id', $_permission['id'])->where('contact_id', $contact_id)->count();
        }
    }
    return false;
}

function get_available_date_formats()
{
    $date_formats = [
        'd-m-Y|%d-%m-%Y' => 'd-m-Y',
        'd/m/Y|%d/%m/%Y' => 'd/m/Y',
        'm-d-Y|%m-%d-%Y' => 'm-d-Y',
        'm.d.Y|%m.%d.%Y' => 'm.d.Y',
        'm/d/Y|%m/%d/%Y' => 'm/d/Y',
        'Y-m-d|%Y-%m-%d' => 'Y-m-d',
        'd.m.Y|%d.%m.%Y' => 'd.m.Y',
    ];

    return $date_formats;
}

function getProjectStatus($id)
{
    if($id == 1){
        return 'Not Started';
    }else if($id == 2){
        return 'In Progress';
    }else if($id == 3){
        return 'On Hold';
    }else if($id == 4){
        return 'Cancelled';
    }else if($id == 5){
        return 'Finished';
    }
}


?>
