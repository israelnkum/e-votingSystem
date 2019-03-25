<?php

namespace App\Http\Controllers;

use App\Department;
use App\Eligible;
use App\Level;
use App\Nominee;
use App\Participation;
use App\Position;
use App\Result;
use App\User;
use App\Voted;
use App\Voting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CastVotingController extends Controller
{
    function callAPI($method, $url, $data){
        $curl = curl_init();

        switch ($method){
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'APIKEY: 111111111111111111111',
            'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

        // EXECUTE:
        $result = curl_exec($curl);
        if(!$result){die("Connection Failure");}
        curl_close($curl);
        return $result;
    }
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
       if (Auth::user()->role == "Admin"){
           $singleArray =Voting::where('department_id',Auth::User()->department_id)->get();
       }elseif (Auth::user()->role == "Super Admin"){
        $singleArray =Voting::all();
    }else{
           $singleArray =Eligible::with('voting')->where('user_id',Auth::User()->id)->get();

       }
        //  $json = json_decode(curl("https://www.ttuportal.com/srms/api/student/".Auth::User()->username.""), true, JSON_PRETTY_PRINT);



        /* $belongsToVoting = [];
        //$eligibles = Eligible::where('user_id',Auth::User()->id)->get();

        foreach ($eligibles as $eligible){
            array_push($belongsToVoting ,Voting::where('id',$eligible->voting_id)->get());

        }


        foreach ($belongsToVoting as $childArray)
        {
            foreach ($childArray as $value)
            {
                $singleArray[] = $value;
            }
        }
        return $eligibles;*/


        return view('pages.cast-voting.select-voting')
            ->with('singleArray',$singleArray)
            ->with('json',$json);

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

        $voting = Voting::find($id);
        Session::put('current_voting_id',$id);
        return view('pages.cast-voting.cast-voting-index')
            ->with('current_voting_id',$id)
            ->with('voting_id',$id)
            ->with('voting',$voting)
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

        $voteCastedFor = [];
        foreach ($voteCasted as $item) {
            if ($item == 0){
                unset($item);
            }else{
                $totalVoteCounts= Result::where('nominee_id',$item)->first();

                array_push($voteCastedFor,Nominee::with('position')->where('id',$item)->first());

                $currentCount = $totalVoteCounts ->vote_count;
                $totalVoteCounts ->vote_count =
     // return $participation;
 $currentCount+1;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voting = Voting::find($id);

        $currentUser = User::with('department')
            ->where('id',Auth::User()->id)->get();

        //get all eligible to this voting

        $allEligible = Eligible::all()->where('voting_id',$id)->count();

        //get all participant voters in this voting
        $participant = Eligible::all()->where('voting_id',$id)
            ->where('participated',1)->count();

        //check if voted
        $votedOrNot = Eligible::where('user_id',Auth::User()->id)
            ->where('voting_id',$id)
            ->get();
        //return $votedOrNot;
        $positions = Nominee::with('position','level','department','result')
            ->where('department_id',Auth::User()->department_id)
            ->where('voting_id',$id)
            ->where('candidate',1)
            ->get()
            ->groupBy('position_id');

        $totalVoters = User::all()
            ->where('role','Voter')
            ->where('department_id',Auth::User()->department_id)
            ->where('voting_id',Auth::User()->voting_id)
            ->count();
        $totalNominees = Nominee::all()
            ->where('department_id',Auth::User()->department_id)
            ->where('voting_id',Auth::User()->voting_id)
            ->count();
        $totalCandidates = Nominee::all()
            ->where('candidate',1)
            ->where('department_id',Auth::User()->department_id)
            ->where('voting_id',Auth::User()->voting_id)
            ->count();
        $totalVoteCasted = User::all()
            ->where('voted','1')
            ->where('department_id',Auth::User()->department_id)
            ->where('voting_id',Auth::User()->voting_id)
            ->count();


        $totalLevel = Level::all()->count();
        $totalDepartment = Department::all()->count();
        $totalPositions = Position::all()->count();
        $totalVotings = Voting::all()->count();

        if (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin'){
            return view('pages.results.result-index')
                ->with('positions',$positions)
                ->with('totalVoters',$totalVoters)
                ->with('totalNominees',$totalNominees)
                ->with('totalCandidates',$totalCandidates)
                ->with('totalLevel',$totalLevel)
                ->with('totalDepartment',$totalDepartment)
                ->with('totalPositions',$totalPositions)
                ->with('totalVotings',$totalVotings)
                ->with('totalVoteCasted',$totalVoteCasted)
                ->with('currentUser',$currentUser)
                ->with('voting',$voting)
                ->with('allEligible',$allEligible)
                ->with('participant',$participant)
                ->with('votedOrNot',$votedOrNot);
        }else{
            return view('home')
                ->with('positions',$positions)
                ->with('totalVoters',$totalVoters)
                ->with('totalNominees',$totalNominees)
                ->with('totalCandidates',$totalCandidates)
                ->with('totalLevel',$totalLevel)
                ->with('totalDepartment',$totalDepartment)
                ->with('totalPositions',$totalPositions)
                ->with('totalVotings',$totalVotings)
                ->with('totalVoteCasted',$totalVoteCasted)
                ->with('currentUser',$currentUser)
                ->with('voting',$voting)
                ->with('allEligible',$allEligible)
                ->with('participant',$participant)
                ->with('votedOrNot',$votedOrNot);
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
}
