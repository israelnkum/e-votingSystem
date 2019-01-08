<?php

namespace App\Http\Controllers;

use App\Department;
use App\Nominee;
use App\User;
use App\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DepartmentController extends Controller
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
        return view('pages.departments.department-index')
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
        $positions = new Department();

        $positions->name=$request->input('department_name');
        $positions->added_by=Auth::user()->name;

        $checkPosition = Department::all()
            ->where('name',$request->input('department_name'))
            ->count();

        if ($checkPosition>0){
            return redirect('/departments')
                ->with('error','Department Name already exist');
        }else{
            if ($positions->save()){
                return redirect('/departments')
                    ->with('success','Department Added Successfully');
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
        $department = Department::find($id);

        return view('pages.departments.department-edit')
            ->with('department',$department);
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
        $positions = Department::find($id);

        $positions->name=$request->input('department_name');
        $positions->added_by=Auth::user()->name;

        $checkPosition = Department::all()
            ->where('name',$request->input('department_name'))
            ->count();

        if ($checkPosition>1){
            return redirect('/departments')
                ->with('error','Department Name already exist');
        }else{
            if ($positions->save()){
                return redirect('/departments')
                    ->with('success','Department Added Successfully');
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
        $department = Department::find($id);

        if ($department->delete()) {

            //delete all nominees images from folder

            $nominees = Nominee::where('department_id',$id)->get();
            foreach ($nominees as $nominee){
                File::delete(public_path('nominee_img/'.$nominee->image));
            }

            //delete all nominees that belongs to the particular voting deleted
            Nominee::where('department_id',$id)->get()->each->delete();

            //delete all voters that belongs to the particular voting selected
            Voter::where('department_id',$id)
                ->where('role','Voter')->get()->each->delete();


            return redirect('/departments')
                ->with('success', 'Department Deleted Successfully');
        }
    }
}
