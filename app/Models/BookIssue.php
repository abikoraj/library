<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookIssue extends Model
{
    use HasFactory;
    protected $casts = [
        'to' => 'date',
        'from' => 'date',
        'retruned' => 'date',
    ];

    public function fineCalc()
    {
        $fine = Fine::all();
        if ($fine->to > Carbon::now()) {
            $dueday = Carbon::now()->diffInDays($fine->to);
            if ($fine->type == 0) {
                return $fine->data;
            } elseif ($fine->type == 1) {
                $dueamt = $dueday * $fine->data;
                return $dueamt;
            } else {
                $o = [];
                foreach ($fine->data as $key => $value) {
                    $a = [];
                    if ($a['days'] <= $dueday) {
                        return $a['amt'];
                    }
                }
            }
        }
    }
}
