<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseCategory;
use App\User;
use App\Group;

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

    public function allTeacher()
    {
        if(Aauth::user()->group());
    }

    public function allGroup()
    {
        //
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

    public function uploadImage(Request $request, $name = null)
    {
        if($request->hasFile('image')){
            $image = $request->file('image');
            if (is_null($name)) {
                $name = time() . "_" . rand(1000, 1000000) . "." . $image->getClientOriginalExtension();
            }
            $image->move(public_path('images'), $name);
            return '/images/'.$name;
        }
        return '';
    }

    public function update(Request $request, CourseCategory $Category)
    {
        $data = $request-only([
            'Category',
            'image'
        ]);
        $status = $Category->update($data);

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Berhasil Mengubah Category' : 'Gagal Mengubah Category'
        ]);
    }

    public function destroy(CourseCategory $Category)
    {
        $status = $Category->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Category Deleted': 'Error Deleting Category'
        ]);
    }
}
