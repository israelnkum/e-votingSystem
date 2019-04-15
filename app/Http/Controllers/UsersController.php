<?php

namespace App\Http\Controllers;

use App\Department;
use App\User;
use App\Voting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('department','voting')
            ->where('role','Admin')->get();
        return view('pages.users.users-index')
            ->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::with('department','voting')->get();
        // return $users;
        $departments = Department::all();
        $voting = Voting::all();
        return view('pages.users.users-create')
            ->with('users',$users)
            ->with('departments',$departments)
            ->with('voting',$voting);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'department_id'=>['required','string'],
            'voting_id'=>['required','string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $users = new User();
        $users->department_id= $request->input('department_id');
        $users->voting_id= $request->input('voting_id');
        $users->name= $request->input('name');
        $users->username= $request->input('username');
        $users->gender= $request->input('gender');
        $users->email= $request->input('email');
        $users->password= Hash::make(11111111);
        $users->role= $request->input('role');;

        $checkUser = User::all()
            ->where('email',$request->input('email'))
            ->count();
        if ($checkUser>0){
            return redirect('/users')
                ->with('error','Email is already taken');
        }else{
            if ($users->save()){
                return redirect('/users')
                    ->with('success','New User Created Successfully');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $departments = Department::all();
        return view('pages.users.users-edit')
            ->with('user',$user)
            ->with('departments',$departments);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'department_id'=>['required','string'],
            'voting_id'=>['required','string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $users = new User();
        $users->department_id= $request->input('department_id');
        $users->voting_id= $request->input('voting_id');
        $users->name= $request->input('name');
        $users->email= $request->input('email');
        $users->password= Hash::make($request->input('password'));
        $users->role= 'Admin';

        $checkUser = User::all()
            ->where('email',$request->input('email'))
            ->count();
        if ($checkUser>0){
            return redirect('/users')
                ->with('error','Email is already taken');
        }else{
            if ($users->save()){
                return redirect('/users')
                    ->with('success','New User Created Successfully');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);


        if ($user->delete()){
            return redirect('/users')->with('success','Admin Deleted Successfully');
        }
    }
}
