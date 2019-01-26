@extends('layouts.app')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Cast Voting</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
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
                    <!-- ============================================================== -->
                    <!-- End Bread crumb and right sidebar toggle -->
                    <!-- ============================================================== -->
                </div>
            </div>
        </div>
    </div>
    <div class="row">

    @foreach ($positions as $position => $candidates)
        @php
            $kojoCount = 0;
        @endphp
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-danger">{{$candidates[0]->position->name}}</h3>
                        @foreach ($candidates as $candidate)
                            <table class="nowrap table" cellspacing="0" width="100%">
                                <tbody>
                                <tr>
                                    <td  class="text-left">
                                        <img src="{{asset('nominee_img/'.$candidate->image)}}" class="img-circle" width="100" height="100" />
                                    </td>
                                    <td>{{$candidate['last_name']." ".$candidate['other_name']." ".$candidate['first_name']}}</td>
                                    <td class="text-center font-20">
                                        <label class="badge badge-success">
                                            {{$candidate->result[0]->vote_count}}
                                        </label>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        @endforeach
                    </div>
                </div>
            </div>
    @endforeach
    </div>
@endsection