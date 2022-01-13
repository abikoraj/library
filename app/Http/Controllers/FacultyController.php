<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacultyController extends Controller
{
    public function index()
    {
        $faculties = DB::table('faculties')->get();
        return view('faculty.index', compact('faculties'));
    }

    public function add(Request $request)
    {
        $data = $request->all();
        unset($data['_csrf']);
        Faculty::Create($data);
        return redirect()->back()->with('message', 'Faculty Created Sucessfully');
    }

    public function edit(Faculty $Faculty, Request $request)
    {
        $Faculty->name = $request->name;
        $Faculty->sem = $request->sem;
        $Faculty->save();
        return redirect()->back()->with('message', 'Faculty Updated Sucessfully');
    }

    public function delete(Faculty $Faculty, Request $request)
    {

        $Faculty->delete();
        return redirect()->back()->with('message', 'Faculty Deleted Sucessfully');
    }
}
