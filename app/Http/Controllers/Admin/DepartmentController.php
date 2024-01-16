<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Services\DepartmentService;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:departments-list|departments-create|departments-edit|departments-delete', ['only' => ['index','store','create','edit','update','destroy']]);
         $this->middleware('permission:departments-create', ['only' => ['create','store']]);
         $this->middleware('permission:departments-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:departments-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Departments';
        $departments = DepartmentService::index();
        return view('admin.departments.index', compact('title', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Department';
        return view('admin.departments.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            DepartmentService::store($data);
            return response([
                'success'       => true,
                'message'       => 'Department has been created successfully.',
                'redirect_url'  => route('admin.departments.index')
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
        $title  = 'Edit Department';
        $department = DepartmentService::getByColumn('id', $id);
        return view('admin.departments.edit',compact('title', 'department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, string $id)
    {
        if($request->ajax())
        {
            DepartmentService::update($id, $request->all());
            return response([
                'success'       => true,
                'message'       => 'Department has been updated successfully.',
                'redirect_url'  => route('admin.departments.index')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $department = DepartmentService::getByColumn('id', $id);
            $department->delete();
            return response()->json([
                'success' => true,
                'message' => 'Department has been deleted successfully.',
            ]);
        }
    }
}
