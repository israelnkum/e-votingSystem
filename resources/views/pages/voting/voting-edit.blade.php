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
                                    <span class="bar"> </span>
                                    <label for="voting_name">Voting Name</label>
                                    <div class="invalid-feedback">
                                        Voting Name required
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group m-b-40">
                                    <input type="text" id="mdate" value="{{ substr($voting->voting_date_start_time,0,10) }}" name="voting_date" class="form-control" required>
                                    <span class="bar"> </span>
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
                                    <input type="text" class="form-control" id="timepicker"  value="{{ substr($voting->voting_date_start_time,10) }}" name="starting_time" required>
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
                        <div class="text-xs-right m-t-5 text-right">
                            <button type="submit" class="btn btn-outline-info">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
