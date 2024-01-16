<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerContactRequest;
use App\Services\ContactService;
use Illuminate\Http\Request;

class CustomerContactController extends Controller
{
    /**
     * Display to create customer contact form.
    */
    public function createCustomerContact(Request $request){
        $customer_id = $request->id;
        $title = __('app.customer.contact.addContact');
        $contactPermissions = get_contact_permissions();
        return view('admin.customers.contacts.create', compact('title','customer_id','contactPermissions'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = __('app.customer.contact.contacts');
        $contactLists = ContactService::contactList();
        return view('admin.customers.contacts.index', compact('title', 'contactLists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerContactRequest $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            $addContact = ContactService::addContact($data);
            if($addContact) {
                return response()->json([
                    'success' => true,
                    'message' => __('messages.contact.saveSuccess'),
                    'redirect_url' => route('admin.customer-contacts.index'),
                ]);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = __('app.customer.contact.editContact');
        $contact = ContactService::getByColumn('id', $id);
        $contactPermissions = get_contact_permissions();
        return view('admin.customers.contacts.edit',compact('title', 'contact','contactPermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerContactRequest $request, $id)
    {
        if($request->ajax())
        {
            ContactService::updateContact($id, $request->all());
            return response([
                'success'      => true,
                'message'      => __('messages.contact.updateSuccess'),
                'redirect_url' => route('admin.customer-contacts.index')
            ]);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        if($request->ajax()){
            ContactService::delete($id);
            return response()->json([
                'success' => true,
                'message' => __('messages.contact.deleteSuccess'),
            ]);

        }
    }

    public function customerContactList($id)
    {
        $customerContactLists = ContactService::customerContactList($id);
        return view('admin.customers.contacts.customer-contacts',compact('id','customerContactLists'));
    }
}
