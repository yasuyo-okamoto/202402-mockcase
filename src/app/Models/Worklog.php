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
}
