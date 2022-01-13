<?php

namespace App\Http\Controllers;

use App\Models\BookCateory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookCategoryController extends Controller
{
    public function index()
    {
        $cats = BookCateory::all();
        return view('bookcategory.index', compact('cats'));
    }

    public function add(Request $request)
    {
        $cat = new BookCateory();
        $cat->name = $request->name;
        $cat->desc = $request->desc;
        if ($request->hasFile('image')) {
            $cat->image = $request->image->store('member/' . Carbon::now()->format('Y/m/d'));
        }
        $cat->save();
        return redirect()->back()->with('message', 'Book Category Created Sucessfully');
    }

    public function edit(BookCateory $cat, Request $request)
    {
        $cat->name = $request->name;
        $cat->desc = $request->desc;
        if ($request->hasFile('image')) {
            $cat->image = $request->image->store('cat/' . Carbon::now()->format('Y/m/d'));
        }
        $cat->save();
        return redirect()->back()->with('message', 'Book Category Updated Sucessfully');
    }

    public function delete(BookCateory $cat, Request $request)
    {
        $cat->delete();
        return redirect()->back()->with('message', 'Book Category Deleted Sucessfully');
    }
}
