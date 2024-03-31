<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worklog;
use App\Models\Breaklog;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Providers\AppServiceProvider;

class AttendController extends Controller
{
    public function admin()
    {
        // 日付別のページネーション表示のためのクエリを準備
        $worklogs = Worklog::with(['user','breaks'])
            ->select(
                'user_id',
                DB::raw('DATE(date) as date'),
                DB::raw('TIME(workstart) as workstart'),
                DB::raw('TIME(workend) as workend'),
                //DB::raw('(SELECT SUM(TIME_TO_SEC(TIMEDIFF(breakend, breakstart))) FROM breaks WHERE breaks.job_id = jobs.id) as total_break_time'),
                DB::raw('SUM(TIME_TO_SEC(TIMEDIFF(workend, workstart))) as total_work_time')
            )
            ->groupBy('user_id', 'date', 'workstart', 'workend')
            ->paginate(5);

        // 各ユーザーの勤務合計時間と休憩時間を計算
        foreach ($worklogs as $worklog) {
            // ユーザー名を取得
            $worklog->user_name = $worklog->user->name;

        // 休憩時間を計算
        $breaks = $worklog->breaks;
        $totalBreakTime = 0;
        foreach ($breaks as $break) {
        $breakStart = strtotime($break->breakstart);
        $breakEnd = strtotime($break->breakend);
        // 休憩時間を加算
        $totalBreakTime += $breakEnd - $breakStart;
        }
        $worklog->total_break_time = $totalBreakTime;

        }

            // 名前を取得する
            //$userName = User::find($worklog->user_id)->name;
            //$worklog->user_name = $userName;


        // ページネーション用のビューを返す
        return view('attendance', compact('worklogs'));
    }
}
