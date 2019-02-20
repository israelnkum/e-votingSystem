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
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-body text-dark">
                    <h4 class="card-title">Select Voting</h4>
                    <div class="table-responsive m-t-40">
                        <table class="nowrap table  table-striped " cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Voting</th>
                                <th>Voting Starts at</th>
                                <th>Voting Ends at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $singleArray as $singleArr)
                                <tr>
                                    <td>{{$singleArr->name}}</td>
                                    <td>{{substr($singleArr->voting_date_start_time,10)}}</td>
                                    <td>{{$singleArr->ending_time}}</td>

                                    <td>
                                        @if(strtotime(\Carbon\Carbon::yesterday()) > strtotime(substr($singleArr->voting_date_start_time,0,10)))
                                            <a class="badge badge-success" href="{{route('select-candidates',$singleArr->id)}}">See result</a>
                                        @elseif(strtotime(\Carbon\Carbon::now()->format('Y-m-d h:i A')) >= strtotime($singleArr->voting_date_start_time) && strtotime(\Carbon\Carbon::now()->format('h:i A')) < strtotime($singleArr->ending_time))
                                            <a class="badge badge-success" href="{{route('select-candidates',$singleArr->id)}}">Click to vote</a>
                                            @elseif(strtotime(\Carbon\Carbon::now()) >= strtotime($singleArr->voting_date_start_time) && strtotime(\Carbon\Carbon::now()->format('h:i A')) >= strtotime($singleArr->ending_time))
                                                <a class="badge badge-success" href="{{route('select-candidates',$singleArr->id)}}">See result</a>
                                            {{--@elseif(strtotime(\Carbon\Carbon::now()->format('Y-m-d h:i A')) >= strtotime($singleArr->voting_date_start_time) && strtotime(\Carbon\Carbon::now()->format('h:i A')) >= strtotime($singleArr->ending_time))
                                                <label class="badge badge-danger">Ended</label>
                                            @elseif(strtotime(\Carbon\Carbon::now()->format('Y-m-d h:i A')) >= strtotime($singleArr->voting_date_start_time) && strtotime(\Carbon\Carbon::now()->format('h:i A')) < strtotime($singleArr->ending_time))
                                                <a class="badge badge-success" href="{{route('select-candidates',$singleArr->id)}}">Click to vote</a>--}}
                                        @endif
                                    </td>

                                    {{-- @if(substr($singleArr->voting_date_start_time,0,10) <= \Carbon\Carbon::yesterday()->format('Y-m-d'))
                                         <label class="badge badge-danger">Ended</label>
                                     @elseif(substr($singleArr->voting_date_start_time,0,10) == \Carbon\Carbon::tomorrow()->format('Y-m-d'))
                                         <label class="badge badge-warning">Start Tomorrow</label>
                                     @elseif(strtotime(\Carbon\Carbon::now()->format('Y-m-d h:i A')) >= strtotime($singleArr->voting_date_start_time) && strtotime(\Carbon\Carbon::now()->format('h:i A')) < strtotime($singleArr->ending_time))
                                         <td>{{$singleArr->name}}</td>
                                         <td>{{substr($singleArr->voting_date_start_time,10)}}</td>
                                         <td>{{$singleArr->ending_time}}</td>
                                         <td><a class="badge badge-success" href="{{route('select-candidates',$singleArr->id)}}">Click to vote</a></td>
                                     @elseif(strtotime(\Carbon\Carbon::now()->format('Y-m-d h:i A')) >= strtotime($singleArr->voting_date_start_time) && strtotime(\Carbon\Carbon::now()->format('h:i A')) >= strtotime($singleArr->ending_time))
                                         <label class="badge badge-danger">Ended</label>
                                     @endif--}}
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


