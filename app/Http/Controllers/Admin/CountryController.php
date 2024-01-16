<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Services\CountryService;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
         $this->middleware('permission:countries-list|countries-create|countries-edit|countries-delete', ['only' => ['index','store','create','edit','update','destroy']]);
         $this->middleware('permission:countries-create', ['only' => ['create','store']]);
         $this->middleware('permission:countries-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:countries-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $title = 'Countries';
        $countries = CountryService::index();
        return view('admin.countries.index', compact('title', 'countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Country';
        return view('admin.countries.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryRequest $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            CountryService::store($data);
            return response([
                'success'       => true,
                'message'       => 'Country has been created successfully.',
                'redirect_url'  => route('admin.countries.index')
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
        $title  = 'Edit Country';
        $country = CountryService::getByColumn('id', $id);
        return view('admin.countries.edit',compact('title', 'country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CountryRequest $request, string $id)
    {
        if($request->ajax())
        {
            CountryService::update($id, $request->all());
            return response([
                'success'       => true,
                'message'       => 'Country has been updated successfully.',
                'redirect_url'  => route('admin.countries.index')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $country = CountryService::getByColumn('id', $id);
            $country->delete();
            return response()->json([
                'success' => true,
                'message' => 'Country has been deleted successfully.',
            ]);
        }
    }
}
