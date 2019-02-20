<?php

namespace App\Http\Controllers;

use App\Department;
use App\User;
use App\Voting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class VotersController extends Controller
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
        $voters = User::with('department','voting')
            ->where('role','Voter')->get();

       //return $voters;
        return view('pages.voters.voters-index')
            ->with('voters',$voters);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $voters = User::with('department','voting')->get();
        // return $users;
        $departments = Department::all();
        $voting = Voting::all();
        return view('pages.voters.voters-create')
            ->with('voters',$voters)
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
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $users = new User();
        $users->department_id= $request->input('department_id');
        $users->voting_id= $request->input('voting_id');
        $users->name= $request->input('index_number');
        $users->username= $request->input('index_number');
        $users->password= Hash::make($request->input('password'));
        $users->role= 'Voter';

        $checkUser = User::all()
            ->where('name',$request->input('index_number'))
            ->count();
        if ($checkUser>0){
            return redirect('/voters/create')
                ->with('error','Voter is already exist');

        }else{
            if ($users->save()){
                return redirect('/voters')
                    ->with('success','New Voter Added Successfully');
            }
        }
    }


    public function  uploadVoters(Request $request){

        set_time_limit(36000);
        $valid_exts = array('csv','xls','xlsx'); // valid extensions
        $file = $request->file('file');

        if (!empty($file)) {

            $this->validate($request,[
                'department_id'=>['required','string'],
                'voting_id'=>['required','string'],
            ]);

            $ext = strtolower($file->getClientOriginalExtension());
            if (in_array($ext, $valid_exts)) {

                $path = $request->file('file')->getRealPath();
                $data = \Excel::load($path, function($reader) {})->get();

                $total=count($data);
                if(!empty($data) && $data->count()){


                //    return $data;
                    // $user = \Auth::user()->id;
                    foreach($data as $value=>$row) {
                        $password = $row->password;
                        if (substr($row->index_number,'0','1') !=0)
                        {
                            $index_number = "0".$row->index_number;
                        }else{
                            $index_number = $row->index_number;
                        }

                            //check if student already exist
                            $testQuery = User::where('name', $index_number)->first();

                            if(empty($testQuery)){


                                $users = new User();
                                $users->department_id= $request->input('department_id');
                                $users->voting_id= $request->input('voting_id');
                                $users->name = $index_number;
                                $users->username = $index_number;
                                $users->password = Hash::make($password);
                                $users->role='Voter';
                                $users->save();

                            }
                            else{

                                //update student information if student indexNumber already exist
                                $users = User::where('name', $index_number)->first();
                                $users->department_id= $request->input('department_id');
                                $users->voting_id= $request->input('voting_id');
                                $users->name = $index_number;
                                $users->username = $index_number;
                                $users->password = Hash::make($password);
                                $users->role='Voter';
                                $users->save();
                            }

                    }
                }
            } else {
                return redirect('/voters/create')->with("error", "Only excel file is accepted!");
            }
        } else {
             return redirect('/voters/create')->with("error", "Please select an excel file!");
        }
        return redirect('/voters')->with("success", " $total Voters uploaded successfully");
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
        $users = User::with('department','voting')->where('id',$id)->get();

       // return $user;
        $voting = Voting::all();
        $departments = Department::all();
        return view('pages.voters.voters-edit')
            ->with('users',$users)
            ->with('voting',$voting)
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
        $users = User::find($id);

        $users->department_id= $request->input('department_id');
        $users->voting_id= $request->input('voting_id');
        $users->name= $request->input('index_number');
        $users->username= $request->input('index_number');
        $users->password= Hash::make($request->input('password'));
        $users->role= 'Voter';


        if ($request->input('password') != 0){

            $this->validate($request,[
                'department_id'=>['required','string'],
                'voting_id'=>['required','string'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
            ]);

            $checkUser = User::all()
                ->where('index_number',$request->input('index_number'))
                ->count();
            if ($checkUser>1){
                return redirect('/voters')
                    ->with('error','Voter is already exist');
            }else{
                if ($users->save()){
                    return redirect('/voters')
                        ->with('success','New Voter Added Successfully');
                }
            }
        }else{
            $this->validate($request,[
                'department_id'=>['required','string'],
                'voting_id'=>['required','string'],
            ]);
            $checkUser = User::all()
                ->where('index_number',$request->input('index_number'))
                ->count();
            if ($checkUser>1){
                return redirect('/voters')
                    ->with('error','Voter is already exist');
            }else{
                if ($users->save()){
                    return redirect('/voters')
                        ->with('success','New Voter Added Successfully');
                }
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
            return redirect('/voters')->with('success','Voter Deleted Successfully');
        }

    }
}
