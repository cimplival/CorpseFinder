<?php

namespace CorpseFinder\Http\Controllers;

use Illuminate\Http\Request;
use CorpseFinder\Http\Requests;
use CorpseFinder\Http\Controllers\Controller;
use CorpseFinder\Deceased;
use DB;

class QueryController extends Controller
{ 
    public function search(Request $request)
    {
        $query = $request->input('search');
        $hymns = DB::table('songs')->where('search_lyrics', 'LIKE', '%' . $query . '%')->paginate(1000);
            
        return view('layouts.main.search-results', compact('hymns', 'query'));
     }
}
