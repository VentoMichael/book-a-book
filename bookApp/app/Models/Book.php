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


    protected $fillable = [
        'title',
        'author',
        'publishing_house',
        'isbn',
        'public_price',
        'proposed_price',
        'presentation',
        'stock'];
    public function path(){
        return route('book.show',$this);
    }
    public function getRouteKeyName()
    {
        return 'title';
    }

    public function academic_years()
    {
        return $this->belongsToMany('AcademicYear');
    }

}
