@extends('layouts.app')
@section('content')

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Position</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">New Position</li>
            </ol>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New Position</h4>
                    <form class="m-t-10 needs-validation form-material" method="post" action="{{route('positions.store')}}" novalidate>
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <input type="text" name="position_name" class="form-control" placeholder="Position" required>
                                <div class="invalid-feedback">
                                    Name required
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                @if(Auth::User()->role == "Super Admin")
                                    <select name="department_id" class="select2 form-control" required>
                                        <option value="">Select Department</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Department required!
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="text-xs-right m-t-5 text-right">
                            <button type="submit" class="btn btn-outline-info">Add Position</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-dark">
                    <h4 class="card-title">All Positions</h4>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="nowrap table  table-striped " cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Position No.</th>
                                <th>Name</th>
                                <th>Added By</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Manage</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($positions as $position)
                                <tr>
                                    <td>{{$position->position_number}}</td>
                                    <td>{{$position->name}}</td>
                                    <td>{{$position->added_by}}</td>
                                    <td>{{substr($position->created_at,0,10)}}</td>
                                    <td>{{substr($position->created_at,10)}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="manage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="manage">
                                                <a href="{{route('positions.edit',$position->id)}}" class="dropdown-item ml-1 text-dark">
                                                    <i class="mdi mdi-account-edit"></i> Edit
                                                </a>
                                                <div class="dropdown-item">
                                                    <form method="post" action="{{route('positions.destroy',$position->id)}}" onsubmit="return confirm('Do you really want to delete this Position')">
                                                        @csrf
                                                        {!! method_field('DELETE') !!}
                                                        <button type="submit" style="background: transparent; border: 0;">
                                                            <i class="mdi mdi-delete"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


{{--


@extends('layouts.app')
@section('content')

            <div class="block-header">
                <div class="row">
                    <div class="col-xl-6 col-lg-5 col-md-4 col-sm-12">
                        <ul class="breadcrumb breadcrumb-style">
                            <li class="breadcrumb-item 	bcrumb-1">
                                <i class="material-icons text-dark">home</i>
                                <a href="{{route('home')}}">
                                    <span>Home</span>
                                </a>
                            </li>
                            <li  class="breadcrumb-item 	bcrumb-1">
                                <a href="javascript:void(0)">Positions</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xl-6 col-lg-7 col-md-8 col-sm-12 text-right">
                        <div class="breadcrumb-chart m-l-50">
                            <div class="float-right">
                                <div class="icon m-b-10">
                                    <div class="chart header-bar">
                                        <canvas width="49" height="40"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="float-right m-r-10">
                                <div class="chart-info m-t-5">
                                    <i class="fas fa-dollar-sign m-r-5"></i>
                                    <span>$8,968</span>
                                    <p>Total Income</p>
                                </div>
                            </div>
                        </div>
                        <div class="breadcrumb-chart m-l-50">
                            <div class="float-right">
                                <div class="icon m-b-10">
                                    <div class="chart header-bar2">
                                        <canvas width="49" height="40"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="float-right m-r-10">
                                <div class="chart-info m-t-5">
                                    <i class="fas fa-user-tie m-r-5"></i>
                                    <span>2,568</span>
                                    <p>New Users</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>New</strong> Position</h2>
                        </div>
                        <div class="body">
                            <div class="body ">
                                <form  id="form_validation" method="POST" action="">
                                    @csrf
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label for="position_name" class="form-label font-20 text-danger">Position {{count($post)+1}}</label>
                                            <input type="text" class="form-control" name="position_name" required>
                                   --}}
{{--         <span class="helper-text text-danger" >
                                                Note: You decide which position should come first, Position will the First on the list and the rest will follow
                                            </span>--}}{{--

                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-block waves-effect" type="submit">
                                        Add Position
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
            </div>

@endsection--}}
