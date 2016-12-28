<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interests extends Model
{
    //
    protected $table = 'interests';


     protected $fillable = ['fileid','userid','interest'];

     protected $guarded = ['id'];  
}
