<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all(),200);
    }

    public function Store(Request $request)
    {
        $request->validate([
            'email',
            'password'
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
            'group_id' => $request->group_id
        ]);
        $user->save();

        return response()->json([
            'message' => 'success created user' 
        ]);
    }

    public function login(Request $request)
    {
        $credentials = [
            'name' => $request->get('name'),
            'password' => $request->get('password')
        ];

        $status = 401;
        $request = ['error' => 'unautorized'];
        if(Auth::attempt($credentials)) {
            $status = 200;
            $response = [
                'token' => Auth::user()->createToken('Elearning')->accessToken,
                'user' => Auth::user()
            ];
        }
        return response()->json($response, $status);
    }

    public function show($user)
    {
        return response()->json($user, 200);
    }

    public function update(Request $request, User $user)
    {
        $status = User::find($user);
        $status->name = $response['name'];
        $status->email= $response['email'];
        $status->group_id=$response['group_id'];
        $status->update();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'User Updated' : 'Error Updated User'
        ]);
    }

    public function destroy(User $user)
    {
        $status = $user->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Berhasil Menghapus User' : 'Gagal Menghapus User'
        ]);
    }
}
