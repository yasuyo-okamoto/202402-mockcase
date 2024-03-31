<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worklog;
use App\Models\Breaklog;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WorkController extends Controller
{
  // Work Start メソッド
    public function workStart(Request $request)
    {
        // ログイン中のユーザーを取得
        $user = Auth::user();

        // 今日の日付を取得
        $date = Carbon::today();

        // 今日の日付に対する Worklog を検索
        $workLog = Worklog::where('user_id', $user->id)
                          ->whereDate('date', $date)
                          ->first();

        // すでに Worklog が存在する場合は何もしない
        if ($workLog) {
            return redirect()->back()->with('error', 'Work already started for today.');
        }

        // Worklog を作成
        Worklog::create([
            'user_id' => $user->id,
            'date' => $date,
            'workstart' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Work started successfully.');
    }

  // Work End メソッド
    public function workEnd(Request $request)
    {
        // ログイン中のユーザーを取得
        $user = Auth::user();

        // 今日の日付を取得
        $date = Carbon::today();

        // 今日の日付に対する Worklog を取得
        $workLog = Worklog::where('user_id', $user->id)
                          ->whereDate('date', $date)
                          ->first();

        // Worklog が存在しない場合は何もしない
        if (!$workLog) {
            return redirect()->back()->with('error', 'Work not started for today.');
        }

        // Worklog の workend を更新
        $workLog->update([
            'workend' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Work ended successfully.');
    }

  // Break Start メソッド
    public function breakStart(Request $request)
    {
        // ログイン中のユーザーを取得
        $user = Auth::user();

        // 今日の日付を取得
        $date = Carbon::today();

        // 今日の日付に対する Worklog を取得
        $workLog = Worklog::where('user_id', $user->id)
                          ->whereDate('date', $date)
                          ->first();

        // Worklog が存在しない場合は何もしない
        if (!$workLog) {
            return redirect()->back()->with('error', 'Work not started for today.');
        }

        // Breaklog を作成
        Breaklog::create([
            'job_id' => $workLog->id,
            'breakstart' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Break started successfully.');
    }

  // Break End メソッド
    public function breakEnd(Request $request)
    {
        // ログイン中のユーザーを取得
        $user = Auth::user();

        // 今日の日付を取得
        $date = Carbon::today();

        // 今日の日付に対する Worklog を取得
        $workLog = Worklog::where('user_id', $user->id)
                          ->whereDate('date', $date)
                          ->first();

        // Worklog が存在しない場合は何もしない
        if (!$workLog) {
            return redirect()->back()->with('error', 'Work not started for today.');
        }

        // Breaklog を作成
        Breaklog::create([
            'job_id' => $workLog->id,
            'breakend' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Break ended successfully.');
    }
}
