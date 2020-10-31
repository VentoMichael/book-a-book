<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{

    protected $table = 'orders';
    public $timestamps = true;
    use SoftDeletes;

    public function user()
    {
        return $this->hasMany('App\Models\User','id','user_id');
    }

    public function academic_year()
    {
        return $this->hasOne('AcademicYear');
    }
}
