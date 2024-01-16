<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SourceRequest;
use App\Services\SourceService;
use Illuminate\Http\Request;
class SourceController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:sources-list|sources-create|sources-edit|sources-delete', ['only' => ['index','store','create','edit','update','destroy']]);
         $this->middleware('permission:sources-create', ['only' => ['create','store']]);
         $this->middleware('permission:sources-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:sources-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = __('app.source.sources');
        $sources = SourceService::getAll();
        return view('admin.sources.index', compact('title','sources'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = __('app.source.addSource');
        return view('admin.sources.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SourceRequest $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            SourceService::store($data);
            return response([
                'success'       => true,
                'message'       => __('messages.source.saveSuccess'),
                'redirect_url'  => route('admin.sources.index')
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
        $title = __('app.source.editSource');
        $source = SourceService::getByColumn('id', $id);
        return view('admin.sources.edit',compact('title', 'source'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SourceRequest $request, string $id)
    {
        if($request->ajax())
        {
            SourceService::update($id, $request->all());
            return response([
                'success'       => true,
                'message'       => __('messages.source.updateSuccess'),
                'redirect_url'  => route('admin.sources.index')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        if($request->ajax()){
            $source = SourceService::getByColumn('id', $id);
            $source->delete();
            return response()->json([
                'success' => true,
                'message' => __('messages.source.deleteSuccess'),
            ]);
        }
    }
}
