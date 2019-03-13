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
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-dark">
                    <h4 class="card-title">All Voting</h4>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="nowrap table  table-striped " cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Date</th>
                                <th>Starting Time</th>
                                <th>Ending Time</th>
                                <th>Details</th>
                                <th>Status</th>
                                <th>Result</th>
                                <th>Manage</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($voting as $vote)
                                <tr>
                                    <td>{{$vote->name}}</td>
                                    <td>{{$vote->department->name}}</td>
                                    <td>{{substr($vote->voting_date_start_time,0,10)}}</td>
                                    <td>{{substr($vote->voting_date_start_time,10)}}</td>
                                    <td>{{$vote->ending_time}}</td>
                                    <td>Detail</td>
                                    <td>
                                        @if(strtotime(\Carbon\Carbon::yesterday()) >= strtotime(substr($vote->voting_date_start_time,0,10)))
                                            <label class="badge badge-danger">
                                                Ended
                                            </label>
                                        @elseif(strtotime(\Carbon\Carbon::now()->format('Y-m-d h:i A')) >= strtotime($vote->voting_date_start_time) && strtotime(\Carbon\Carbon::now()->format('h:i A')) < strtotime($vote->ending_time))
                                            <label class="badge badge-success">On Going</label>
                                        @elseif(strtotime(\Carbon\Carbon::tomorrow()->format('Y-m-d h:i A')) == strtotime(substr($vote->voting_date_start_time,0,10)))
                                            <label class="badge badge-success">Start's Tomorrow</label>

                                        @elseif(strtotime(substr($vote->voting_date_start_time,0,10)) > strtotime(\Carbon\Carbon::tomorrow()->format('Y-m-d h:i A')))
                                            @php
                                                $datetime1 = new DateTime(\Carbon\Carbon::today()->format('Y-m-d'));
                                                $datetime2 = new DateTime(substr($vote->voting_date_start_time,0,10));
                                                $interval = $datetime1->diff($datetime2);

                                            echo '<label class="badge badge-success">';
                                                echo "Start's in ". $interval->format('%r%a days');
                                            echo '</label>';
                                            @endphp
                                        @elseif(strtotime(\Carbon\Carbon::now()) >= strtotime($vote->voting_date_start_time) && strtotime(\Carbon\Carbon::now()->format('h:i A')) >= strtotime($vote->ending_time))
                                            <label class="badge badge-danger">
                                                Ended

                                            </label>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="" href="#">Result</a>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="manage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="manage">
                                                <a href="{{route('voting.edit',$vote->id)}}" class="dropdown-item ml-1 text-dark">
                                                    <i class="mdi mdi-account-edit"> </i> Edit
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <form method="post" action="{{route('voting.destroy',$vote->id)}}" onsubmit="return confirm('Do you really want to delete this Voting')">
                                                        @csrf
                                                        {!! method_field('DELETE') !!}
                                                        <button type="submit" style="background: transparent; border: 0;">
                                                            <i class="mdi mdi-delete"> </i> Delete
                                                        </button>
                                                    </form>
                                                </a>

                                                <a class="dropdown-item" href="#">
                                                    <form method="post" action="{{route('startOrEndVoting',$vote->id)}}" onsubmit="return confirm('Are you sure you want to continue?')">
                                                        @csrf

                                                            @if(strtotime(\Carbon\Carbon::yesterday()) >= strtotime(substr($vote->voting_date_start_time,0,10)))
                                                            <button type="submit" name="voting_status" value="0" style="background: transparent; border: 0;">
                                                                <i class="mdi mdi-power-plug"> </i> Start Voting
                                                            </button>
                                                            @elseif(strtotime(\Carbon\Carbon::now()->format('Y-m-d h:i A')) >= strtotime($vote->voting_date_start_time) && strtotime(\Carbon\Carbon::now()->format('h:i A')) < strtotime($vote->ending_time))
                                                            <button type="submit" name="voting_status" value="1" style="background: transparent; border: 0;">
                                                                <i class="mdi mdi-power-plug"> </i> End Voting
                                                            </button>
                                                            @elseif(strtotime(\Carbon\Carbon::tomorrow()->format('Y-m-d h:i A')) == strtotime(substr($vote->voting_date_start_time,0,10)))
                                                            <button type="submit" name="voting_status" value="0" style="background: transparent; border: 0;">
                                                                <i class="mdi mdi-power-plug"> </i> Start Voting
                                                            </button>
                                                            @elseif(strtotime(substr($vote->voting_date_start_time,0,10)) > strtotime(\Carbon\Carbon::tomorrow()->format('Y-m-d h:i A')))
                                                            <button type="submit" name="voting_status" value="0" style="background: transparent; border: 0;">
                                                                <i class="mdi mdi-power-plug"> </i> Start Voting
                                                            </button>
                                                            @elseif(strtotime(\Carbon\Carbon::now()) >= strtotime($vote->voting_date_start_time) && strtotime(\Carbon\Carbon::now()->format('h:i A')) >= strtotime($vote->ending_time))
                                                            <button type="submit" name="voting_status" value="0" style="background: transparent; border: 0;">
                                                                <i class="mdi mdi-power-plug"> </i> Start Voting
                                                            </button>
                                                            @endif

                                                    </form>
                                                </a>

                                            </div>
                                        </div>

                                        {{--<div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item btn btn-info ml-3 mr-3 text-white btn-sm" href="{{route('voting.edit',$vote->id)}}">Edit</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">
                                                    <form method="post" action="{{route('voting.destroy',$vote->id)}}" onsubmit="return confirm('Do you really want to delete this Voting')">
                                                        @csrf
                                                        {!! method_field('DELETE') !!}
                                                        <button type="submit" class="btn btn-sm btn-danger btn-block">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </a>
                                            </div>
                                        </div>--}}
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


