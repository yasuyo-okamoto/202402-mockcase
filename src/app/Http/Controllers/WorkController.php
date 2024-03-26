<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worklog;
use App\Models\Breaklog;

class WorkController extends Controller
{
    public function WorkStart(Request $request)
    {
        $work = new Worklog();
        $work->user_id = auth()->user()->id;
        $work->workstart = now();
        $work->save();

        return redirect()->back();
    }

    public function WorkEnd(Request $request)
    {
        $work = Worklog::where('user_id', auth()->user()->id)
        ->whereNull('workend')
        ->latest()
        -> first();

        if ($work) {
            $work->end_time = now();
            $work->save();
        }

        return redirect()->back();
    }

    public function BreakStart(Request $request)
    {
        $work = Worklog::where('work_id', auth()->user()->id)
            ->whereNull('breakend')
            ->latest()
            ->first();

        if ($work) {
            $break = new Breaklog();
            $break->work_id = $work->id;
            $break->breakstart = now();
            $break->save();
        }

        return redirect()->back();
    }
    public function BreakEnd(Request $request)
    {
        $break = Breaklog::whereHas('work', function ($query) {
            $query->where('work_id', auth()->user()->id)
                ->whereNull('breakend');
        })
        ->latest()
        ->first();

        if ($break) {
            $break->breakend = now();
            $break->save();
        }

        return redirect()->back();
    }
}
