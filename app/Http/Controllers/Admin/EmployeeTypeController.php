<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeTypeRequest;
use App\Services\EmployeeTypeService;
use Illuminate\Http\Request;

class EmployeeTypeController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:employee_types-list|employee_types-create|employee_types-edit|employee_types-delete', ['only' => ['index','store','create','edit','update','destroy']]);
         $this->middleware('permission:employee_types-create', ['only' => ['create','store']]);
         $this->middleware('permission:employee_types-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:employee_types-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = __('app.employeeType.employeeTypes');
        $employeeTypes = EmployeeTypeService::index();
        return view('admin.employee-types.index', compact('title', 'employeeTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = __('app.employeeType.addEmployeeType');
        return view('admin.employee-types.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeTypeRequest $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            EmployeeTypeService::store($data);
            return response([
                'success'       => true,
                'message'       => __('messages.employeeType.saveSuccess'),
                'redirect_url'  => route('admin.employee-types.index')
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
    public function edit(Request $request, $id)
    {
        $title = __('app.employeeType.editEmployeeType');
        $employeeType = EmployeeTypeService::getByColumn('id', $id);
        return view('admin.employee-types.edit',compact('title', 'employeeType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeTypeRequest $request, string $id)
    {
        if($request->ajax())
        {
            EmployeeTypeService::update($id, $request->all());
            return response([
                'success'       => true,
                'message'       => __('messages.employeeType.updateSuccess'),
                'redirect_url'  => route('admin.employee-types.index')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $employeeType = EmployeeTypeService::getByColumn('id', $id);
            $employeeType->delete();
            return response()->json([
                'success' => true,
                'message' => __('messages.employeeType.deleteSuccess'),
            ]);
        }
    }
}
