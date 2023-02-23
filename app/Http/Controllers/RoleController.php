<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        //Policie
        $this->authorize('viewAny');

        $roles = Role::all();

        return response()->json(['roles' => $roles]);
    }

    public function show($id)
    {
        //Policie
        $this->authorize('view');

        $role = Role::find($id);

        return response()->json(['role' => $role]);
    }

    public function store(Request $request)
    {
        //Policie
        $this->authorize('create');

        $role = Role::create(['name' => $request->nameOfRole, 'guard_name' => 'web',]);

        return response()->json(['message' => 'Role Added Successfuly', 'role' => $role]);
    }

    public function destroy($role_id)
    {
        $role = Role::find($role_id);

        if (!$role) return response()->json(['message' => 'Role Not Found']);

        //Policie
        $this->authorize('delete');

        $role->delete();

        return response()->json(['message' => 'Role Deleted Successfuly']);
    }

    public function assignPermissions(Request $request)
    {
        //Policie
        $this->authorize('assignPermissions');

        $role = Role::find($request->role_id);

        if (!$role) return response()->json(['message' => 'Role Not Found']);

        $permission = Permission::find($request->permission_id);

        if (!$permission) return response()->json(['message' => 'Permission Not Found']);

        $role->givePermissionTo($permission);

        return response()->json(['message' => 'Permission assigned successfuly']);
    }

    public function assignRole(Request $request)
    {
        //Policie
        $this->authorize('assignRole');

        $user = User::where('id', $request->user_id)->first();

        $role = Role::find($request->role_id);

        $user->assignRole($role);

        return response()->json(['message' => 'Role assigned successfuly']);
    }

    public function RemovePermissions(Request $request)
    {
        //Policie
        $this->authorize('RemovePermissions');

        $role = Role::find($request->role_id);

        $permission = Permission::find($request->permission_id);

        $role->revokePermissionTo($permission);

        return response()->json(['message' => 'Permission removed successfuly']);
    }

    public function RemoveRole(Request $request)
    {
        //Policie
        $this->authorize('RemoveRole');

        $user = User::find($request->user_id);
        $role = Role::find($request->role_id);

        $user->removeRole($role);

        return response()->json(['message' => 'Role removed successfuly']);
    }

    public function ShowPermissionsOfaRole(Request $request)
    {
        //Policie
        $this->authorize('ShowPermissionsOfaRole');

        $role = Role::find($request->role_id);

        $permissions = $role->permissions;

        return response()->json(['message' => $permissions]);
    }

    public function ShowRolesOfaPermissions(Request $request)
    {
        //Policie
        $this->authorize('ShowRolesOfaPermissions');

        $user = User::find($request->user_id);

        $roles = $user->getRoleNames();

        return response()->json(['roles' => $roles]);
    }
}
