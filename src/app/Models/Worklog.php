<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worklog extends Model
{
    protected $table = 'jobs';

    protected $fillable = [
        'user_id',
        'date',
        'workstart',
        'workend',
    ];

    //このモデルのリレーション定義
    public function breaks()
    {
        return $this->hasMany(BreakLog::class, 'job_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }



    public function totalWorkTime()
    {
    // 勤務開始時間と勤務終了時間から勤務時間を計算する
    $workStart = strtotime($this->workstart);
    $workEnd = strtotime($this->workend);

    $totalWorkTime = $workEnd - $workStart;

    // 秒数を時間に変換して返す
    return gmdate('H:i:s', $totalWorkTime);
    }

    public function netWorkTime()
    {
    $totalWorkTime = strtotime($this->totalWorkTime());
    $totalBreakTime = strtotime($this->totalBreakTime());

    // 総勤務時間から総休憩時間を引いて返す
    $netWorkTime = $totalWorkTime - $totalBreakTime;

    // 秒数を時間に変換して返す
    return gmdate('H:i:s', $netWorkTime);
    }

}
