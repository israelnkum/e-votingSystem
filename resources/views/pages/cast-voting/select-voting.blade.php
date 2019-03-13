@extends('layouts.app')
@section('content')

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Voting</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Select Voting</li>
            </ol>
        </div>
        {{--<div class="col-md-7 col-4 align-self-center">
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
        </div>--}}
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-body text-dark">
                    <h4 class="card-title">Select Voting</h4>
                    <div class="table-responsive m-t-40">
                        <table class="nowrap table  table-striped " cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Voting</th>
                                <th>Voting Date</th>
                                <th>Voting Starts at</th>
                                <th>Voting Ends at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $singleArray as $singleArr)
                                <tr>
                                    <td>{{$singleArr->name}}</td>
                                    <td>{{substr($singleArr->voting_date_start_time,0,10)}}</td>
                                    <td>{{substr($singleArr->voting_date_start_time,10)}}</td>
                                    <td>{{$singleArr->ending_time}}</td>

                                    <td>
                                        @if(strtotime(\Carbon\Carbon::yesterday()) >= strtotime(substr($singleArr->voting_date_start_time,0,10)))
                                            <a class="badge badge-success" href="{{route('cast-voting.show',$singleArr->id)}}">
                                                View result
                                            </a>
                                        @elseif(strtotime(\Carbon\Carbon::now()->format('Y-m-d h:i A')) >= strtotime($singleArr->voting_date_start_time) && strtotime(\Carbon\Carbon::now()->format('h:i A')) < strtotime($singleArr->ending_time))
                                            @if(Auth::User()->voted == 1)
                                                <a class="badge badge-warning font-18" href="javascript:void(0)">
                                                    Vote Casted
                                                </a>
                                                @else
                                                <a class="badge badge-success font-18" href="{{route('select-candidates',$singleArr->id)}}">
                                                    Click to vote
                                                </a>
                                            @endif
                                        @elseif(strtotime(\Carbon\Carbon::tomorrow()->format('Y-m-d h:i A')) == strtotime(substr($singleArr->voting_date_start_time,0,10)))
                                            <label class="badge badge-success">Start's Tomorrow</label>
                                        @elseif(strtotime(substr($singleArr->voting_date_start_time,0,10)) > strtotime(\Carbon\Carbon::tomorrow()->format('Y-m-d h:i A')))
                                            @php
                                                $datetime1 = new DateTime(\Carbon\Carbon::today()->format('Y-m-d'));
                                                $datetime2 = new DateTime(substr($singleArr->voting_date_start_time,0,10));
                                                $interval = $datetime1->diff($datetime2);

                                            echo '<label class="badge badge-info">';
                                                echo "Start's in ". $interval->format('%r%a days');
                                            echo '</label>';
                                            @endphp
                                        @elseif(strtotime(\Carbon\Carbon::now()) >= strtotime($singleArr->voting_date_start_time) && strtotime(\Carbon\Carbon::now()->format('h:i A')) >= strtotime($singleArr->ending_time))
                                            <a class="badge badge-success" href="{{route('cast-voting.show',$singleArr->id)}}">
                                               View result
                                            </a>
                                        @endif
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


