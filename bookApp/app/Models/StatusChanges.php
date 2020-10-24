<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusChanges extends Model
{

    protected $table = 'status-changes';
    public $timestamps = true;

    use SoftDeletes;



    public function order()
    {
        return $this->hasOne('Order');
    }

    public function status()
    {
        return $this->hasOne('Status');
    }

}
