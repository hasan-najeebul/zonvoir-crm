<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResignationStatusRequest;
use App\Services\ResignationStatusService;
use Illuminate\Http\Request;

class ResignationStatusController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:resignation_statuses-list|resignation_statuses-create|resignation_statuses-edit|resignation_statuses-delete', ['only' => ['index','store','create','edit','update','destroy']]);
         $this->middleware('permission:resignation_statuses-create', ['only' => ['create','store']]);
         $this->middleware('permission:resignation_statuses-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:resignation_statuses-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Resignation statuses';
        $resignationStatuses = ResignationStatusService::index();
        return view('admin.resignation-statuses.index', compact('title', 'resignationStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Resignation Status';
        return view('admin.resignation-statuses.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResignationStatusRequest $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            ResignationStatusService::store($data);
            return response([
                'success'       => true,
                'message'       => 'Resignation status has been created successfully.',
                'redirect_url'  => route('admin.resignation-statuses.index')
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
        $title  = 'Edit Resignation status';
        $resignationStatus = ResignationStatusService::getByColumn('id', $id);
        return view('admin.resignation-statuses.edit',compact('title', 'resignationStatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ResignationStatusRequest $request, string $id)
    {
        if($request->ajax())
        {
            ResignationStatusService::update($id, $request->all());
            return response([
                'success'       => true,
                'message'       => 'Resignation status has been updated successfully.',
                'redirect_url'  => route('admin.resignation-statuses.index')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $resignationStatus = ResignationStatusService::getByColumn('id', $id);
            $resignationStatus->delete();
            return response()->json([
                'success' => true,
                'message' => 'Resignation status has been deleted successfully.',
            ]);
        }
    }
}
