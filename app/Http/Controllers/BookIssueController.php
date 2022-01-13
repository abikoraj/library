<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookIssue;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookIssueController extends Controller
{
    public function index()
    {
        // $issues = DB::table('book_issues')->get();
        $members = DB::table('members')->select('code', 'name')->get();
        $books = DB::table('books')->select('code', 'name')->get();
        return view('bookissue.index', compact('members', 'books'));
    }

    public function add(Request $request)
    {
        $n = Member::join('profiles', 'profiles.id', '=', 'members.profile_id')->where('members.id', $request->member_id)->select('profiles.days', 'profiles.no')->first();
        $count = BookIssue::where('member_id', $request->member_id)->where('status', 0)->count();
        if ($n->no <= $count) {
            throw new \Exception("Quota Exceeded", 1);
        }
        $issue = new BookIssue();
        $issue->book_id = $request->book_id;
        $issue->member_id = $request->member_id;
        $issue->from = Carbon::now();
        $issue->to = Carbon::now()->addDays($n->days);

        // dd($issue->from->addDays($n), $issue->to);
        // $issue->returned = $request->returned;
        $issue->status = 0;
        $issue->save();
        $issue->name = Book::where('id', $request->book_id)->select('name')->first()->name;
        // dd($issue);
        // return redirect()->back()->with('message', 'Book-Issue Added Successfully');
        return view('bookissue.single', ['issue' => $issue]);
    }

    public function submit(Request $request)
    {
        $issue = BookIssue::find($request->id);
        $issue->status = 1;
        $issue->returned = Carbon::now();
        $issue->save();
        return response('OK');
    }

    public function edit(BookIssue $issue, Request $request)
    {

        $issue->book_id = $request->book_id;
        $issue->from = $request->from;
        $issue->to = $request->to;
        $issue->returned = $request->returned;
        $issue->status = $request->status;
        $issue->save();
        // dd($issue);
        return redirect()->back()->with('message', 'Book-Issue Updated Successfully');
    }

    public function delete(BookIssue $issue)
    {
        $issue->delete();
        return redirect()->back()->with('message', 'Book-Issue Deleted Successfully');
    }
}
