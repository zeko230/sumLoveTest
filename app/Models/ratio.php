<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ratio extends Model
{
    use HasFactory;
    protected $table = 'ratio';

    protected $fillable = ['id' , 'nameRatio','minValueRatio','maxValueRatio','namePicture' ];
    public $timestamps = false;
}
