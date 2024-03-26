<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worklog extends Model
{
    use HasFactory;
    protected $table = 'jobs';
    // 'jobs' テーブルを使用することを明示
    protected $fillable = ['user_id', 'workstart', 'workend'];
    // 入力可能なカラムを指定

    //このモデルのリレーション定義
    public function breaks()
    {
        return $this->hasMany(BreakLog::class, 'work_id');
    }
}
