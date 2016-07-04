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
        $deceased = DB::table('deceased')->where('search_deceased', 'LIKE', '%' . $query . '%')->paginate(1000);
            
        return view('layouts.main.search-results', compact('deceased', 'query'));
     }
}
