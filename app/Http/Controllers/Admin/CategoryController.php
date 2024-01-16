<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:categories-list|categories-create|categories-edit|categories-delete', ['only' => ['index','store','create','edit','update','destroy']]);
         $this->middleware('permission:categories-create', ['only' => ['create','store']]);
         $this->middleware('permission:categories-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:categories-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = __('app.category.category');
        $categories = CategoryService::getAll();
        return view('admin.categories.index', compact('title','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = __('app.category.addCategory');
        return view('admin.categories.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            CategoryService::store($data);
            return response([
                'success'       => true,
                'message'       => __('messages.category.saveSuccess'),
                'redirect_url'  => route('admin.categories.index')
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
        $title = __('app.category.editCategory');
        $category = CategoryService::getByColumn('id', $id);
        return view('admin.categories.edit',compact('title', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        if($request->ajax())
        {
            CategoryService::update($id, $request->all());
            return response([
                'success'       => true,
                'message'       => __('messages.category.updateSuccess'),
                'redirect_url'  => route('admin.categories.index')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        if($request->ajax()){
            $category = CategoryService::getByColumn('id', $id);
            $category->delete();
            return response()->json([
                'success' => true,
                'message' => __('messages.category.deleteSuccess'),
            ]);
        }
    }
}
