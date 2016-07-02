<?php

namespace CorpseFinder\Http\Controllers;

use Auth;
use Mail;
use CorpseFinder\Deceased;
use Validator;
use CorpseFinder\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use CorpseFinder\Http\Requests;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Session;
use Input;

class HymnController extends Controller
{
    
    public function __construct(Deceased $deceased)
    {
        $this->deceased = $deceased;
    }

    //GET HOME PAGE
    public function getHome()
    {
        return view('layouts.main.home');
    }

    //GET CATEGORIES
    public function getArchives()
    {
        return view('layouts.main.categories');
    }

    //GET All HYMNS
    public function getAllDeceased()
    {   
        $deceased = Deceased::all();
        $title   = 'All Deceased';  
        $data = compact('deceased','title'); 

        return view('layouts.main.all-hymns', $data);
    }
    
    //GET SEARCH RESULTS PAGE
    public function getSearchResults()
    {
        return view('layouts.main.search-results');
    }

    //GET SINGLE HYMN PAGE
    public function showHymn($slug)
    {
        $deceased       = Deceased::findBySlug($slug);
        if(Deceased::findBySlug($slug)){
          $number         = $deceased->number;
        $fullname       = $deceased->full_name;
        $gender         = $deceased->gender;
        $description    = $deceased->description;
        $checkin_date   = $deceased->checkin_date;
        $photo_path     = $deceased->photo_path;  
        return view('layouts.main.hymns', compact('number', 'checkin_date','deceased','fullname','description','gender','photo_path'));
        } else {
            return view('layouts.main.page-not-found');
        }
        

        
    }
    
    //GET ADD HYMN PAGE
    public function getAddHymn()
    {
        return view('layouts.main.add-hymn');
    }

    //POST HYMN
    public function postSubmitHymn(Request $request)
    {
        $this->validate($request, [
                'id_no'           => 'required|max:100',
                'gender'          => 'required',
                'date_of_arrival' => 'max:20',
                'photo'           => 'required',
                'description'     => 'max:1000'
            ]);

        //Get Current User
        $user                     = Auth::user()->fullname;
        //$input = Input::all();
       /* $input = Input::all();
        $file = array_get($input,'photo');
        $destinationPath = 'uploads';
        $extension = $file->getClientOriginalExtension();
        $fileName = rand(11111, 99999) . '.' . $extension;
        $upload_success = $file->move($destinationPath, $fileName);
*/
        //Photo Upload
        //$photo                  = $request->file('photo');
        $file                     = $request->file('photo');
        $photo_id                 = $request->input('id_no');
        $destinationPath          = 'uploads';
        $extension                = $file->getClientOriginalExtension();
        $fileName                 = $photo_id . '.' . $extension;
        $upload_success           = $file->move($destinationPath, $fileName);

        Deceased::create([
                'number'          => $request->input('id_no'),
                'full_name'       => 'Unknown',
                'gender'          => $request->input('gender'),
                'description'     => nl2br($request->input('description')),
                'checkin_date'    => $request->input('checkin_date'),
                'author'          => $request->input($user),
                'identified'      => '0',
                /*'slug'          => $photo_id,*/
                'photo_path'      => $destinationPath.'/'.$fileName,
            ]);
        return redirect()->route('add-hymn')->with('info', 'The deceased details have been submitted successfully.');
    }

}
