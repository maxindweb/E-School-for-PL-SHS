<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function index()
    {
        return response()->json(Role::all(),200);
    }

    public function store(Request $request)
    {
        $role = Role::create([
            'role_name' =>$request->input('role_name')
        ]);
        
        return response()->json($role, 200);
    }

    public function show()
    {
        return response()->json(Role::with('user')->get(),200);
    }

    public function update(Request $request, Role $role)
    {
        $data = $role->update([
            'role' => $request->role
        ]);

        return response()->json([
            'status' => $data,
            'message' => $data ? 'Role Updated' : 'Error Updating Role'
        ]);
    }

    public function destroy(Role $role)
    {
        $status = $role->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Role Deleted' : 'Error Deleting Role'
        ]);
    }
}
