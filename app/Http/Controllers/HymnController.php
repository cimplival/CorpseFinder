<?php

namespace TumshangilieBwana\Http\Controllers;

use Auth;
use Mail;
use TumshangilieBwana\Hymn;
use Validator;
use TumshangilieBwana\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use TumshangilieBwana\Http\Requests;
use Carbon\Carbon;
use Illuminate\Session;

class HymnController extends Controller
{
    
    public function __construct(Hymn $hymn)
    {
        $this->hymn = $hymn;
    }

    //GET HOME PAGE
    public function getHome()
    {
        return view('layouts.main.home');
    }

    //GET CATEGORIES
    public function getCategories()
    {
        return view('layouts.main.categories');
    }

    //GET All HYMNS
    public function getAllHymns()
    {   
        $hymns = Hymn::all();
        $hymn_title   = 'All Hymns';  
        $data = compact('hymn_title','hymns'); 

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
        $hymn  = Hymn::findBySlug($slug);
        $verses = $hymn->lyrics;

        return view('layouts.main.hymns', compact('verses','hymn'));
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
                'title'        => 'required|max:100',
                'author'       => 'required|max:100',
                'lyrics'       => 'required|max:5000',
                'category'     => 'required|max:100'
            ]);

        Hymn::create([
                'title'         => $request->input('title'),
                'author'        => $request->input('author'),
                'category'      => $request->input('category'),
                'lyrics'        => nl2br($request->input('lyrics'))
            ]);

        return redirect()->route('add-hymn')->with('info', 'Your hymn has been submitted. Please await for its approval.');
    }

}
