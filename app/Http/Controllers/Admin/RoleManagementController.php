<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
//use http\Env\Request;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class RoleManagementController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:permission-assign|role-permission-lists|role-permission-create|role-permission-edit|role-permission-show|role-permission-delete', ['only' => ['index']]);
        $this->middleware('permission:role-permission-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-permission-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:permission-assign', ['only' => ['assignPermission']]);
        $this->middleware('permission:role-permission-show', ['only' => ['show']]);
        $this->middleware('permission:role-permission-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::orderBy('id', 'desc')->get();


        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {

        $role =new Role();
        $role->name = $request->name;
        $role->guard_name  = 'web';
        $role->save();

        return redirect()->route('admin.roles.index')->with('success', 'Role has been created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $rolePermissions = $role->with('permissions')->findOrFail($role->id);

        return view('admin.role.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    // role edit form post
    public function roleEdit(Request $request)
    {
        $role = Role::findOrFail($request->id);
        return view('admin.role.edit_modal', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role = Role::findOrFail($role->id);
        $role->name = $request->name;
        $role->update();
        return redirect()->back()->with('success', 'Role has been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //return $role;
        $role =Role::findOrFail($role->id);
        $role->delete();
        return redirect()->back()->with('success', 'Role has been Deleted Successfully');
    }


    // permission assign form post

    public function assignPermission($id)
    {
        $role = Role::findOrFail($id);
        $selelcted_permission = $role->permissions->pluck('name')->toArray();
        $all_permissions = Permission::get();
        //$all_permissions= $all_permissions->groupBy('type');
        //return $all_permissions;

        return view('admin.role.assign_permission', compact('role','all_permissions','selelcted_permission' ));
    }
    public function assignPermissionUpdate(Request $request,$id)
    {
        $role = Role::findOrFail($id);
        $role->syncPermissions($request->permission);
//        dd($role->syncPermissions($request->permission));

        return redirect()->back()->with('success','Permission has been updated successfully');
    }

}
