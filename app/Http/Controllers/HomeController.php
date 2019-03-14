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
                $totalVotings = Voting::all()->where('department_id', Auth::User()->department_id)
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
                    ->with('currentUser',$currentUser);
            }else{
                return view('pages.first_login.update-password');
            }
        }elseif(Auth::User()->role == 'Voter' && Auth::User()->voted == 1){
            return redirect('/cast-voting');
        }else{
            return redirect('/cast-voting');
        }
    }
}
