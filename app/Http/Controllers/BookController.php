<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCateory;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $cats = BookCateory::all();
        $books = DB::table('books')->get();
        return view('book.index', compact('books', 'cats'));
    }
    public function add(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            // $request->validate([]);
            $book = new Book();
            if ($request->hasFile('image')) {
                $book->image = $request->image->store('book-img/' . Carbon::now()->format('Y/m/d'));
            }
            $book->name = $request->name;
            $book->isbn = $request->isbn;
            $book->author = $request->author;
            $book->note = $request->note;
            $book->qty = $request->qty ?? 0;
            $book->price = $request->price;
            $book->code = $request->code;
            $book->edition = $request->edition;
            $book->publisher = $request->publisher;
            $book->published = $request->published;
            $book->book_category_id = $request->book_category_id;
            $book->rack_id = $request->rack_id;
            $book->save();
            // dd($book);
            return redirect()->back()->with('message', 'Book Added Successfully');
        } else {
            return view('book.add');
        }
    }
    public function edit(Book $book, Request $request)
    {
        if ($request->getMethod() == 'POST') {
            // $request->validate([]);

            if ($request->hasFile('image')) {
                $book->image = $request->image->store('book/' . Carbon::now()->format('Y/m/d'));
            }
            $book->name = $request->name;
            $book->isbn = $request->isbn;
            $book->author = $request->author;
            $book->note = $request->note;
            $book->qty = $request->qty ?? 0;
            $book->price = $request->price;
            $book->code = $request->code;
            $book->edition = $request->edition;
            $book->publisher = $request->publisher;
            $book->published = $request->published;
            $book->book_category_id = $request->book_category_id;
            $book->rack_id = $request->rack_id;
            $book->save();
            // dd($book);
            return redirect()->route('book.index')->with('message', 'Book Updated Successfully');
        } else {
            return view('book.edit', ['item' => $book]);
        }
    }

    public function delete(Book $book)
    {
        $book->delete();
        return redirect()->back()->with('message', 'Book Deleted Successfully');
    }

    public function search(Request $request)
    {
        return view('member.book', ['book' => Book::where('code', $request->code)->first()]);
    }
}
