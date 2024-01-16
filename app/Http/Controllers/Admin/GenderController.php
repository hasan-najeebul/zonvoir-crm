<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenderRequest;
use App\Services\GenderService;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
         $this->middleware('permission:genders-list|genders-create|genders-edit|genders-delete', ['only' => ['index','store','create','edit','update','destroy']]);
         $this->middleware('permission:genders-create', ['only' => ['create','store']]);
         $this->middleware('permission:genders-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:genders-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $title = __('app.gender.genders');
        $genders = GenderService::index();
        return view('admin.genders.index', compact('title', 'genders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = __('app.gender.addGender');
        return view('admin.genders.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GenderRequest $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            GenderService::store($data);
            return response([
                'success'       => true,
                'message'       => __('messages.gender.saveSuccess'),
                'redirect_url'  => route('admin.genders.index')
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
        $title = __('app.gender.editGender');
        $gender = GenderService::getByColumn('id', $id);
        return view('admin.genders.edit',compact('title', 'gender'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GenderRequest $request, string $id)
    {
        if($request->ajax())
        {
            GenderService::update($id, $request->all());
            return response([
                'success'       => true,
                'message'       => __('messages.gender.updateSuccess'),
                'redirect_url'  => route('admin.genders.index')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $gender = GenderService::getByColumn('id', $id);
            $gender->delete();
            return response()->json([
                'success' => true,
                'message' => __('messages.gender.deleteSuccess'),
            ]);
        }
    }
}
