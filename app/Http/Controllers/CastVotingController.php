<?php

namespace App\Http\Controllers;

use App\Department;
use App\Eligible;
use App\Level;
use App\Nominee;
use App\Position;
use App\Result;
use App\User;
use App\Voting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CastVotingController extends Controller
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
     * @return string
     */
    public function index()
    {
        $json =[];

        if (Auth::user()->role == "Admin"){
            $singleArray =Voting::where('department_id',Auth::User()->department_id)->get();
//
        }else if (Auth::user()->role == "Super Admin"){
            $singleArray =Voting::all();
//
        }else{
            $singleArray =Eligible::with('voting')
                ->where('user_id',Auth::User()->id)->get();
         //   $json = json_decode(file_get_contents("https://www.ttuportal.com/srms/api/student/".Auth::User()->username.""), true, JSON_PRETTY_PRINT);
        }

      //  return $singleArray;

        return view('pages.cast-voting.select-voting')
            ->with('singleArray',$singleArray);
            //->with('json',$json);

    }
    /*
     *return Candidates based on current logged in user
     * i.e return Candidates based on the voting and department the user
     * belongs to
     */

    public function selectCandidates($id)
    {
        $getVoting = Voting::find($id);
        if (substr($getVoting->voting_date_start_time,0,10) == date('Y-m-d') && strtotime(date('Y-m-d h:i A')) < strtotime($getVoting->voting_date_start_time)) {
            return view('auth.login');
        }else{
            //check if voting is over
            $voter = Eligible::where('voting_id', $id)
                ->where('user_id', Auth::User()->id)->get();

            $voting = Voting::find($voter[0]->voting_id);


            $participation = Eligible::find($voter[0]->id);


            if ($participation->participated == 1 && strtotime(date('Y-m-d h:i A')) < strtotime(substr($voting->voting_date_start_time, 0, 10) . " " . $voting->ending_time)) {

                //return "voted";
                return view('auth.login')
                    ->with('success', 'Vote Casted Already');
            } elseif (strtotime(date('Y-m-d h:i A')) > strtotime(substr($voting->voting_date_start_time, 0, 10) . " " . $voting->ending_time)) {
                $voting = Voting::find($id);

                $currentUser = User::with('department')
                    ->where('id', Auth::User()->id)->get();

                //get all eligible to this voting

                $allEligible = Eligible::all()->where('voting_id', $id)->count();

                //get all participant voters in this voting
                $participant = Eligible::all()->where('voting_id', $id)
                    ->where('participated', 1)->count();

                //check if voted
                $votedOrNot = Eligible::where('user_id', Auth::User()->id)
                    ->where('voting_id', $id)
                    ->get();


                $positions = Nominee::with('position', 'level', 'department', 'result')
                    ->where('department_id', Auth::User()->department_id)
                    ->where('voting_id', $id)
                    ->where('candidate', 1)
                    ->orderBy('vetting_marks', 'desc')
                    ->get()
                    ->groupBy('position_id');

                $totalVoters = User::all()
                    ->where('role', 'Voter')
                    ->where('department_id', Auth::User()->department_id)
                    ->where('voting_id', Auth::User()->voting_id)
                    ->count();
                $totalNominees = Nominee::all()
                    ->where('department_id', Auth::User()->department_id)
                    ->where('voting_id', Auth::User()->voting_id)
                    ->count();
                $totalCandidates = Nominee::all()
                    ->where('candidate', 1)
                    ->where('department_id', Auth::User()->department_id)
                    ->where('voting_id', Auth::User()->voting_id)
                    ->count();
                $totalVoteCasted = User::all()
                    ->where('voted', '1')
                    ->where('department_id', Auth::User()->department_id)
                    ->where('voting_id', Auth::User()->voting_id)
                    ->count();


                $totalLevel = Level::all()->count();
                $totalDepartment = Department::all()->count();
                $totalPositions = Position::all()->count();
                $totalVotings = Voting::all()->count();


                //if super admin or admin
                if (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin') {
                    return view('pages.results.result-index')
                        ->with('positions', $positions)
                        ->with('totalVoters', $totalVoters)
                        ->with('totalNominees', $totalNominees)
                        ->with('totalCandidates', $totalCandidates)
                        ->with('totalLevel', $totalLevel)
                        ->with('totalDepartment', $totalDepartment)
                        ->with('totalPositions', $totalPositions)
                        ->with('totalVotings', $totalVotings)
                        ->with('totalVoteCasted', $totalVoteCasted)
                        ->with('currentUser', $currentUser)
                        ->with('voting', $voting)
                        ->with('allEligible', $allEligible)
                        ->with('participant', $participant)
                        ->with('votedOrNot', $votedOrNot);
                } //if not super-admin or admin
                else {
//            $json = json_decode(file_get_contents("https://www.ttuportal.com/srms/api/student/".Auth::User()->username.""), true, JSON_PRETTY_PRINT);

                    return view('home')
                        ->with('positions', $positions)
                        ->with('totalVoters', $totalVoters)
                        ->with('totalNominees', $totalNominees)
                        ->with('totalCandidates', $totalCandidates)
                        ->with('totalLevel', $totalLevel)
                        ->with('totalDepartment', $totalDepartment)
                        ->with('totalPositions', $totalPositions)
                        ->with('totalVotings', $totalVotings)
                        ->with('totalVoteCasted', $totalVoteCasted)
                        ->with('currentUser', $currentUser)
                        ->with('voting', $voting)
                        ->with('allEligible', $allEligible)
                        ->with('participant', $participant)
                        ->with('votedOrNot', $votedOrNot);
//                ->with('json',$json);
                }
            } else {
                $positions = Nominee::with('position', 'level', 'department')
                    ->where('department_id', Auth::User()->department_id)
                    ->where('voting_id', $id)
                    ->where('candidate', 1)
                    ->orderBy('position_number')
                    ->orderBy('vetting_marks', 'desc')
                    ->get()
                    ->groupBy('position_id');

                $voting = Voting::find($id);
                Session::put('current_voting_id', $id);

//        $json = json_decode(file_get_contents("https://www.ttuportal.com/srms/api/student/".Auth::User()->username.""), true, JSON_PRETTY_PRINT);

                return view('pages.cast-voting.cast-voting-index')
                    ->with('current_voting_id', $id)
                    ->with('voting_id', $id)
                    ->with('voting', $voting)
                    ->with('positions', $positions);
                //  ->with('json',$json);
            }

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $voter =Eligible::where('voting_id',Session::get('current_voting_id'))
            ->where('user_id',Auth::User()->id)->get();

        $participation = Eligible::find($voter[0]->id);

        if ($participation->participated == 1){

            //return "voted";
            return view('auth.login')
                ->with('success', 'Vote Casted Already');
        }else{
            //        return $request;

            $voteCasted =$request->input('voteCasted');

            $voteCastedFor = [];
            foreach ($voteCasted as $item) {
                if ($item == 0){
                    unset($item);
                }else{
                    $totalVoteCounts= Result::where('nominee_id',$item)->first();

                    array_push($voteCastedFor,Nominee::with('position')->where('id',$item)->first());

                    $currentCount = $totalVoteCounts ->vote_count;
                    $totalVoteCounts ->vote_count =$currentCount+1;
                    $totalVoteCounts->save();
                }

            }

            // return $voteCastedFor;
            $voter =Eligible::where('voting_id',Session::get('current_voting_id'))
                ->where('user_id',Auth::User()->id)->get();

            $participation = Eligible::find($voter[0]->id);

            // return $participation;

            //set participated to 1
            $participation->participated=1;
            $participation->save();

            $setVoted = User::find(Auth::User()->id);

            $setVoted ->voted =1;
            $setVoted->save();


            return view('pages.cast-voting.print-votes')
                ->with('voteCastedFor',$voteCastedFor);
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
        $voter =Eligible::where('voting_id',$id)
            ->where('user_id',Auth::User()->id)->get();
        if (Auth::user()->role =="Admin" || Auth::user()->role =="Super Admin"){
            $voting = Voting::find($id);
        }else{
            $voting = Voting::find($voter[0]->voting_id);
        }

        if (strtotime(date('Y-m-d h:i A')) <strtotime(substr($voting->voting_date_start_time,0,10)." ".$voting->ending_time)){

            //return "voted";
            return view('auth.login')
                ->with('success', 'Vote Casted Already');
        }else {
            $voting = Voting::find($id);

            $currentUser = User::with('department')
                ->where('id', Auth::User()->id)->get();

            //get all eligible to this voting

            $allEligible = Eligible::all()->where('voting_id', $id)->count();

            //get all participant voters in this voting
            $participant = Eligible::all()->where('voting_id', $id)
                ->where('participated', 1)->count();

            //check if voted
            $votedOrNot = Eligible::where('user_id', Auth::User()->id)
                ->where('voting_id', $id)
                ->get();
            //return $votedOrNot;
            $positions = Nominee::with('position', 'level', 'department', 'result')
                ->where('department_id', Auth::User()->department_id)
                ->where('voting_id', $id)
                ->where('candidate', 1)
                ->orderBy('position_number')
                ->orderBy('vetting_marks','desc')
                ->get()
                ->groupBy('position_id');

            $totalVoters = User::all()
                ->where('role', 'Voter')
                ->where('department_id', Auth::User()->department_id)
                ->where('voting_id', Auth::User()->voting_id)
                ->count();
            $totalNominees = Nominee::all()
                ->where('department_id', Auth::User()->department_id)
                ->where('voting_id', Auth::User()->voting_id)
                ->count();
            $totalCandidates = Nominee::all()
                ->where('candidate', 1)
                ->where('department_id', Auth::User()->department_id)
                ->where('voting_id', Auth::User()->voting_id)
                ->count();
            $totalVoteCasted = User::all()
                ->where('voted', '1')
                ->where('department_id', Auth::User()->department_id)
                ->where('voting_id', Auth::User()->voting_id)
                ->count();


            $totalLevel = Level::all()->count();
            $totalDepartment = Department::all()->count();
            $totalPositions = Position::all()->count();
            $totalVotings = Voting::all()->count();

            if (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin') {
                return view('pages.results.result-index')
                    ->with('positions', $positions)
                    ->with('totalVoters', $totalVoters)
                    ->with('totalNominees', $totalNominees)
                    ->with('totalCandidates', $totalCandidates)
                    ->with('totalLevel', $totalLevel)
                    ->with('totalDepartment', $totalDepartment)
                    ->with('totalPositions', $totalPositions)
                    ->with('totalVotings', $totalVotings)
                    ->with('totalVoteCasted', $totalVoteCasted)
                    ->with('currentUser', $currentUser)
                    ->with('voting', $voting)
                    ->with('allEligible', $allEligible)
                    ->with('participant', $participant)
                    ->with('votedOrNot', $votedOrNot);
            } else {
//            $json = json_decode(file_get_contents("https://www.ttuportal.com/srms/api/student/".Auth::User()->username.""), true, JSON_PRETTY_PRINT);

                return view('home')
                    ->with('positions', $positions)
                    ->with('totalVoters', $totalVoters)
                    ->with('totalNominees', $totalNominees)
                    ->with('totalCandidates', $totalCandidates)
                    ->with('totalLevel', $totalLevel)
                    ->with('totalDepartment', $totalDepartment)
                    ->with('totalPositions', $totalPositions)
                    ->with('totalVotings', $totalVotings)
                    ->with('totalVoteCasted', $totalVoteCasted)
                    ->with('currentUser', $currentUser)
                    ->with('voting', $voting)
                    ->with('allEligible', $allEligible)
                    ->with('participant', $participant)
                    ->with('votedOrNot', $votedOrNot);
//                ->with('json',$json);
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
        //
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
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAllVoters($id){

        //get all participant voters in this voting
     /*   $participants = Eligible::with('voting')->where('voting_id', $id)
            ->where('participated', 1)->get();*/
$participants = User::with('eligible','voting')
    ->where('role','Voter')
    ->get();


        return view('pages.voting.allVoteCasted')
            ->with('participants',$participants);
    }
}
