@extends('layouts.app')
@section('content')

    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            <div class="d-flex m-t-10 justify-content-end">
                <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                    <div class="chart-text m-r-10">
                        @if(Auth::User()->role == "Voter")
                            <h3 class="m-b-0">
                                @if($votedOrNot[0]->participated == 1)
                                    <label class="badge badge-success">Voted</label>
                                    @else
                                    <label class="badge badge-warning">Did Not Vote</label>
                                @endif
                            </h3>
                            @endif
                        {{--<h4 class="m-t-0 text-primary">{{$voting->name}}</h4>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--<div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">{{$currentUser[0]->voting->name}}</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            <div class="d-flex m-t-10 justify-content-end">
                <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                    <div class="chart-text m-r-10">
                        <h6 class="m-b-0"><small>Voting Date</small></h6>
                        <h4 class="m-t-0 text-info">{{substr($voting->voting_date_start_time,0,10)}}</h4></div>

                </div>
                <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                    <div class="chart-text m-r-10">
                        <h6 class="m-b-0"><small>Start and End Time</small></h6>
                        <h4 class="m-t-0 text-primary">{{substr($voting->voting_date_start_time,10)." -".$voting->ending_time}}</h4></div>

                </div>
            </div>
        </div>
    </div>--}}
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    @if(Auth::User()->role == 'Admin' || Auth::User()->role == 'Super Admin')
        <div class="row">
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg align-self-center round-info">
                                <i class="ti-thumb-up"> </i></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0 font-light">{{$totalVotings}}</h3>
                                <h5 class="text-muted m-b-0">Total Election(s)</h5></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg align-self-center round-warning">
                                <i class="mdi mdi-bullseye"> </i>
                            </div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0 font-lgiht">{{$totalPositions}}</h3>
                                <h5 class="text-muted m-b-0">Total Positions</h5></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg align-self-center round-primary"><i class="mdi mdi-thumb-down"></i></div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0 font-lgiht">{{$non_participants}}</h3>
                                <h5 class="text-muted m-b-0">None Voters</h5></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg align-self-center round-danger">
                                <i class="mdi mdi-thumb-up"> </i>
                            </div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0 font-lgiht">{{$participants}}</h3>
                                <h5 class="text-muted m-b-0">Total Vote Casted</h5></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>

    @endif

    <!-- Row -->
    {{--<div class="row">
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-body">
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col p-r-0 align-self-center">
                        <h2 class="font-light m-b-0">{{$totalVoters}}</h2>
                        <h6 class="text-muted">Total Voters</h6></div>
                    <!-- Column -->
                    <div class="col text-right align-self-center">
                        <h2 class="font-light m-b-0">{{$totalVoteCasted}}</h2>
                        <h6 class="text-muted">Total Vote Casted</h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-body">
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col p-r-0 align-self-center">
                        <h2 class="font-light m-b-0">{{$totalNominees}}</h2>
                        <h6 class="text-muted">Total Nominees</h6></div>
                    <!-- Column -->
                    <div class="col text-right align-self-center">
                        <h2 class="font-light m-b-0">{{$totalCandidates}}</h2>
                        <h6 class="text-muted">Total Candidates</h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-body">
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col p-r-0 align-self-center">
                        <h2 class="font-light m-b-0">{{$totalCandidates}}</h2>
                        <h6 class="text-muted">Total Candidate</h6></div>
                    <!-- Column -->
                    <div class="col text-right ">
                        <div data-label="40%" class="css-bar m-b-0 css-bar-primary css-bar-40"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-body">
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col p-r-0 align-self-center">
                        <h2 class="font-light m-b-0">{{$totalVoteCasted}}</h2>
                        <h6 class="text-muted">Total Vote Casted</h6>
                    </div>
                    <!-- Column -->
                    <div class="col text-right align-self-center">
                        <div data-label="60%" class="css-bar m-b-0 css-bar-danger css-bar-60"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
    <!-- Row -->
    <!-- Row -->
    @if(Auth::User()->role == 'Admin' || Auth::User()->role == 'Super Admin')
        <div class="row">
            <!-- Column -->
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Voter's</h4>
                        <h6 class="card-subtitle">Total, Male and Female Voter's</h6>
                        <div class="amp-pxl mb-auto"></div>

                        <div class="text-center">
                            <ul class="list-inline">
                                <li>
                                    <h6 class="text-muted text-warning"><i class="fa fa-circle font-10 m-r-10 "></i>Total</h6> </li>
                                <li>
                                    <h6 class="text-muted  text-info"><i class="fa fa-circle font-10 m-r-10"></i>Females</h6> </li>

                                <li>
                                    <h6 class="text-muted  text-success"><i class="fa fa-circle font-10 m-r-10"></i>Males</h6> </li>

                                <li>
                                    <h6  style="color: saddlebrown;"><i class="fa fa-circle font-10 m-r-10"></i>Voted</h6> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-body">
                        {{--<h4 class="card-title">Newsletter Campaign</h4>--}}
                        <h6 class="card-subtitle">Total Voters, Vote Casted, Nominees and Candidates</h6>
                        {{--<div class="campaign2 ct-charts" style="height: 300px;"></div>--}}
                        <div class="amp"></div>
                        <div class="text-center">
                            <ul class="list-inline">
                                <li>
                                    <h6 class="text-muted text-red"><i class="fa fa-circle font-10 m-r-10 "></i>Voters</h6> </li>
                                <li>
                                    <h6 style="color: deeppink;"><i class="fa fa-circle font-10 m-r-10"></i>Nominees</h6> </li>
                                <li>
                                    <h6 class="text-muted text-warning"><i class="fa fa-circle font-10 m-r-10 "></i>Candidates</h6> </li>
                                <li>
                                    <h6  style="color: saddlebrown;"><i class="fa fa-circle font-10 m-r-10"></i>Voted Casted</h6> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    @else
        <div class="row">
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg align-self-center round-info">
                                <i class="ti-notepad"> </i></div>
                            <div class="m-l-10 align-self-center">
                                <h5 class="m-b-0 font-light">{{$voting->name}}</h5>
                                <h5 class="text-muted m-b-0">Election</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg align-self-center round-warning">
                                <i class="mdi mdi-account"> </i>
                            </div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0 font-lgiht">{{$allEligible}}</h3>
                                <h5 class="text-muted m-b-0">Total Voters</h5></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg align-self-center round-primary">
                                <i class="mdi mdi-thumb-up"> </i>
                            </div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0 font-lgiht">{{$participant}}</h3>
                                <h5 class="text-muted m-b-0">Total Vote Count</h5></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg align-self-center round-danger">
                                <i class="mdi mdi-thumb-down"> </i>
                            </div>
                            <div class="m-l-10 align-self-center">
                                <h3 class="m-b-0 font-lgiht">{{$allEligible - $participant}}</h3>
                                <h5 class="text-muted m-b-0">Non Voter(s)</h5></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <div class="row">

            @foreach ($positions as $position => $candidates)
                @php
                    $kojoCount = 0;
                @endphp

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="text-danger text-center">{{$candidates[0]->position->name}}</h2>
                            <hr>
                            @foreach ($candidates as $candidate)

                                <div class="row">
                                    <div class="col-md-3 text-center">
                                        <img height="90" width="90" src="http://localhost:800/api/image/{{$candidate->image}}" alt="user" class="img-circle">
                                    </div>

                                    <div class="col-md-6 text-center mt-4">
                                        <h5>{{strtoupper($candidate['first_name']." ".$candidate['other_name']." ".$candidate['last_name'])}}</h5>
                                    </div>

                                    <div class="col-md-3 text-center mt-2">
                                        @if(count($candidates)== 1)
                                            <button type="button" class="btn btn-success btn-circle ">
                                                Yes<br>
                                                {{$candidate->result[0]->vote_count}}
                                            </button>

                                            <button type="button" class="btn btn-danger btn-circle ">
                                                No<br>
                                                {{str_replace('-','',$participant-$candidate->result[0]->vote_count)}}

                                            </button>
                                        @else
                                            <button type="button" class="btn btn-success btn-circle ">
{{--                                                {!! max($candidate->result)!!}--}}
                                                {{$candidate->result[0]->vote_count}}
                                            </button>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    <!-- Row -->
@endsection

