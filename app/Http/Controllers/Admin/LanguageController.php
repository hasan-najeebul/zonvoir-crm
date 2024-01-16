<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use App\Services\LanguageService;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:languages-list|languages-create|languages-edit|languages-delete', ['only' => ['index','store','create','edit','update','destroy']]);
         $this->middleware('permission:languages-create', ['only' => ['create','store']]);
         $this->middleware('permission:languages-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:languages-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $title = 'Languages';
        $languages = LanguageService::index();
        return view('admin.languages.index', compact('title', 'languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Language';
        return view('admin.languages.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LanguageRequest $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            LanguageService::store($data);
            return response([
                'success'       => true,
                'message'       => 'Language has been created successfully.',
                'redirect_url'  => route('admin.languages.index')
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
        $title  = 'Edit Language';
        $language = LanguageService::getByColumn('id', $id);
        return view('admin.languages.edit',compact('title', 'language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LanguageRequest $request, string $id)
    {
        if($request->ajax())
        {
            LanguageService::update($id, $request->all());
            return response([
                'success'       => true,
                'message'       => 'Language has been updated successfully.',
                'redirect_url'  => route('admin.languages.index')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $language = LanguageService::getByColumn('id', $id);
            $language->delete();
            return response()->json([
                'success' => true,
                'message' => 'Language has been deleted successfully.',
            ]);
        }
    }
}
