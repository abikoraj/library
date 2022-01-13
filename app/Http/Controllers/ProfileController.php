<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index(){
        $profiles=DB::table('profiles')->get();
        return view('profile.index',compact('profiles'));
    }

    public function add(Request $request){
        $data=$request->all();
        unset($data['_csrf']);
        Profile::Create($data);
        return redirect()->back()->with('message','Profile Created Sucessfully');
    }

    public function edit(Profile $profile,Request $request){
        $profile->name=$request->name;
        $profile->days=$request->days;
        $profile->no=$request->no;
        $profile->save();
        return redirect()->back()->with('message','Profile Updated Sucessfully');
    }

    public function delete(Profile $profile,Request $request){

        $profile->delete();
        return redirect()->back()->with('message','Profile Deleted Sucessfully');
    }
}
