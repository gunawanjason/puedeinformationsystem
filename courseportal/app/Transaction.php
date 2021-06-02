<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    protected $guarded = ['transactions_id'];
    protected $table = 'transactions';
    use SoftDeletes;
    public function students()
    {
        return $this->belongsToMany('App\Student','transactions','id');
    }
    public function subjects()
    {
        return $this->belongsToMany('App\Subject','transactions','id');
    }
    public function teachers()
    {
        return $this->belongsToMany('App\Teacher','transactions','id');
    }
}
