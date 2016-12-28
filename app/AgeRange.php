<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgeRange extends Model
{
    //
    protected $table = 'agerange';


     protected $fillable = ['fileid','age'];

     protected $guarded = ['id'];    
}
