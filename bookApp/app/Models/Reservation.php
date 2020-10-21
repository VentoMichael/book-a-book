<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{

    protected $table = 'reservations';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function book()
    {
        return $this->hasOne('Book');
    }

    public function order()
    {
        return $this->hasOne('Order');
    }

}
