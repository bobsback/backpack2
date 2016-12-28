<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Fileentry;
use DB;
use App\AgeRange;
use App\Interests;

class AjaxController extends Controller
{
    //
     public function index(Request $request)
	{
$sortByRan=null;
$sortByNew=$request->sortBy;
if ($sortByNew == 'random'){
$sortByNew = null;
$sortByRan='random';
};

$minage=1;
$maxage=22;

$agearray=[$minage,$maxage];

$ageid = DB::table('agerange')
->whereBetween('age', $agearray)
->pluck('fileid');

$business_type='entertainment';
$location='United States';
$gender='male';


$interests=['wierd','sporty'];
$interestid = DB::table('interests')
->whereIn('interest', $interests)
->pluck('fileid');

		$entries = DB::table('fileentries')

		->when($sortByNew, function ($query) use ($sortByNew) {
                    return $query->orderBy($sortByNew,'desc');
                })
		->when($sortByRan, function ($query) use ($sortByRan) {
                    return $query->inRandomOrder();
                })
		->when($business_type, function ($query) use ($business_type) {
                    return $query->where('business_type', $business_type);
                })
		->when($location, function ($query) use ($location) {
                    return $query->where('location', $location);
                })
		->when($interests, function ($query) use ($interestid) {
                    return $query->whereIn('id', $interestid);
                })
		
	->whereIn('id', $ageid)
	->where('approved', 1)->select('filename','URL')->get();

	$response = view('adtable', compact ('entries'))->render();

            return $response;
		

	
	}
	public function addclick()  {

  // assume you have a clicks  field in your DB

  $this->clicks = $this->clicks + 1;
  $this->save();

}

public function Click(Request $request){
$URL=$request->URL;
$file = Fileentry::find($URL)->first();
$file->addclick();


}

}




/*if ($request->exists('created_at')){

				$entries->OrderBy('created_at');    
			}

			if ($request->exists('best')){

				
				$entries->OrderBy('clicks');
       
			}
			if ($request->exists('random')){

				
				$entries->inRandomOrder();
       
			}
			if ($request->has('gender')){

				$entries->where('gender',$request->gender);
       
			}
			if ($request->has('age')){

				$entries->where('age',$request->age);
       
			}*/