<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

class GroupController extends Controller
{
    public function index()
    {
        return response()->json(Group::all(), 200);
    }

    public function view(Group $group)
    {
        return response()->json($group, 200); 
    }

    public function store(Request $request)
    {
        $data = Group::create([
            'group' => $request->group,
            'user_id' => $request->user_id
        ]);

        return response()->json([
            'status' => $data,
            'message' => $data ? 'Group Created' : 'Error Creating Group'
        ]);
    }

    public function update(Request $request, Group $group)
    {
        $status = $group->update([
            'group' => $request->group,
            'user_id' => $request->user_id
        ]);

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Group Updated' : 'Error Updating Group'
        ]);
    }

    public function destroy(Group $group)
    {
        $status = $group->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Group Deleted' : 'Error Deleting Group'
        ]);
    }
}
