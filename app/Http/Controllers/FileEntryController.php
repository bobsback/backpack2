<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Fileentry;
use App\AgeRange;
use App\Interests;
 use App\Http\Requests\ImageUploadRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\User;

class FileEntryController extends Controller
{
    //
    public function index()
	{


		$entries = Fileentry::all();
 
		return view('adpage', compact('entries'));
	}
 
	public function add(ImageUploadRequest $request) {
$userid = Auth::id();
$gender = $request->gender;
$businesstype = $request->businesstype;
$location = $request->location;
$url = $request->url;

		$file = $request->filefield;
		$extension = $file->getClientOriginalExtension();
		Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
		$entry = new Fileentry();
		$entry->mime = $file->getClientMimeType();
		$entry->original_filename = $file->getClientOriginalName();
		$entry->filename = $file->getFilename().'.'.$extension;
 $entry->user = $userid;
$entry->gender = $gender;
$entry->business_type = $businesstype;
$entry->location = $location;
$entry->URL = $url;
		$entry->save();

 $ageentry = new AgeRange();
 $ageentry ->fileid = $entry->id;
 $ageentry ->age = $request->age;
$ageentry->save();
$ageentry = new AgeRange();
 $ageentry ->fileid = $entry->id;
 $ageentry ->age = $request->age+1;
$ageentry->save();
$ageentry = new AgeRange();
 $ageentry ->fileid = $entry->id;
 $ageentry ->age = $request->age+2;
$ageentry->save();
$ageentry = new AgeRange();
 $ageentry ->fileid = $entry->id;
 $ageentry ->age = $request->age-1;
$ageentry->save();
$ageentry = new AgeRange();
 $ageentry ->fileid = $entry->id;
 $ageentry ->age = $request->age-2;
$ageentry->save();

$intereststring = $request->get('interests');

foreach ($intereststring as $interest){

$interests = new Interests();
$interests->fileid = $entry->id;
$interests->userid = $userid;
$interests->interest = $interest;
$interests->save();
};


return back();

	}
		public function get($filename){
	
		$entry = Fileentry::where('filename', '=', $filename)->firstOrFail();

		$file = Storage::disk('local')->get($entry->filename);
 
		return (new Response($file, 200))
              ->header('Content-Type', $entry->mime);
	}
 
}
