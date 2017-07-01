<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgeRange extends Model
{
    //
    protected $table = 'agerange';


     protected $fillable = ['fileid','age'];

     protected $guarded = ['id'];    

       public function Fileentry() {

        return $this->belongsTo('App\Fileentry');
    }
}
