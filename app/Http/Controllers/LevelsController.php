<?php

namespace App\Http\Controllers;

use App\Level;
use App\Nominee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class LevelsController extends Controller
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
        $levels=Level::all();
        return view('pages.levels.levels-index')
            ->with('levels',$levels);
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
        $levels = new Level();

        $levels->name=strtoupper($request->input('level_name'));
        $levels->added_by=Auth::user()->name;

        $checkPosition = Level::all()
            ->where('name',strtoupper($request->input('level_name')))
            ->count();

        if ($checkPosition>0){
            return redirect('/levels')
                ->with('error','Level Name already exist');
        }else{
            if ($levels->save()){
                return redirect('/levels')
                    ->with('success','Level Added Successfully');
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
        $level= Level::find($id);

        return view('pages.levels.levels-edit')
            ->with('level',$level);
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
        $levels = Level::find($id);

        $levels->name=strtoupper($request->input('level_name'));
        $levels->added_by=Auth::user()->name;

        $checkPosition = Level::all()
            ->where('name',$request->input('level_name'))
            ->count();

        if ($checkPosition>0){
            return redirect('/levels')
                ->with('error','Level Name already exist');
        }else{
            if ($levels->save()){
                return redirect('/levels')
                    ->with('success','Level Updated Successfully');
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
        $level = Level::find($id);


        if ($level->delete()) {

            $nominees = Nominee::where('level_id',$id)->get();
            foreach ($nominees as $nominee){
                File::delete(public_path('nominee_img/'.$nominee->image));
            }

            //delete all nominees that belongs to the particular voting deleted
            Nominee::where('level_id',$id)->get()->each->delete();


            return redirect('/levels')
                ->with('success', 'Level Deleted Successfully');
        }
    }
}
