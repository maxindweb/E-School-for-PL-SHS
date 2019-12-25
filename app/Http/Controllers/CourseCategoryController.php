<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseCategory;

class CourseCategoryController extends Controller
{
    public function index()
    {
        return response()->json(CoursCategory::all(),200);
    }

    public function all(Group $group, User $user)
    {
        return response()->json(CourseCategory::with('course')->where('group', $group, 'or' ,'user', $user)->get());
    }

    public function store(Request $request)
    {
        $Category = CourseCategory::create([
            'category' => $request->category
        ]);

        return response()->json([
            'status' => (bool)$Category,
            'data'   => $Category,
            'message' => $Category ? 'Berhasil Menambahkan Category' : 'Gagal Menambahkan Category'
        ]);
    }
}
