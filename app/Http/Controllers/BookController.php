<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    public function index(): JsonResponse
    {
        $books = Book::with('author')->latest()->get();

        return response()->json($books);
    }

    public function store(BookRequest $request): JsonResponse
    {
        $book = Book::create($request->validated());
        $book->load('author');

        return response()->json($book, 201);
    }

    public function show(Book $book): JsonResponse
    {
        $book->load('author');

        return response()->json($book);
    }

    public function update(BookRequest $request, Book $book): JsonResponse
    {
        $book->update($request->validated());
        $book->load('author');

        return response()->json($book);
    }

    public function destroy(Book $book): JsonResponse
    {
        $book->delete();

        return response()->json(['message' => 'Book deleted successfully.']);
    }
}