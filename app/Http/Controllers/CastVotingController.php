<?php

namespace App\Http\Controllers;

use App\Department;
use App\Level;
use App\Nominee;
use App\Position;
use App\Result;
use App\User;
use App\Voting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $positions = Nominee::with('position','level','department','result')
            ->where('department_id',Auth::User()->department_id)
            ->where('voting_id',Auth::User()->voting_id)
            ->where('candidate',1)
            //->sort(result.vote_count)
            ->get()
            ->groupBy('position_id');

        //return $positions;
        /*
         *checking if user has already voted
         * if yes the redirect to the dashboard
         */

        //return $positions;
        if(Auth::User()->role == 'Voter' && Auth::User()->voted == 1){

            $totalVoters = User::all()
                ->where('role','Voter')
                ->count();
            $totalNominees = Nominee::all()->count();
            $totalCandidates = Nominee::all()->where('candidate',1)->count();


            $totalVoteCasted = User::all()->where('voted','1')->count();

            $totalLevel = Level::all()->count();
            $totalDepartment = Department::all()->count();
            $totalPositions = Position::all()->count();
            $totalVotings = Voting::all()->count();

            return view('home')
           // return view('pages.cast-voting.voter-dashboard')
                ->with('positions',$positions)
                ->with('totalVoters',$totalVoters)
                ->with('totalNominees',$totalNominees)
                ->with('totalCandidates',$totalCandidates)
                ->with('totalLevel',$totalLevel)
                ->with('totalDepartment',$totalDepartment)
                ->with('totalPositions',$totalPositions)
                ->with('totalVotings',$totalVotings)
                ->with('totalVoteCasted',$totalVoteCasted);
        }else{
            /*
            *checking if user has not voted yet
            * then select voting type
            */

            $currentVoter = User::where('id',Auth::User()->id)->get();
            foreach ( $currentVoter as $voter){

            }
            $allVotings =explode(',',$voter->voting_id);
            $belongsToVoting=[];

            $singleArray = [];
            // return $all;
            foreach ($allVotings as $allVoting){
                array_push($belongsToVoting,Voting::all()->where('id',$allVoting));
            }

            foreach ($belongsToVoting as $childArray)
            {
                foreach ($childArray as $value)
                {
                    $singleArray[] = $value;
                }
            }

            //  return $singleArray;

            return view('pages.cast-voting.select-voting')
                ->with('singleArray',$singleArray);
        }

    }
    /*
     *return Candidates based on current logged in user
     * i.e return Candidates based on the voting and department the user
     * belongs to
     */

    public function selectCandidates($id){
        $positions = Nominee::with('position','level','department')
            ->where('department_id',Auth::User()->department_id)
            ->where('voting_id',$id)
            ->where('candidate',1)
            ->orderBy('position_number')
            ->get()
            ->groupBy('position_id');

        // return $howOldAmI = Carbon::createFromDate(1996, 1, 1)->age;

        return view('pages.cast-voting.cast-voting-index')
            ->with('voting_id',$id)
            ->with('positions',$positions);
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

        $voteCasted =$request->input('voteCasted');

        foreach ($voteCasted as $item) {
            if ($item == 0){
                unset($item);
            }else{
                $totalVoteCounts= Result::where('nominee_id',$item)->first();

                $currentCount = $totalVoteCounts ->vote_count;
                $totalVoteCounts ->vote_count =  $currentCount+1;
                $totalVoteCounts->save();
            }

        }

        $setVoted = User::find(Auth::User()->id);

        $setVoted ->voted =1;
        $setVoted->save();


        $positions = Nominee::with('position','level','department')
            ->where('department_id',Auth::User()->department_id)
            ->where('voting_id',Auth::User()->voting_id)
            ->where('candidate',1)
            ->orderBy('position_number')
            ->get()
            ->groupBy('position_id');

        return view('pages.cast-voting.voter-dashboard')
            ->with('success','Voting Successful')
            ->with('positions',$positions);
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
}
