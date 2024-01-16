<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CustomerRequest;
use App\Http\Controllers\Controller;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:customers-list|customers-create|customers-edit|customers-delete', ['only' => ['index','store','create','edit','update','destroy']]);
         $this->middleware('permission:customers-create', ['only' => ['create','store']]);
         $this->middleware('permission:customers-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:customers-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = __('app.customer.customers');
        $customers = CustomerService::index();
        return view('admin.customers.index', compact('title', 'customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = __('app.customer.addCustomer');
        $data = CustomerService::getCustomerRelatedData();
        return view('admin.customers.create',compact('title','data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            $customer = CustomerService::store($data);
            if ($customer) {
                if($request->save_and_add_contact == true){
                    return response([
                        'success'      => true,
                        'message'      => __('messages.customer.saveSuccess'),
                        'redirect_url' => route('admin.customerContact', ['id' => $customer->id])
                    ]);
                }else {
                    return response([
                        'success'      => true,
                        'message'      => __('messages.customer.saveSuccess'),
                        'redirect_url' => route('admin.customers.index')
                    ]);
                }
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = __('app.customer.editCustomer');
        $customer   = CustomerService::getByColumn('id', $id);
        $data   = CustomerService::getCustomerRelatedData();
        return view('admin.customers.edit',compact('title', 'customer', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, $id)
    {
        if($request->ajax())
        {
            CustomerService::update($id, $request->all());
            return response([
                'success'      => true,
                'message'      => __('messages.customer.updateSuccess'),
                'redirect_url' => route('admin.customers.index')
            ]);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        if($request->ajax()){
            $customer = CustomerService::getByColumn('id', $id);
            $customer->delete();
            return response()->json([
                'success' => true,
                'message' => __('messages.customer.deleteSuccess'),
            ]);

        }
    }

}
