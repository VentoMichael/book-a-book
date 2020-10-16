<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusChange extends Model
{
    use HasFactory;

    protected $table = 'status_changes';
    protected $guarded = [];

    public function book()
    {
        return $this->belongsTo(Status::class);
    }
}
