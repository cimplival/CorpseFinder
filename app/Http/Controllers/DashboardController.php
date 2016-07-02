<?php

namespace CorpseFinder\Http\Controllers;

use CorpseFinder\User;
use CorpseFinder\Deceased;
use Validator;
use CorpseFinder\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Session;

class DashboardController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /*public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }*/

    //GET DASHBOARD PAGE
    public function getDashboard()
    {
        return view('layouts.backend.dashboard');
    }
    
}
