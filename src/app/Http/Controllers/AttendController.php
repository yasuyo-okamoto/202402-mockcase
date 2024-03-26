<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worklog;
use App\Models\Breaklog;
//use App\Http\Controllers\WorkController;

class AttendController extends Controller
{
    public function admin()
    {
        // ページネーションを追加するため、paginateメソッドを使ってデータを取得
        $attendances = Worklog::with('breaks')->paginate(5);

        return view('attendance', compact('attendances'));
    }

    public function search (Request $request)
    {
        $attendances = Worklog::selectRaw('DATE(created_at) as date')
                    ->groupBy('date')
                    ->paginate(1); // ページネーションを1件ごとに設定

        return view('attendance', compact('attendances'));
    }

}
