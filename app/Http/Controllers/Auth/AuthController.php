<?php

namespace CorpseFinder\Http\Controllers\Auth;

use Auth;
use CorpseFinder\User;
use Validator;
use CorpseFinder\Http\Controllers\Controller;
use Illuminate\Http\Request;
use CorpseFinder\Http\Requests;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Contracts\Auth\Guard;
use CorpseFinder\Role;
use CorpseFinder\Repositories\UserRepository;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = '/';
    protected $userRepository;

    public function __construct(Guard $auth, UserRepository $userRepository)
    {
        $this->auth = $auth;
        $this->userRepository = $userRepository;
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /*
     * GET ROUTES
     */
    

    public function getLogin()
    {
        return view('layouts.main.login');
    }

    public function getRegister()
    {
        return view('layouts.main.register');
    }

    public function getForgotPassword()
    {
        return view('layouts.main.forgot-password');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }


    /*
     * POST ROUTES
     */
    public function postRegister(Request $request)
    {
        $this->validate($request,[
                'fullname'               => 'required|max:100',
                'email'                  => 'required|unique:users|email|min:4|max:255',
                'password'               => 'required|min:8|max:255',
                ]);

        $data = [
            'fullname'               => $request->input('fullname'),
            'email'                  => $request->input('email'),
            'password'               => bcrypt($request->input('password')),
        ];
        $this->userRepository->register($data);
        return redirect()->route('log-in')->with('info','Your account has been created. Log in to add a song.');

    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email'=> 'required|email|min:4|max:255',
            'password'=>'required|min:8|max:255'
            ]);

        if (Auth::attempt($request->only(['email','password'])))
        {
            if( $this->auth->user()->hasRole('user'))
            {
                return redirect()->route('add-hymn');
            }
            if( $this->auth->user()->hasRole('administrator'))
            {
                return redirect()->route('dashboard');
            }
        } else {
            return redirect()->route('log-in')->with('info','Incorrect email or password');
        }
   }    
}
