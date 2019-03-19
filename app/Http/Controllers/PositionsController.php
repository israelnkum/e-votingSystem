<?php

namespace App\Http\Controllers;

use App\Department;
use App\Nominee;
use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PositionsController extends Controller
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
        if (Auth::user()->role == 'Super Admin'){
            $positions = Position::orderBy('position_number')->get();
        }else{
            $positions = Position::orderBy('position_number')
                ->where('department_id',Auth::user()->department_id)->get();
        }
        return view('pages.positions.position-index')
            ->with('positions',$positions)
            ->with('departments',$departments);
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
        $countPosition = Position::all()->count();

        $positions = new Position();

        $positions->name=$request->input('position_name');
        $positions->position_number=$countPosition+1;
        $positions->added_by=Auth::user()->name;
        if (Auth::user()->role == 'Super Admin'){
            $positions->department_id=$request->input('department_id');
        }else{
            $positions->department_id=Auth::user()->department_id;
        }

        $checkPosition = Position::all()
            ->where('name',$request->input('position_name'))
            ->where('department_id',Auth::user()->department_id)
            ->count();

        if ($checkPosition>0){
            return redirect('/positions')
                ->with('error','Position Name already exist');
        }else{
            if ($positions->save()){
                return redirect('/positions')
                    ->with('success','Position Added Successfully');
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
        $position = Position::find($id);

        return view('pages.positions.position-edit')
            ->with('position',$position);
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
        $positions = Position::find($id);
        $positions->name=$request->input('position_name');

        $checkPosition = Position::all()
            ->where('name',$request->input('position_name'))
            ->count();

        if ($checkPosition>1){
            return redirect('/positions')
                ->with('error','Position Name already exist');
        }else{
            if ($positions->save()){
                return redirect('/positions')
                    ->with('success','Position Updated Successfully');
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

        $positions = Position::find($id);

        if ($positions->delete()) {

            $nominees = Nominee::where('position_id',$id)->get();
            foreach ($nominees as $nominee){
                File::delete(public_path('nominee_img/'.$nominee->image));
            }

            Nominee::where('position_id',$id)->get()->each->delete();

            return redirect('/positions')
                ->with('success', 'Position Deleted Successfully');
        }
    }
}
