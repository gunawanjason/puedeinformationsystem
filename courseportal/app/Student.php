<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    protected $guarded = ['id'];
    public function users()
    {
        return $this->hasOne('App\User','foreign_id');
    }
    public function transactions()
    {
        return $this->belongsToMany('App\Transaction','transactions','id');
    }
}