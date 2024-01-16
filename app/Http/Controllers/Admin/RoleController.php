<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\RoleUser;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\RoleRequest;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store','create','edit','update','destroy']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('admin.roles.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('admin.roles.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {

        $role = Role::create([
            'name' => $request->input('name'),
            'color' => $request->input('color'),
        ]);
        $role->syncPermissions($request->input('permission'));


        return response([
            'success'       => true,
            'message'       => 'Role has been created successfully.',
            'redirect_url'  => route('admin.roles.index'),

        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return view('admin.roles.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permission = Permission::get();
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('admin.roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
      
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->color = $request->input('color');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return response([
            'success'       => true,
            'message'       => 'Role has been updated successfully.',
            'redirect_url'  => route('admin.roles.index')
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $role = Role::findOrFail($id);
    //     $role->delete();

    //     return response([
    //         'success'       => true,
    //         'message'       => 'Role has been deleted successfully.',
    //         'redirect_url'  => route('admin.roles.index')
    //     ]);
    // }


        public function destroy($id)
        {
            // Check if the role has associated users in the role_user pivot table
            $userCount = RoleUser::where('role_id', $id)->count();

            if ($userCount > 0) {
                return response([
                    'success' => false,
                    'message' => 'The ID of the role is already in use.',
                ]);
            }

            // If no associated users, proceed with deleting the role
            $role = Role::findOrFail($id);
            $role->delete();

            return response([
                'success'       => true,
                'message'       => 'Role has been deleted successfully.',
                'redirect_url'  => route('admin.roles.index'),
            ]);
        }
}
