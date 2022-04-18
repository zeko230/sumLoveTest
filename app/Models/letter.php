<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class letter extends Model
{
    use HasFactory;
    protected $table = 'letters';

    protected $fillable = ['id' , 'letter','value' ];
    public $timestamps = false;
   
}
