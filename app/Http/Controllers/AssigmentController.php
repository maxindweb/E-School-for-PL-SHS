<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assigment;
use App\User;

class AssigmentController extends Controller
{
    public function indexNull()
    {
        //
    }

    public function indexTrue()
    {
        //
    }

    public function indexFallse()
    {
        //
    }

    public function allNull()
    {
        //
    }

    public function allTrue()
    {
        //
    }

    public function allFallse()
    {
        //
    }

    public function show()
    {
        //
    }

    public function store(Request $request)
    {
        $Assigment = Assigment::create([
            'title' => $request->title,
            'description'   => $request->description,
            'course_id'     => $request->course_id
        ]);
        //return response
        return response()->json([
            'status'    => $Assigment,
            'message'   => $Assigment ? 'Berhasil Menambahkan Assigment' : 'Gagal Menambahakan Assigment'
        ]);
    }

    public function update(Request $request, Assigment $assigment)
    {
        $data = $assigment->update($request->only([
            'title',
            'description',
            'course_id'
        ]));

        return response()->json([
            'status' => $data,
            'message' => $data ? 'Berhasil Mengubah Assigment' : 'Gagal Mengubah Assigment'
        ]);
    }

    public function destroy()
    {
        //
    }
}
