<?php

namespace App\Http\Controllers;

use App\Department;
use App\Level;
use App\Nominee;
use App\Position;
use App\User;
use App\Voting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $max_voters_count=0;
        $totalLevelCount = [];
        $levelNames = [];
        $totalMales = [];
        $totalFemales = [];
        $totalEachLevelVoters = [];
        if (Auth::User()->role == 'Super Admin'){
            $level_ids = Level::all();
        }else{
            $level_ids = Level::all()->where('department_id',Auth::User()->department_id);

        }


        $allVotingNames = [];
        $totalVoterInEachVoting = [];
        $totalNomineesInEachVoting =[];
        $totalCandidatesInEachVoting =[];
        $totalVotesCastedInEachVoting = [];
        if (Auth::User()->role == 'Admin' || Auth::User()->role == 'Super Admin'){

            $voting_ids = Voting::all()->where('department_id', Auth::User()->department_id);

            foreach ($voting_ids as $votes){
                //get all voting Names
                array_push($allVotingNames,$votes->name);

                //get total voters in each voting
                array_push($totalVoterInEachVoting,User::where('voting_id', $votes->id)
                    ->where('role','voter')->count());

                //count all nominees in each voting
                array_push($totalNomineesInEachVoting,Nominee::where('voting_id', $votes->id)
                    ->count());

                //count all candidate in each voting
                array_push($totalCandidatesInEachVoting,Nominee::where('voting_id', $votes->id)
                    ->where('candidate',1)->count());

                //count total votes casted in each voting
                array_push($totalVotesCastedInEachVoting,User::where('voting_id', $votes->id)
                    ->where('voted',1)
                    ->where('role','voter')->count());
            }

            $max_voters_count = max($totalVoterInEachVoting);
        }



       // return $level_ids;

        //Loop through all levels
        foreach ($level_ids as $ids){
            array_push($totalLevelCount,User::where('level_id', $ids->id)
                ->where('department_id',Auth::User()->department_id)
                ->where('role','voter')->count());
            array_push($totalMales,User::
            where('level_id', $ids->id)
                ->where('gender', 'MALE')
                ->where('department_id',Auth::User()->department_id)
                ->where('role','voter')->count());
            array_push($totalFemales,User::where('level_id', $ids->id)
                ->where('department_id',Auth::User()->department_id)
                ->where('gender', 'FEMALE')
                ->where('role','voter')->count());

            array_push($totalEachLevelVoters,User::where('level_id', $ids->id)
                ->where('department_id',Auth::User()->department_id)
                ->where('voted', 1)
                ->where('role','voter')->count());

            array_push($levelNames, $ids->name);

        }
        $max_lvl_count = max($totalLevelCount);


        if (Auth::User()->role == 'Admin' || Auth::User()->role == 'Super Admin'){
            if (Auth::User()->updated == 1 ){
                $currentUser = User::with('department','voting')
                    ->where('id',Auth::User()->id)->get();

                // return $currentUser;
                $totalVoters = User::all()
                    ->where('role','Voter')
                    ->where('department_id',Auth::User()->department_id)
                    ->where('voting_id',Auth::User()->voting_id)
                    ->count();
                $totalNominees = Nominee::all()
                    ->where('department_id',Auth::User()->department_id)
                    ->where('voting_id',Auth::User()->voting_id)
                    ->count();
                $totalCandidates = Nominee::all()->where('candidate',1)
                    ->where('department_id',Auth::User()->department_id)
                    ->where('voting_id',Auth::User()->voting_id)
                    ->count();
                $totalVoteCasted = User::all()
                    ->where('department_id',Auth::User()->department_id)
                    ->where('voting_id',Auth::User()->voting_id)
                    ->where('voted','1')
                    ->count();
                $totalLevel = Level::all()->count();


                $totalDepartment = Department::all()->count();
                $totalPositions = Position::all()->count();
                $totalVotings = Voting::all()
                    ->where('department_id', Auth::User()->department_id)
                    ->count();


                return view('home')
                    ->with('totalVoters',$totalVoters)
                    ->with('totalNominees',$totalNominees)
                    ->with('totalCandidates',$totalCandidates)
                    ->with('totalLevel',$totalLevel)
                    ->with('totalDepartment',$totalDepartment)
                    ->with('totalPositions',$totalPositions)
                    ->with('totalVotings',$totalVotings)
                    ->with('totalVoteCasted',$totalVoteCasted)
                    ->with('currentUser',$currentUser)
                    ->with('levelNames',$levelNames)
                    ->with('totalLevelCount',$totalLevelCount)
                    ->with('totalMales',$totalMales)
                    ->with('totalFemales',$totalFemales)
                    ->with('max_lvl_count',$max_lvl_count)
                    ->with('totalEachLevelVoters',$totalEachLevelVoters)
                    ->with('allVotingNames',$allVotingNames)
                    ->with('totalVoterInEachVoting',$totalVoterInEachVoting)
                    ->with('max_voters_count',$max_voters_count)
                    ->with('totalNomineesInEachVoting',$totalNomineesInEachVoting)
                    ->with('totalCandidatesInEachVoting',$totalCandidatesInEachVoting)
                    ->with('totalVotesCastedInEachVoting',$totalVotesCastedInEachVoting);
            }else{

                return view('pages.first_login.update-password')

                    ->with('levelNames',$levelNames)
                    ->with('totalLevelCount',$totalLevelCount)
                    ->with('totalMales',$totalMales)
                    ->with('totalFemales',$totalFemales)
                    ->with('max_lvl_count',$max_lvl_count)
                    ->with('totalEachLevelVoters',$totalEachLevelVoters)
                    ->with('allVotingNames',$allVotingNames)
                    ->with('totalVoterInEachVoting',$totalVoterInEachVoting)
                    ->with('max_voters_count',$max_voters_count)
                    ->with('totalNomineesInEachVoting',$totalNomineesInEachVoting)
                    ->with('totalCandidatesInEachVoting',$totalCandidatesInEachVoting)
                    ->with('totalVotesCastedInEachVoting',$totalVotesCastedInEachVoting);;

            }
        }elseif(Auth::User()->role == 'Voter' && Auth::User()->voted == 1){
            return redirect('/cast-voting');
        }else{
            return redirect('/cast-voting');
        }
    }
}
