<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    protected $table = 'staffs'; //why????????
    use SoftDeletes;
    public function users()
    {
        return $this->hasOne('App\User','foreign_id');
    }
}
