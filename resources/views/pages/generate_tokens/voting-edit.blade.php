@extends('layouts.app')
@section('content')

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Voting</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Voting</li>
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
                    <h4 class="card-title">Edit Voting</h4>
                    <form class="m-t-40 needs-validation floating-labels" method="post" action="{{route('voting.update',$voting->id)}}" novalidate>
                        @csrf
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control" name="voting_name"  value="{{$voting->name }}" id="voting_name" required>
                                    <span class="bar"></span>
                                    <label for="voting_name">Voting Name</label>
                                    <div class="invalid-feedback">
                                        Voting Name required
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group m-b-40">
                                    <input type="text" id="mdate" value="{{ $voting->voting_date }}" name="voting_date" class="form-control" required>
                                    <span class="bar"></span>
                                    <label for="mdate">Voting Date</label>
                                    <div class="invalid-feedback">
                                        Voting Date required
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control" id="timepicker"  value="{{ $voting->starting_time }}" name="starting_time" required>
                                    <span class="bar"></span>
                                    <label for="timepicker">Starting Time</label>
                                    <div class="invalid-feedback">
                                        Starting Time required
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group m-b-40">
                                    <input type="text" id="timepicker1" value="{{ $voting->ending_time }}" required name="ending_time" class="form-control">
                                    <span class="bar"></span>
                                    <label for="timepicker1">Ending Time</label>
                                    <div class="invalid-feedback">
                                        Ending Time required
                                    </div>
                                </div>
                            </div>
                        </div>
                        {!! method_field('PUT') !!}
                        <div class="text-xs-right m-t-5">
                            <button type="submit" class="btn btn-info btn-block">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
