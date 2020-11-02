<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicYear extends Model
{
    use HasFactory;
    protected $table = 'academic_years';
    public $timestamps = true;

    use SoftDeletes;

    public function books()
    {
        return $this->belongsToMany('Books');
    }

    public function orders(){
        return $this->hasMany('Order','id','academic_year_id');
    }

}
