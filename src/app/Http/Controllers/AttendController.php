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
        $totalBreakTime = 0;
        foreach ($worklog->breaks as $break) {
        if ($break->breakstart && $break->breakend) {
        $breakStart = strtotime($break->breakstart);
        $breakEnd = strtotime($break->breakend);

        // 休憩時間を加算
        $totalBreakTime += $breakEnd - $breakStart;
        }
        }
        $worklog->total_break_time = $totalBreakTime;

        }


        // ページネーション用のビューを返す
        return view('attendance', compact('worklogs'));
    }



    public function index(Request $request)
    {
    // すべてのユーザーを取得
    $users = User::orderBy('name', 'asc')->paginate(5); // ページあたりの表示数は適宜変更してください

    return view('userlist', compact('users'));
    }

    public function show($alphabet)
    {
        // あ行から始まるユーザーをページネーションを適用して取得
        $users = User::where('name', 'like', $alphabet . '%')->paginate(10);

        // ユーザーに関連する勤務情報を取得
        $worklogs = Worklog::where('user_id', $user->id)->get();

        // ユーザー情報をビューに渡して表示
        return view('user.list', compact('user'));
    }




}
