<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\User;
use App\Group;

class CourseController extends Controller
{
    public function index()
    {
        return response()->json(Course::all());
    }

    public function all(User $user, Group $group)
    {
        return response()->json(Course::where('Group', $group ,'or', 'User', $user)->get());
    }

    public function show($id)
    {
        return response()->json();
    }

    public function store(Request $request)
    {
        $course = Course::create([
            'course' => $request->course,
            'group_id' => $request->group_id,
            'category_id' => $request->category_id,
        ]);
    }

    public function update(Request $request, Course $course)
    {
        $data = Course::update([
            'course' => $request->course,
            'group_id' => $request->group_id
        ]);

        return response()->json([
            'status' => $data,
            'message' => $data ? 'Course Updated' : 'Error Updating Course'
        ]);
    }

    public function destroy(Course $course)
    {
        $status = $course->delete();
    }
}

