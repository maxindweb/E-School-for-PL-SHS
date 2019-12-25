<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    public function index()
    {
        return response()->json(Course::all());
    }

    public function all()
    {
        return response()->json(Course::whit('Assigment' , 'Quis', 'Note')->where('Group', $group ,'or', 'User', $user)->get());
    }

    public function store(Request $request)
    {
        $course = Course::create([
            'course' => $request->course,
            'group_id' => $request->group_id,
            'category_id' => $request->category_id,
        ]);
    }
}

