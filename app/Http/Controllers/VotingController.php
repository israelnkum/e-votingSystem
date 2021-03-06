<?php

namespace App\Http\Controllers;

use App\Department;
use App\Nominee;
use App\User;
use App\Voter;
use App\Voting;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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

        $voting = [];

        if(Auth::User()->role == "Admin"){
            $voting = Voting::with('department')
                ->where('department_id',Auth::User()->department_id)
                ->get();

        }elseif (Auth::User()->role == "Super Admin"){
            $voting = Voting::with('department')->get();
        }


        return view('pages.voting.voting-index')
            ->with('voting',$voting)
            ->with('current_date',$current_date)
            ->with('current_time',$current_time)
            ;
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

    public function startOrEndVoting(Request $request, $id){

        $voting = Voting::find($id);


        $status=  $request->input('voting_status');
        $date = date('Y-m-d h:i A');
        $time =date('h:i A');

        //return $status;
        if ($status == 0){
            $voting->voting_date_start_time = $date;
            if ($voting->save()){
                return redirect('/voting')
                    ->with('success','Voting Started');
            }
        }elseif($status == 1){
            $voting->ending_time = $time;
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

        //return $voting;
        return view('pages.voting.voting-edit')
            ->with('voting',$voting);
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
        $voting->voting_date_start_time=$request->input('voting_date')." ".$request->input('starting_time');
        $voting->ending_time=$request->input('ending_time');

        $checkPosition = Voting::all()
            ->where('name',$request->input('voting_name'))
            ->count();

        if ($checkPosition>1){
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


        if ($voting->delete()) {
            //delete all nominees images from folder

            $nominees = Nominee::where('voting_id',$id)->get();
            foreach ($nominees as $nominee){
                File::delete(public_path('nominee_img/'.$nominee->image));
            }

            //delete all nominees that belongs to the particular voting deleted

            Nominee::where('voting_id',$id)->get()->each->delete();

            //delete all voters that belongs to the particular voting selected
            User::where('voting_id',$id)
                ->where('role','Voter')->get()->each->delete();


            return redirect('/voting')
                ->with('success', 'Voting Deleted Successfully');
        }

    }
}
