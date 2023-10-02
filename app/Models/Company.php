<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    // Usersテーブルとのリレーション（主テーブル側）
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }    
    
    // Jobsテーブルとのリレーション（主テーブル側）
    public function jobs(){
        return $this->hasMany('App\Models\Job');
    }
}
