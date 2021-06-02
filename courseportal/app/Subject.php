<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;
    protected $table = 'subjects';
    public function transactions()
    {
        return $this->belongsToMany('App\Transaction','transactions','id');
    }
}
