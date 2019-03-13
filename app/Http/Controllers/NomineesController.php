<?php

namespace App\Http\Controllers;

use App\Department;
use App\Level;
use App\Nominee;
use App\Position;
use App\Result;
use App\Voting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class NomineesController extends Controller
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

         $nominees = Nominee::with('position','level','department')
             ->where('department_id',Auth::User()->department_id)
             ->where('voting_id',Auth::User()->voting_id)
             ->get();
       //return $nominees;
        return view('pages.nominees.nominees-index')
            ->with('nominees',$nominees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $voting = [];
        if (Auth::User()->role == "Admin"){
            $voting = Voting::all()
                ->where('department_id', Auth::User()->department_id);
        }elseif (Auth::User()->role == "Super Admin"){
            $voting = Voting::all();
        }
        $positions = Position::all();
        $levels = Level::all();
        $departments= Department::all();
        return view('pages.nominees.nominees-create')
            ->with('levels',$levels)
            ->with('positions',$positions)
            ->with('voting',$voting)
            ->with('departments',$departments);
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
        $this->Validate($request, [
            'voting_id' => ['required', 'string', 'max:99'],
            'department_id' => ['required', 'string', 'max:99'],
            'region' => ['required', 'string', 'max:99'],
            'levels' => ['required', 'string', 'max:99'],
            'image_file'=>'image|mimes:jpeg,png,jpg|max:7048',

        ]);
        $nominee = new Nominee();
        $nominee->voting_id=$request->input('voting_id');
        $nominee->first_name=$request->input('first_name');
        $nominee->last_name=$request->input('last_name');
        $nominee->other_name=$request->input('other_name');
        $nominee->date_of_birth=$request->input('voting_date');
        $nominee->home_town=$request->input('home_town');
        $nominee->region=$request->input('region');
        $nominee->home_address=$request->input('home_address');
        $nominee->telephone=$request->input('telephone');
        $nominee->email=$request->input('email_address');
        $nominee->level_id=$request->input('levels');
        $nominee->department_id=$request->input('department_id');
        $nominee->index_number=$request->input('index_number');
        $nominee->cgpa=$request->input('cgpa');
        $nominee->position_id=$request->input('position');
        $nominee->position_held=$request->input('previous_position');

        $image = $request->file('image_file');
        $image_name = $request->input('index_number').".".$image->getClientOriginalExtension();
        $image->move(public_path("nominee_img"),$image_name);

        $nominee->image=$image_name;
        $nominee->added_by=Auth::user()->name;

        $checkNominee = Nominee::all()
            ->where('index_number',$request->input('index_number'))
            ->count();
        if ($checkNominee>0){
            return redirect('/nominees/create')
                ->with('error','Nominee  already exist');
        }else{
            if ($nominee->save()){
                return redirect('/nominees')
                    ->with('success','Nominee Added Successfully');
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
        $nominees = Nominee::with('position','level','voting')
            ->where('id',$id)->get();
      // return $nominees;
        $levels=Level::all();
        $positions = Position::all();
        $voting = Voting::all();
        $departments = Department::all();

        return view('pages.nominees.nominees-edit')
            ->with('nominees',$nominees)
            ->with('levels',$levels)
            ->with('positions',$positions)
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
        $this->Validate($request, [
            'levels' => ['required', 'string', 'max:99'],
            'image_file'=>'image|mimes:jpeg,png,jpg|max:2048'
            // 'image_file' => ['required'],
            //    'email' => ['required', 'string', 'email', 'max:255', 'unique:nominees'],

        ]);
        $nominee = Nominee::find($id);

        $nominee->first_name=$request->input('first_name');
        $nominee->last_name=$request->input('last_name');
        $nominee->other_name=$request->input('other_name');
        $nominee->date_of_birth=$request->input('voting_date');
        $nominee->home_town=$request->input('home_town');
        $nominee->region=$request->input('region');
        $nominee->home_address=$request->input('home_address');
        $nominee->telephone=$request->input('telephone');
        $nominee->email=$request->input('email_address');
        $nominee->level_id=$request->input('levels');
        $nominee->index_number=$request->input('index_number');
        $nominee->cgpa=$request->input('cgpa');
        $nominee->position_id=$request->input('position');
        $nominee->position_held=$request->input('previous_position');

        if ($request->file('image_file')==''){
            $nominee->save();
            return redirect('/nominees')
                ->with('success','Nominee Info Updated Successfully');
        }else{
            $image = $request->file('image_file');
            $image_name = $request->input('index_number').".".$image->getClientOriginalExtension();
            $image->move(public_path("nominee_img"),$image_name);
            $nominee->image=$image_name;

            $nominee->save();
            return redirect('/nominees')
                ->with('success','Nominee Info Updated Successfully');
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

        $nominees = Nominee::find($id);
        if ($nominees->delete()) {
            File::delete(public_path('nominee_img/'.$nominees->image));

            return redirect('/nominees')
                ->with('success', 'Nominee Deleted Successfully');
        }
    }


    public function makeCandidate($id){

        $nominee = Nominee::find($id);

        if ($nominee->candidate == 0){
            $nominee->candidate=1;
            if ($nominee->save()){
                $result = new Result();
                $result->voting_id= $nominee->voting_id;
                $result->department_id= $nominee->department_id;
                $result->nominee_id= $nominee->id;
                $result->position_id= $nominee->position_id;

                $result->save();

                return redirect('/nominees')
                    ->with('success','Candidate Made');
            }
        }else{
            $nominee->candidate=0;
            if ($nominee->save()){
                Result::where('nominee_id', $nominee->id)->get()->each->delete();
                return redirect('/nominees')
                    ->with('success','Candidate Unmade');
            }
        }
    }
}
