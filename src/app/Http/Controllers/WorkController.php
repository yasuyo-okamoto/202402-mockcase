<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Breaks;

class WorkController extends Controller
{
    public function Workstart(Request $request)
    {
        $work = new Work();
        $work->user_id = auth()->user()->id;
        $work->start_time = now();
        $work->save();

        return redirect()->back();
    }

    public function endWork(Request $request)
    {
        $workLog = WorkLog::where('user_id', auth()->user()->id)->latest()->first();
        $workLog->end_time = now();
        $workLog->save();

        return redirect()->back();
    }

    public function startBreak(Request $request)
    {
        $workLog = WorkLog::where('user_id', auth()->user()->id)->latest()->first();
        $breakLog = new BreakLog();
        $breakLog->work_log_id = $workLog->id;
        $breakLog->start_time = now();
        $breakLog->save();

        return redirect()->back();
    }

    public function endBreak(Request $request)
    {
        $breakLog = BreakLog::where('work_log_id', function($query) {
            $query->select('id')
                  ->from('work_logs')
                  ->where('user_id', auth()->user()->id)
                  ->latest()
                  ->limit(1);
        })->latest()->first();

        $breakLog->end_time = now();
        $breakLog->save();

        return redirect()->back();
    }
}
