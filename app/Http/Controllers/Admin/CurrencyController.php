<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CurrencyRequest;
use App\Services\CurrencyService;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:currencies-list|currencies-create|currencies-edit|currencies-delete', ['only' => ['index','store','create','edit','update','destroy']]);
         $this->middleware('permission:currencies-create', ['only' => ['create','store']]);
         $this->middleware('permission:currencies-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:currencies-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = __('app.currency.currency');
        $currencies = CurrencyService::getAll();
        return view('admin.currencies.index', compact('title', 'currencies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = __('app.currency.addCurrency');
        return view('admin.currencies.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CurrencyRequest $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            CurrencyService::store($data);
            return response([
                'success'       => true,
                'message'       => __('messages.currency.saveSuccess'),
                'redirect_url'  => route('admin.currencies.index')
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
        $title = __('app.currency.editCurrency');
        $currency = CurrencyService::getByColumn('id', $id);
        return view('admin.currencies.edit',compact('title', 'currency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CurrencyRequest $request, string $id)
    {
        if($request->ajax())
        {
            CurrencyService::update($id, $request->all());
            return response([
                'success'       => true,
                'message'       => __('messages.currency.updateSuccess'),
                'redirect_url'  => route('admin.currencies.index')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        if($request->ajax()){
            $currency = CurrencyService::getByColumn('id', $id);
            $currency->delete();
            return response()->json([
                'success' => true,
                'message' => __('messages.currency.deleteSuccess'),
            ]);

        }
    }
}
