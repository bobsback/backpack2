<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Fileentry;
use DB;
use HTML;
use Response;

class home extends Controller
{
    //
    public function index()
	{

		$entries = DB::table('fileentries')
		 ->where('approved', 1)
                ->inRandomOrder()
                ->get();

		return view('adsection', compact('entries'));
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
