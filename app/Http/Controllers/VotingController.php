<?php

namespace App\Http\Controllers;

use App\Department;
use App\Nominee;
use App\User;
use App\Voting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Carbon;

class VotingController extends Controller
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
        $current_date = Carbon::yesterday()->format('Y-m-d');
        $current_time = Carbon::now()->toDateTimeString();

        //return $current_date;
       // $check = '';
        $voting = Voting::with('department')->get();


        return view('pages.voting.voting-index')
            ->with('voting',$voting)
            ->with('current_date',$current_date)
            ->with('current_time',$current_time);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('pages.voting.voting-create')
            ->with('departments',$departments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $voting = new Voting();

        $voting->name=$request->input('voting_name');
        $voting->department_id=$request->input('department_id');
        $voting->voting_date_start_time=$request->input('voting_date')." ".$request->input('starting_time');
        $voting->ending_time=$request->input('ending_time');
        $voting->added_by=Auth::user()->name;

        $checkPosition = Voting::all()
            ->where('name',$request->input('voting_name'))
            ->count();

        if ($checkPosition>0){
            return redirect('/voting/create')
                ->with('error','Voting Name already exist')
                ->withInput(Input::all());
        }else{
            if ($voting->save()){
                return redirect('/voting')
                    ->with('success','Voting Added Successfully');
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

    public function startOrEndVoting($id){

        $voting = Voting::find($id);

        if ($voting->status == 0){
            $voting->status=1;
            if ($voting->save()){
                return redirect('/voting')
                    ->with('success','Voting Started');
            }
        }else{
            $voting->status=0;
            if ($voting->save()){
                return redirect('/voting')
                    ->with('success','Voting Ended');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $voting = Voting::find($id);
        return view('pages.voting.voting-edit')->with('voting',$voting);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $voting = Voting::find($id);

        $voting->name=$request->input('voting_name');
        $voting->voting_date=$request->input('voting_date');
        $voting->starting_time=$request->input('starting_time');
        $voting->ending_time=$request->input('ending_time');

        $checkPosition = Voting::all()
            ->where('name',$request->input('voting_name'))
            ->count();

        if ($checkPosition>0){
            return redirect('/voting')
                ->with('error','Voting Name already exist')
                ->withInput(Input::all());
        }else{
            if ($voting->save()){
                return redirect('/voting')
                    ->with('success','Voting Updated Successfully');
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
        $voting = Voting::find($id);

        $nominees = Nominee::where('department_id',$id);
        $voters = User::where('department_id',$id);
        if ($voting->delete()) {
            $nominees->delete();
            $voters->delete();
            return redirect('/voting')
                ->with('success', 'Voting Deleted Successfully');
        }

    }
}
