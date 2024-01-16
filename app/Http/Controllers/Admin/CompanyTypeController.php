<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyTypeRequest;
use App\Services\CompanyTypeService;
use Illuminate\Http\Request;

class CompanyTypeController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:company_types-list|company_types-create|company_types-edit|company_types-delete', ['only' => ['index','store','create','edit','update','destroy']]);
         $this->middleware('permission:company_types-create', ['only' => ['create','store']]);
         $this->middleware('permission:company_types-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:company_types-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = __('app.companyType.companyTypes');
        $companyTypes = CompanyTypeService::getAll();
        return view('admin.company-types.index', compact('title', 'companyTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = __('app.companyType.addCompanyType');
        return view('admin.company-types.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyTypeRequest $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            CompanyTypeService::store($data);
            return response([
                'success'       => true,
                'message'       => __('messages.companyType.saveSuccess'),
                'redirect_url'  => route('admin.company-types.index')
            ]);

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
        $title = __('app.companyType.editCompanyType');
        $companyType = CompanyTypeService::getByColumn('id', $id);
        return view('admin.company-types.edit',compact('title', 'companyType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyTypeRequest $request, string $id)
    {
        if($request->ajax())
        {
            CompanyTypeService::update($id, $request->all());
            return response([
                'success'       => true,
                'message'       => __('messages.companyType.updateSuccess'),
                'redirect_url'  => route('admin.company-types.index')
            ]);
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        if($request->ajax()){
            $companyType = CompanyTypeService::getByColumn('id', $id);
            $companyType->delete();
            return response()->json([
                'success' => true,
                'message' => __('messages.companyType.deleteSuccess'),
            ]);

        }
    }
}
