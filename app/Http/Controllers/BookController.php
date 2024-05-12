<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PgSql\Lob;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('authors')->get();
        // $author = $books->authors;

        // you can return json if it's an API,
        return response()->json(['books' => $books], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    //insert in many to many relation
    public function store(Request $request)
    {
        try {
        $authors = [1,2];
        $book = new Book();
        $book->ISBN= $request->ISBN;
        $book->title= $request->title;
        $book->author= $request->author;
        $book->genre= $request->genre;
        $book->availability= $request->availability;
        $book->save();
        $book->authors()->attach($authors);


            return response()->json(['success' => true, 'book' => $book], 200);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json($th);


        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $authors  = [3, 6];
        // $book = Post::find($id);
        $book->authors()->sync($authors);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->authors()->detach();

        $book->delete();
    }
}
