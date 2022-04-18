<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sitting extends Model
{
    
public $table="sittings";
    protected $fillable = [
      "nameWebsite",
      "linkWebsite",
      "	keywords",
      "Description",
      "socialMidiaFacebook",
      "socialMidiaTelegram",
      "socialMidiaInstagram",
      "socialMidiaYoutube",

    ];

    protected $hidden = [
    
    ];

  
}
