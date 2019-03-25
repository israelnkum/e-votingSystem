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
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body text-dark">
                        {{--<div class="row">--}}
                            {{--<div class="col-md-2">--}}
                                {{--<img src="{{asset('osikani.jpg')}}" height="auto" width="150">--}}
                            {{--</div>--}}
                            {{--<div class="col-md-8">--}}
                                {{--<h1 class="text-dark"><span class="text-info">NAME: </span>ISRAEL APPIAH NKUM</h1>--}}
                                {{--<h4 class="text-dark"><span class="text-info">INDEX NUMBER: </span>{{$json['data']['INDEXNO']}}</h4>--}}
                                {{--<h4 class="text-dark"><span class="text-info">DEPARTMENT: </span>{{$json['data']['INDEXNO']}}</h4>--}}
                                {{--<h4 class="text-dark"><span class="text-info">PROGRAM: </span>{{$json['data']['PROGRAMMECODE']}}</h4>--}}
                                {{--<h4 class="text-dark"><span class="text-info">LEVEL: </span>{{$json['data']['LEVEL']}}</h4>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="row">
                            <div class="col-md-2">
                                @if(substr($json['data']['LEVEL'],0,3) == '100')
                                <img src="http://www.ttuportal.com/admissions/public/albums/thumbnails/{{$json['data']['STNO']}}.jpg" height="auto" width="150">
                                    @else
                                    <img src="https://www.ttuportal.com/srms/public/albums/students/{{Auth::user()->username}}.jpg" height="auto" width="150">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <h1 class="text-dark"><span class="text-info">NAME: </span>{{$json['data']['NAME']}}</h1>
                                <h4 class="text-dark"><span class="text-info">INDEX NUMBER: </span>{{$json['data']['INDEXNO']}}</h4>
                                <h4 class="text-dark"><span class="text-info">DEPARTMENT: </span>{{$json['data']['INDEXNO']}}</h4>
                                <h4 class="text-dark"><span class="text-info">PROGRAM: </span>{{$json['data']['PROGRAMMECODE']}}</h4>
                                <h4 class="text-dark"><span class="text-info">LEVEL: </span>{{$json['data']['LEVEL']}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            {{--<h4 class="card-title">Select Voting</h4>--}}
            @foreach( $singleArray as $singleArr)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-dark">
                            @if(Auth::User()->role =="Admin" || Auth::User()->role =="Super Admin")
                                <h3 class="card-title text-center">{{$singleArr->name}}</h3>

                                <h5>Date: {{substr($singleArr->voting_date_start_time,0,10)}}</h5>
                                <h5>Starting Time: {{substr($singleArr->voting_date_start_time,10)}}</h5>
                                <h5>Ending Time: {{$singleArr->ending_time}}</h5>

                                <div class="text-right">
                                    @if(strtotime(\Carbon\Carbon::yesterday()) >= strtotime(substr($singleArr->voting_date_start_time,0,10)))
                                        <a class="btn btn-sm btn-success" href="{{route('cast-voting.show',$singleArr->id)}}">
                                            View result
                                        </a>
                                    @elseif(strtotime(\Carbon\Carbon::now()->format('Y-m-d h:i A')) >= strtotime($singleArr->voting_date_start_time) && strtotime(\Carbon\Carbon::now()->format('h:i A')) < strtotime($singleArr->ending_time))
                                        @if($singleArr->participated == 1)
                                            <a class="badge badge-warning font-18" href="javascript:void(0)">
                                                Vote Casted
                                            </a>
                                        @else
                                            <a class="btn btn-sm btn-outline-success" href="javascript:void(0)">
                                                Voting is Ongoing
                                            </a>
                                        @endif
                                    @elseif(strtotime(\Carbon\Carbon::tomorrow()->format('Y-m-d h:i A')) == strtotime(substr($singleArr->voting_date_start_time,0,10)))
                                        <label class="badge badge-info p-2">Start's Tomorrow</label>
                                    @elseif(strtotime(substr($singleArr->voting_date_start_time,0,10)) > strtotime(\Carbon\Carbon::tomorrow()->format('Y-m-d h:i A')))
                                        @php
                                            $datetime1 = new DateTime(\Carbon\Carbon::today()->format('Y-m-d'));
                                            $datetime2 = new DateTime(substr($singleArr->voting_date_start_time,0,10));
                                            $interval = $datetime1->diff($datetime2);

                                        echo '<label class="badge badge-info p-2">';
                                            echo "Start's in ". $interval->format('%r%a days');
                                        echo '</label>';
                                        @endphp
                                    @elseif(strtotime(\Carbon\Carbon::now()) >= strtotime($singleArr->voting_date_start_time) && strtotime(\Carbon\Carbon::now()->format('h:i A')) >= strtotime($singleArr->ending_time))
                                        <a class="btn btn-sm btn-success" href="{{route('cast-voting.show',$singleArr->id)}}">
                                            View result
                                        </a>
                                    @endif
                                </div>
                                @else
                                <h3 class="card-title text-center">{{$singleArr->voting->name}}</h3>

                                <h5>Date: {{substr($singleArr->voting->voting_date_start_time,0,10)}}</h5>
                                <h5>Starting Time: {{substr($singleArr->voting->voting_date_start_time,10)}}</h5>
                                <h5>Ending Time: {{$singleArr->voting->ending_time}}</h5>

                                <div class="text-right">
                                    @if(strtotime(\Carbon\Carbon::yesterday()) >= strtotime(substr($singleArr->voting->voting_date_start_time,0,10)))
                                        <a class="btn btn-sm btn-success" href="{{route('cast-voting.show',$singleArr->voting->id)}}">
                                            View result
                                        </a>
                                    @elseif(strtotime(\Carbon\Carbon::now()->format('Y-m-d h:i A')) >= strtotime($singleArr->voting->voting_date_start_time) && strtotime(\Carbon\Carbon::now()->format('h:i A')) < strtotime($singleArr->voting->ending_time))
                                        @if($singleArr->participated == 1)
                                            <a class="badge badge-warning font-18" href="javascript:void(0)">
                                                Vote Casted
                                            </a>
                                        @else
                                            <a class="btn btn-sm btn-outline-success" href="{{route('select-candidates',$singleArr->voting->id)}}">
                                                Click to vote
                                            </a>
                                        @endif
                                    @elseif(strtotime(\Carbon\Carbon::tomorrow()->format('Y-m-d h:i A')) == strtotime(substr($singleArr->voting->voting_date_start_time,0,10)))
                                        <label class="badge badge-info p-2">Start's Tomorrow</label>
                                    @elseif(strtotime(substr($singleArr->voting->voting_date_start_time,0,10)) > strtotime(\Carbon\Carbon::tomorrow()->format('Y-m-d h:i A')))
                                        @php
                                            $datetime1 = new DateTime(\Carbon\Carbon::today()->format('Y-m-d'));
                                            $datetime2 = new DateTime(substr($singleArr->voting->voting_date_start_time,0,10));
                                            $interval = $datetime1->diff($datetime2);

                                        echo '<label class="badge badge-info p-2">';
                                            echo "Start's in ". $interval->format('%r%a days');
                                        echo '</label>';
                                        @endphp
                                    @elseif(strtotime(\Carbon\Carbon::now()) >= strtotime($singleArr->voting->voting_date_start_time) && strtotime(\Carbon\Carbon::now()->format('h:i A')) >= strtotime($singleArr->voting->ending_time))
                                        <a class="btn btn-sm btn-success" href="{{route('cast-voting.show',$singleArr->voting->id)}}">
                                            View result
                                        </a>
                                    @endif
                                </div>
                                @endif

                            {{--<div class="table-responsive m-t-40">
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
                            </div>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


