<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    
    // Companiesテーブルとのリレーション（従テーブル側）
    public function o_jobs(){
        return $this->belongsTo('App\Models\Company');
    }
}
