<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fileentry extends Model
{
    //
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fileentries';


     protected $fillable = ['filename','mime','original_filename','user','approved','gender','location','business_type','URL','clicks'];

     protected $guarded = ['id'];     
}
