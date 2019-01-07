<?php

namespace App\Http\Controllers;

use App\Nominee;
use App\Position;
use App\User;
use App\Voting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
        /*
         *checking if user has already voted
         * if yes the redirect to the dashboard
         */
        if(Auth::User()->role == 'Voter' && Auth::User()->voted == 1){
            return view('pages.cast-voting.voter-dashboard');
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

        return $request->input('voteCasted');
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
