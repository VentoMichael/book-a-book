<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{

    protected $table = 'sales';
    public $timestamps = true;

    use SoftDeletes;

    public function book()
    {
        return $this->hasOne('Book');
    }

    public function academic_year()
    {
        return $this->hasOne('AcademicYear');
    }

}
