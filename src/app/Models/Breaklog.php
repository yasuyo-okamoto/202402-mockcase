<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breaklog extends Model
{
    protected $table = 'breaks';

    protected $fillable = [
        'job_id',
        'breakstart',
        'breakend',
    ];
    // このモデルのリレーション定義
    public function work()
    {
        return $this->belongsTo(WorkLog::class, 'job_id');
    }


    public static function totalBreakTimeForJob($jobId)
    {
        // 指定された job_id に紐づくすべての休憩ログを取得し、開始時間で昇順に並べる
    $breakLogs = self::where('job_id', $jobId)->orderBy('breakstart')->get();

    // 休憩時間の初期化
    $totalBreakTime = 0;
    $previousBreakEnd = null;

    // 各休憩ログの時間を計算して合計する
    foreach ($breakLogs as $breakLog) {
        if ($breakLog->breakstart && $breakLog->breakend) {
            $breakStart = strtotime($breakLog->breakstart);
            $breakEnd = strtotime($breakLog->breakend);

            // デバッグ用ログ出力
            //\Log::info('Break start: ' . date('Y-m-d H:i:s', $breakStart));
            //\Log::info('Break end: ' . date('Y-m-d H:i:s', $breakEnd));

            // 直前の休憩の終了時間との差が休憩時間
            if ($previousBreakEnd !== null) {
                $totalBreakTime += $breakStart - $previousBreakEnd;
            }

            // 直前の終了時間を更新
            $previousBreakEnd = $breakEnd;
            }
        }

// デバッグ用ログ出力
    //\Log::info('Total break time: ' . $totalBreakTime);

        // 秒数を時間に変換して返す
        return $totalBreakTime;
    }
}