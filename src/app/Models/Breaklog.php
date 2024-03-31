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
}
