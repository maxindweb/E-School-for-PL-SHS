<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionMethod;

class QuestionMethodController extends Controller
{
    public function index()
    {
        return response()->json(QuestionMethod::all());
    }

    public function show(QuestionMethod $QMethod)
    {
        return response()->json($QMethod);
    }

    public function store(Request $request)
    {
        $QMethod = QuestionMethod::create([
            'method' => input('method')
        ]);
    }

    public function update()
    {
        //
    }

    public function destroy(QuestionMethod $QMethod)
    {
        $status = $QMethod->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Method Deleted' : 'Error Deleting Method'
        ]);
    }
}
