<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;


    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function IssuedBooks()
    {
        return BookIssue::Join('books', 'books.id', '=', 'book_issues.book_id')->where('book_issues.member_id', $this->id)->where('status', 0)->select('book_issues.*', 'books.name')->get();
    }
}
