@extends('layouts.app')
@section('content')

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Admin</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">New Admin</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            <div class="d-flex m-t-10 justify-content-end">
                <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                    <div class="chart-text m-r-10">
                        <h6 class="m-b-0"><small>THIS MONTH</small></h6>
                        <h4 class="m-t-0 text-info">$58,356</h4></div>
                    <div class="spark-chart">
                        <div id="monthchart"></div>
                    </div>
                </div>
                <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                    <div class="chart-text m-r-10">
                        <h6 class="m-b-0"><small>LAST MONTH</small></h6>
                        <h4 class="m-t-0 text-primary">$48,356</h4></div>
                    <div class="spark-chart">
                        <div id="lastmonthchart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New Admin</h4>
                    <form class="m-t-10 needs-validation form-material" method="post" action="{{route('users.store')}}" novalidate>
                        @csrf
                        <div class="form-group form-float row">
                            <div class="col-md-6">
                                <select name="voting_id" class="select2 form-control" required>
                                    <option value="">Select Voting</option>
                                    @foreach($voting as $vote)
                                        <option value="{{$vote->id}}">{{$vote->name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Voting required!
                                </div>
                            </div>
                            <div class="col-md-6">
                                <select name="department_id" class="select2 form-control" required>
                                    <option value="">Select Department</option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Department required!
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-float  row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                <div class="invalid-feedback">
                                    Name required
                                </div>
                            </div>

                            <div class="col-md-6 mb-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                <div class="invalid-feedback">
                                    Email is required
                                </div>
                            </div>
                        </div>
                        <div class="text-xs-right m-t-5">
                            <button type="submit" class="btn btn-info btn-block">Add Admin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
