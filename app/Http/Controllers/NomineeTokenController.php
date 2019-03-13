<?php

namespace App\Http\Controllers;

use App\Department;
use App\NomineeToken;
use App\Voting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NomineeTokenController extends Controller
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
        $departments = Department::all();

        $voting = [];
        $allTokens = [];
        if (Auth::User()->role == "Admin"){
            $voting = Voting::all()
                ->where('department_id', Auth::User()->department_id);

            $allTokens = NomineeToken::all()
                ->where('department_id',Auth::User()->department_id)
                ->where('voting_id',Auth::User()->voting_id);
        }elseif (Auth::User()->role == "Super Admin"){
            $voting = Voting::all();
            $allTokens = NomineeToken::all();
        }




        //return $allTokens;
        return view('pages.generate_tokens.generate-token-index')
            ->with('departments',$departments)
            ->with('voting',$voting)
            ->with('allTokens',$allTokens);
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
        function random_str($length, $keySpace = '01123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'){
            $pieces =[];
            $max = mb_strlen($keySpace, '8bit') -1;
            for ($i =0; $i<$length; $i++){
                $pieces []=$keySpace[random_int(0,$max)];
            }

            return implode('',$pieces);

        }

        $tokenNumber = random_str(8,'01123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ');


        $token = new NomineeToken();

        $token->name=$request->input('index_number');
        $token->username=$request->input('index_number');
        $token->department_id=$request->input('department_id');
        $token->voting_id=$request->input('voting_id');
        $token->token_number=$tokenNumber;
        $token->generated_by=Auth::User()->name;
        $token->password=Hash::make($tokenNumber);

        $checkIndexNumber = NomineeToken::all()
            ->where('name',$request->input('index_number'))
            ->count();

        $checkToken = NomineeToken::all()
            ->where('token_number',$request->input('random_token'))
            ->count();

        if ($checkIndexNumber==1){
            return redirect('/nominee_token')
                ->with('error','Index Number already exist');
        }elseif($checkToken>1) {
            return redirect('/nominee_token')
                ->with('error','Token Number already exist');
        }else{
            if ($token->save()) {
                return redirect('/nominee_token')
                    ->with('success', 'Token Generated');
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
        $ctokens = NomineeToken::with('department','voting')
                ->where('id',$id)->get();

        $departments = Department::all();
        $voting = Voting::all();

        //return $token;
        return view('pages.generate_tokens.edit-token')
            ->with('ctokens',$ctokens)
            ->with('departments',$departments)
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
        $token = NomineeToken::find($id);

        $token->name=$request->input('index_number');
        $token->username=$request->input('index_number');
        $token->department_id=$request->input('department_id');
        $token->voting_id=$request->input('voting_id');


        $checkIndexNumber = NomineeToken::all()
            ->where('name',$request->input('index_number'))
            ->count();

        if ($checkIndexNumber==1){
            return redirect('/nominee_token')
                ->with('error','Index Number already exist');
        }else{
            if ($token->save()) {
                return redirect('/nominee_token')
                    ->with('success', 'Token Generated');
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
        $token=NomineeToken::find($id);

        if ($token->delete()){
            return redirect('/nominee_token')
                ->with('success', 'Token Deleted');
        }

    }
}
