<?php

namespace App\Http\Controllers;

use App\Models\OnlineBook;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OnlineBookController extends Controller
{
    public function index()
    {
        $obs = DB::table('online_books')->get();
        return view('onlinebook.index', compact('obs'));
    }

    public function add(Request $request)
    {
        $ob = new OnlineBook();
        if ($request->hasFile('image', 'file')) {
            $ob->image = $request->image->store('ob-img/' . Carbon::now()->format('Y/m/d'));
            $ob->file = $request->file->store('ob-file/' . Carbon::now()->format('Y/m/d'));
        }
        $ob->name = $request->name;
        $ob->desc = $request->desc;
        $ob->save();
        // dd($ob);
        return redirect()->back()->with('message', 'Online Book Added Successfully');
    }

    public function edit(OnlineBook $ob, Request $request)
    {
        if ($request->hasFile('image', 'file')) {
            $ob->image = $request->image->store('ob-img/' . Carbon::now()->format('Y/m/d'));
            $ob->file = $request->file->store('ob-file/' . Carbon::now()->format('Y/m/d'));
        }
        $ob->name = $request->name;
        $ob->desc = $request->desc;
        $ob->save();
        // dd($ob);
        return redirect()->back()->with('message', 'Online Book Updated Successfully');
    }

    public function delete(OnlineBook $ob)
    {
        $ob->delete();
        return redirect()->back()->with('message', 'Online Book Deleted Successfully');
    }
}
