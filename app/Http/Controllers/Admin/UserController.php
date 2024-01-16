<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:users-list|users-create|users-edit|users-delete', ['only' => ['index','store','create','edit','update','destroy']]);
         $this->middleware('permission:users-create', ['only' => ['create','store']]);
         $this->middleware('permission:users-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:users-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Users';
        $users = UserService::index();
        $data = UserService::getRelatedData();
        return view('admin.users.index', compact('title', 'users','data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create User';
        $data = UserService::getRelatedData();
        return view('admin.users.create',compact('title','data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
            UserService::store($data);
            return response([
                'success'       => true,
                'message'       => 'User has been created successfully.',
                'redirect_url'  => route('admin.users.index')
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
        $title  = 'Edit User';
        $user   = UserService::getByColumn('id', $id);
        $data   = UserService::getRelatedData();
        return view('admin.users.edit',compact('title', 'user', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->ajax())
        {
            UserService::update($id, $request->all());
            return response([
                'success'       => true,
                'message'       => 'User has been updated successfully.',
                'redirect_url'  => route('admin.users.index')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $user = UserService::getByColumn('id', $id);
            $user->delete();
            return response()->json([
                'success' => true,
                'message' => 'User has been deleted successfully.',
            ]);
        }
    }
}
