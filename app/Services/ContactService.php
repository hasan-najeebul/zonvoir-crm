<?php

namespace App\Services;

use App\Models\Contact;
use App\Models\ContactPermission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

/**
 * Class ContactService.
 */
class ContactService
{
    public static function contactList()
    {
        return Contact::get();
    }

    public static function addContact(array $data)
    {
        $data['password'] = self::getHashedPassword($data);
        $data['profile_image']  = self::getProfileImage($data);
        $customer_id = $data['customer_id'];

        if (isset($data['primary_contact'])) {
            $data['primary_contact'] = 1;
            $contact = Contact::where('customer_id', $customer_id)->update(['primary_contact' => 0,]);
        }else{
            $data['primary_contact'] = 0;
        }

        if (isset($data['permissions'])) {
            $permissions = $data['permissions'];
            unset($data['permissions']);
        }

        $data['invoice_emails']     = isset($data['invoice_emails']) ? 1 :0;
        $data['estimate_emails']    = isset($data['estimate_emails']) ? 1 :0;
        $data['credit_note_emails'] = isset($data['credit_note_emails']) ? 1 :0;
        $data['contract_emails']    = isset($data['contract_emails']) ? 1 :0;
        $data['task_emails']        = isset($data['task_emails']) ? 1 :0;
        $data['project_emails']     = isset($data['project_emails']) ? 1 :0;
        $data['proposal_emails']    = isset($data['proposal_emails']) ? 1 :0;
        $data['support_ticket_emails'] = isset($data['support_ticket_emails']) ? 1 :0;

        $contact = Contact::create($data);
        $contact_id = $contact->id;
        if ($contact_id && isset($data['permissions'])) {
            foreach ($permissions as $permission) {
                ContactPermission::create([
                    'permission_id' => $permission,
                    'contact_id'    => $contact_id,
                ]);
            }
        }
        return $contact;
    }

    public static function getProfileImage($data)
    {
        if(isset($data['profile_image']) && $data['profile_image']!=''){
            $profile = $data['profile_image'];
            $fileName = date('Ymdhis').'.'.$profile->getClientOriginalExtension();
            $destinationPath = public_path('images/contact/');
            if (! File::exists($destinationPath)){
                File::makeDirectory($destinationPath, 0777, true);
            }
            $profile->move( $destinationPath, $fileName );
            return 'images/contact/'.$fileName;
        }
    }

    public static function getHashedPassword($data)
    {
        if(isset($data['password']) && $data['password']!=''){
            return Hash::make($data['password']);
        }
    }

    public static function updateContact($id, array $data)
    {
        $contact = self::getByColumn('id', $id);
        if(!empty($data['password'])){
            $data['password'] = self::getHashedPassword($data);
        }else{
            unset($data['password']);
        }
        if(!empty($data['profile_image'])){
            $data['profile_image']  = self::getProfileImage($data);
            $image_path = public_path("\\"). $contact->profile_image;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
        }else{
            unset($data['profile_image']);
        }
        $customer_id = $contact->customer_id;
        $data['primary_contact'] = isset($data['primary_contact']) ? 1 : 0;
        $permissions = isset($data['permissions']) ? $data['permissions'] : [];

        $data['invoice_emails']     = isset($data['invoice_emails']) ? 1 :0;
        $data['estimate_emails']    = isset($data['estimate_emails']) ? 1 :0;
        $data['credit_note_emails'] = isset($data['credit_note_emails']) ? 1 :0;
        $data['contract_emails']    = isset($data['contract_emails']) ? 1 :0;
        $data['task_emails']        = isset($data['task_emails']) ? 1 :0;
        $data['project_emails']     = isset($data['project_emails']) ? 1 :0;
        $data['proposal_emails']    = isset($data['proposal_emails']) ? 1 :0;
        $data['support_ticket_emails'] = isset($data['support_ticket_emails']) ? 1 :0;

        $contact->update($data);

        if (isset($data['primary_contact']) && $data['primary_contact'] == 1) {
            $contact = Contact::where('customer_id', $customer_id)->where('id', '!=', $id)->update(['primary_contact' => 0,]);
        }

        $contact_permissions = self::getContactPermissions($id);
        $existing_permissions = array_column($contact_permissions, 'permission_id');
        // Delete permissions that are not in the updated list
        ContactPermission::where('contact_id', $id)
            ->whereNotIn('permission_id', $permissions)
            ->delete();

        // Insert new permissions or skip if already exists
        foreach ($permissions as $permission) {
            if (!in_array($permission, $existing_permissions)) {
                ContactPermission::create([
                    'permission_id' => $permission,
                    'contact_id'    => $id,
                ]);
            }
        }

        return $contact;
    }

    public static function delete($id)
    {
        $contact = self::getByColumn('id', $id);
        $image_path = public_path("\\"). $contact->profile_image;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $contact->delete();
        if ($contact->deleted_at != null || $contact->isDeleted()){
            ContactPermission::where('contact_id', $id)->delete();
            return $contact;
        }
        return false;
    }

    public static function getByColumn($columnName, $columnValue)
    {
        return Contact::where($columnName, $columnValue)->first();
    }

    public static function getContactPermissions($id)
    {
        return ContactPermission::where('contact_id', $id)->get()->toArray();
    }

    public static function customerContactList($id)
    {
        return Contact::where('customer_id', $id)->get();
    }

    public static function getContact($id)
    {
        return Contact::where('id', $id)->first();

    }
}
