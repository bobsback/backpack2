<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Requests;
use App\interests;

use App\Fileentry;
use DB;
use HTML;
use Response;
use App\Http\Utilities\quotes;

class home extends Controller
{
    //
    public function index()
	{
//All Ads
		$entries = DB::table('fileentries')
		 ->where('approved', 1)
                ->inRandomOrder()
                ->get();
//interests
$interests = DB::table('interests')
->select('interest')
               ->distinct()
   ->get();
//Quotes
$collection = collect(["A site for ads, retarded", "Your worse idea yet", "Stick to your day job", "Hope you've got a plan B","You need to get girlfriend"]);
$quote = $collection->random(1);
$peeps = collect(["Dad", "Uncle", "Dave", "Bob","Mum"]);
$peep = $peeps->random(1);


		return view('adsection', compact('entries','interests','quote','peep'));
	}


	public function Order($sortBy)
	{
$entries = DB::table('fileentries')
		 ->where('approved', 1)
                ->inRandomOrder()
                ->get();

\Response::json($entries);
 
 /* $sortBy = $request->SortBy;
$entries = DB::table('fileentries')->orderBy($sortBy)->get();


return Response::json($entries); */

/*
if ($sortBy == 'random'){

	$entries = DB::table('fileentries')
		 ->where('approved', 1)
                ->inRandomOrder()
                ->get();


	return \Response::json($entries);
}

$entries = DB::table('fileentries')
 ->where('approved', 1)
 ->when($sortBy, function ($query) use ($sortBy) {
                    return $query->orderBy($sortBy);
                }, function ($query) {
                    return $query->inRandomOrder();
                });


	return \Response::json($entries); */

	}
}
