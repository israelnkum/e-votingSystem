@extends('layouts.app')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Results</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">{{$voting->name}}</li>
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
    </div>
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
                        @foreach ($candidates as $candidate)
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <img height="90" width="90" src="http://localhost:800/api/image/{{$candidate->image}}" alt="user" class="img-circle">
                                </div>

                                <div class="col-md-6 text-center mt-4">
                                    <h5>{{$candidate['first_name']." ".$candidate['other_name']." ".$candidate['last_name']}}</h5>
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
                                            {{$candidate->result[0]->vote_count}}
                                        </button>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            {{--<div class="message-box contact-box text-center">
                                <div class="message-widget contact-widget">
                                    <!-- Message -->
                                    <a href="javascript:void(0)">
                                        <div class="user-img">
                                            --}}{{--<img src="http://localhost:803/api/image/{{$candidate->image}}" alt="user" class="img-circle">--}}{{--
                                            <img src="{{asset('nominee_img/'.$candidate->image)}}" alt="user" class="img-circle">
                                        </div>
                                        <div class="mail-contnet">
                                            <h5>{{$candidate['last_name']." ".$candidate['other_name']." ".$candidate['first_name']}}</h5>
                                            --}}{{--<span class="mail-desc">info@wrappixel.com</span>--}}{{--
                                        </div>


                                        @if(count($candidates)== 1)
                                            <button type="button" class="btn btn-success btn-circle ">
                                                {{$totalVoters- $candidate->result[0]->vote_count}}
                                            </button>

                                            <button type="button" class="btn btn-success btn-circle ">
                                                {{$candidate->result[0]->vote_count}}
                                            </button>

                                        @else

                                            {{$candidate->result[0]->vote_count}}
                                        @endif
                                    </a>
                                </div>
                            </div>--}}
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection