<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\User;

class BookController extends Controller
{
    public function index()
    {
        return response()->json(Book::all(),200);
    }

    public function indexTrue()
    {
        //
    }

    public function indexFalse()
    {
        //
    }

    public function show($book)
    {
        return response()->json(Book::with('BookCategory')->where('id', $book)->get(), 200);
    }

    public function store(Request $request)
    {
        $data = Book::create([
            'title'         => $request->title,
            'writer'        => $request->writer,
            'publisher'     => $request->publisher,
            'category_id'   => $request->category_id
        ]);

        return response()->json([
            'status' => Bool($data),
            'message'=> $data ? 'Berhasil Menambahkan Buku' : 'Gagal Menambahkan Buku'
        ]);
    }

    public function uploadImage(Request $request, $name=null)
    {
        if($request->hasFile('image')){
            $image = $request->file('image');
            if (is_null($name)) {
                $name = time() . "_" . rand(1000, 1000000) . "." . $image->getClientOriginalExtension();
            }
            $image->move(public_path('images', $name));
            return '/images/'.$name;
        }

        return'';
    }

    public function update(Request $request, Book $book)
    {
        $status = $book->update([
            $request->only('title', 'writer', 'image','publisher', 'category
            _id', 'loan')
        ]);

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Berhasil Mengubah BUku' :'Gagal Mengubah Buku'
        ]);
    }

    public function destroy()
    {
        $status = Book::delete();

        return response()->json([
            'status'    => $status,
            'message'   => $status ? 'Berhasil Menghapus Data Buku' : 'Gagal Menghapus Data BUku'
        ]);
    }
}

