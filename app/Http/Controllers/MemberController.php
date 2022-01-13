<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index()
    {
        $members = DB::table('members')->get();
        return view('member.index', compact('members'));
    }

    public function add(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $member = new Member();
            if ($request->hasFile('image')) {
                $member->image = $request->image->store('member-img/' . Carbon::now()->format('Y/m/d'));
            }
            $member->name = $request->name;
            $member->email = $request->email;
            $member->phone = $request->phone;
            $member->gender = $request->gender;
            $member->address = $request->address;
            $member->semester = $request->semester;
            $member->code = $request->code;
            $member->dob = $request->dob;
            $member->faculty_id = $request->faculty_id;
            $member->profile_id = $request->profile_id;
            $member->save();
            // dd($member);
            return redirect()->back()->with('message', 'Member Added Successfully');
        } else {
            return view('member.add');
        }
    }

    public function edit(Member $member, Request $request)
    {
        if ($request->getMethod() == 'POST') {
            if ($request->hasFile('image')) {
                $member->image = $request->image->store('member-img/' . Carbon::now()->format('Y/m/d'));
            }
            $member->name = $request->name;
            $member->email = $request->email;
            $member->phone = $request->phone;
            $member->gender = $request->gender;
            $member->address = $request->address;
            $member->code = $request->code;
            $member->dob = $request->dob;
            $member->faculty_id = $request->faculty_id;
            $member->profile_id = $request->profile_id;
            $member->save();
            // dd($member);
            return redirect()->route('member.index')->with('message', 'Member Updated Successfully');
        } else {
            return view('member.edit', ['item' => $member]);
        }
    }

    public function delete(Member $member)
    {
        $member->delete();
        return redirect()->back()->with('message', 'Member Deleted Successfully');
    }

    public function search(Request $request)
    {
        return view('member.min', ['member' => Member::where('code', $request->code)->first()]);
    }
}
