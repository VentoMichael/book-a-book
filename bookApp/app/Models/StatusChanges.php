<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusChanges extends Model 
{

    protected $table = 'status-changes';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function order()
    {
        return $this->hasOne('Order');
    }

    public function status()
    {
        return $this->hasOne('Status');
    }

}