<?php
namespace CorpseFinder\Http\Controllers\Admin;

use CorpseFinder\Http\Controllers\Controller;
use CorpseFinder\Http\Requests;
use CorpseFinder\Http\Requests\Request;
use CorpseFinder\Http\Requests\UserRequest;
use CorpseFinder\Http\Requests\UserUpdateRequest;
use CorpseFinder\Role;
use CorpseFinder\User;
use Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /*public function index()
    {
        return view('users.index')->withUsers(User::paginate(15));
    }*/
   /* public function create()
    {
        $roles = Role::all();
        return view('users.create')
            ->withUser(new User())
            ->withRoles($roles);
    }*/
    /*public function store(UserRequest $request)
    {
//        $user = new User($request->except(['roles']));
        $user = new User($request->except(['roles', 'password_confirmation']));
        $user->password = bcrypt($user->password);
        $user->save();
        $this->syncRoles($request, $user);
        return redirect()->route('admin.users.show', $user->id);
    }*/
    public function show($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('users.show')
            ->withRoles($roles)
            ->withUser($user);
    }
    public function edit($id)
    {
        $user = User::find($id);
        if (!$user->canBeEditedBy(Auth::user())) {
            \Flash::error('You are not allowed to change this user');
            return \Redirect::back();
        }
        $roles = Role::all();
        return view('users.edit')
            ->withRoles($roles)
            ->withUser($user);
    }
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->except(['roles', 'password', 'password_confirmation']));
        $this->changePassword($request, $user);
        $user->save();
        $this->syncRoles($request, $user);
        return redirect()->route('admin.users.show', $user->id);
    }
    public function delete(Requests\UserDeleteRequest $request, $id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.users.index');
    }
    /**
     * @param UserUpdateRequest $request
     * @param $user
     */
    protected function changePassword(UserUpdateRequest $request, $user)
    {
        if ($request->has(['password', 'password_confirmation'])) {
            $pass = $request->get('password', false);
            $pass_conf = $request->get('password_confirmation', false);
            if ($pass && $pass_conf && ( $pass == $pass_conf )) {
                $user->password = bcrypt($pass);
            }
        }
    }
    protected function syncRoles(Request $request, $user)
    {
        if ($request->has('roles')) {
            $user->roles()->sync(array_keys($request->roles));
        } else {
            $user->roles()->sync([]);
        }
    }
}