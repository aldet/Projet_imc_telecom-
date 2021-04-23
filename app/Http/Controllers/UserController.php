<?php

namespace App\Http\Controllers;

use App\Models\User;
Use App\Models\Role;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function _construct()
    {
        $this->middleware('auth');
    }
    public function validator(array $data)
   {
        return Validator::make($data,[
          'name' => ['required', 'string', 'max:255'],
           'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],
      ]);
   }

    /**
     * Show the form for creating a new user
     */
    public function create()
    {
        /** @var Role[] $roles */
        $roles = Role::all();
        return view('users.create', [
            'user' => new User(),
            'roles' => $roles,
        ]);
    }

    /**
     * Save user and redirect to index page
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request) // The validation is done internally by UserRequest
    {
        $data = $request->validated();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->roles()->sync($data['roles']);

        return response()->redirectToRoute('user.index');
    }

    public function index(User $model)
    {
        $users=User::with(["roles"])->get();
//        dd($users);
        return view('users.index', [
            'users' => $model->paginate(15)
        ]);
    }
    public function edit(User $user)
    {
        $roles=Role::all();
        return view('users.edit',[
            'user'=>$user,
            'roles'=>$roles,

        ]);
    }
    public function update(UserRequest $request,User $user)
    {
        $user->update($request->validated());
        $user->save();
        return redirect()->route('users.show');
    }
    public function show(User $user)
    {
        return view('users.show',['user'=>$user]);
    }
}
