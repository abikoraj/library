<?php

namespace App\Http\Controllers;

use App\Models\Fine;
use Illuminate\Http\Request;

class FineController extends Controller
{
    public function index()
    {
        $fines = Fine::join('profiles', 'profiles.id', '=', 'fines.profile_id')->select('profiles.name', 'fines.*')->get();
        return view('fine.index', compact('fines'));
    }

    public function add(Request $request)
    {
        $fine = Fine::where('profile_id', $request->profile_id)->first();
        if ($fine == NULL) {
            $fine = new Fine();
            $fine->profile_id = $request->profile_id;
        }
        $fine->type = $request->type;
        if ($request->type == 0) {
            $fine->data = $request->input('amt-0');
        }
        if ($request->type == 1) {
            $fine->data = $request->input('amt-1');
        }
        if ($request->type == 2) {
            $o = [];
            if ($request->filled('data')) {
                foreach ($request->data as $key => $iin) {
                    $a = [];
                    $a['amt'] = $request->input('amt_' . $iin);
                    $a['days'] = $request->input('days_' . $iin);
                    array_push($o, $a);
                }
            }
            $fine->data = json_encode($o);
        }
        // dd($fine);
        $fine->save();
        return redirect()->back()->with('message', 'Fine Added Successfully');
    }
    public function delete(Fine $fine)
    {

        $fine->delete();
        return redirect()->back()->with('message', 'Fine Deleted Successfully');
    }
}
