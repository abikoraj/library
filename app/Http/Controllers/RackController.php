<?php

namespace App\Http\Controllers;

use App\Models\Rack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RackController extends Controller
{
    public function index(){
        $racks=DB::table('racks')->get();
        return view('rack.index',compact('racks'));
    }

    public function add(Request $request){
        $data=$request->all();
        unset($data['_csrf']);
        Rack::Create($data);
        return redirect()->back()->with('message','Rack Created Sucessfully');
    }

    public function edit(Rack $rack,Request $request){
        $rack->name=$request->name;
        $rack->desc=$request->desc;
        $rack->save();
        return redirect()->back()->with('message','Rack Updated Sucessfully');
    }

    public function delete(Rack $rack,Request $request){

        $rack->delete();
        return redirect()->back()->with('message','Rack Deleted Sucessfully');
    }
}
