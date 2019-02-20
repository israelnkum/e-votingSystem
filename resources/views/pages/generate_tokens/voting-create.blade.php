@extends('layouts.app')
@section('content')

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Voting</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">New Voting</li>
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
                    <h4 class="card-title">Add New Voting</h4>
                    <form class="m-t-40 needs-validation form-material" method="post" action="{{route('voting.store')}}" novalidate>
                        @csrf
                        <div class="form-row">
                            <div class="col-md-4 mb-3 form-group">
                                <select name="department_id" class="select2 form-control"required>
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

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <input type="text" class="form-control" name="voting_name" id="validationCustom01" placeholder="Voting Name" required>
                                    <div class="invalid-feedback">
                                        Voting Name required
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="voting_date" class="form-control" placeholder="Voting Date" id="mdate" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                        </div>
                                        <div class="invalid-feedback">
                                            Voting Date required
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" id="timepicker" name="starting_time" class="form-control" placeholder="Starting Time" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="mdi mdi-clock"></i></span>
                                        </div>
                                        <div class="invalid-feedback">
                                            Starting Time required
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" id="timepicker1" name="ending_time" class="form-control" placeholder="Ending Time" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="mdi mdi-clock"></i></span>
                                        </div>
                                        <div class="invalid-feedback">
                                            Ending Time required
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-xs-right">
                            <button type="submit" class="btn btn-info">Add Voting</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection