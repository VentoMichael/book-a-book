<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;


    protected $table = 'books';
    public $timestamps = true;

    use SoftDeletes;

    protected $fillable = [
        'title',
        'author',
        'publishing_house',
        'isbn',
        'public_price',
        'proposed_price',
        'presentation',
        'stock'];
    protected $dates = ['deleted_at'];

    public function academic_years()
    {
        return $this->belongsToMany('AcademicYear');
    }

}
