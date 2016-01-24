<?php

namespace TumshangilieBwana\Http\Controllers;

use TumshangilieBwana\User;
use TumshangilieBwana\Hymn;
use Validator;
use TumshangilieBwana\Http\Controllers\Controller;
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
