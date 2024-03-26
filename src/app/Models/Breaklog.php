<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breaklog extends Model
{
    use HasFactory;
    protected $table = 'breaks';
    // 'breaks' テーブルを使用することを明示
    protected $fillable = ['work_id', 'breakstart', 'breakend'];
    // 入力可能なカラムを指定

    // このモデルのリレーション定義
    public function work()
    {
        return $this->belongsTo(WorkLog::class, 'work_id');
    }
}
