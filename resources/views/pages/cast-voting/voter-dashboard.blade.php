@extends('layouts.app')
@section('content')

    <div class="block-header">
        <div class="row">
            <div class="col-xl-6 col-lg-5 col-md-4 col-sm-12">
                <ul class="breadcrumb breadcrumb-style">
                    <li class="breadcrumb-item 	bcrumb-1">
                        <i class="material-icons text-dark">home</i>
                        <a href="{{route('home')}}">
                            <span>Home</span>
                        </a>
                    </li>
                    <li  class="breadcrumb-item 	bcrumb-1">
                        <a href="javascript:void(0)">Voting</a>
                    </li>
                </ul>
            </div>
            <div class="col-xl-6 col-lg-7 col-md-8 col-sm-12 text-right">
                <div class="breadcrumb-chart m-l-50">
                    <div class="float-right">
                        <div class="icon m-b-10">
                            <div class="chart header-bar">
                                <canvas width="49" height="40"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="float-right m-r-10">
                        <div class="chart-info m-t-5">
                            <i class="fas fa-dollar-sign m-r-5"></i>
                            <span>$8,968</span>
                            <p>Total Income</p>
                        </div>
                    </div>
                </div>
                <div class="breadcrumb-chart m-l-50">
                    <div class="float-right">
                        <div class="icon m-b-10">
                            <div class="chart header-bar2">
                                <canvas width="49" height="40"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="float-right m-r-10">
                        <div class="chart-info m-t-5">
                            <i class="fas fa-user-tie m-r-5"></i>
                            <span>2,568</span>
                            <p>New Users</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 offset-md-2">
            <div class="card">
                <div class="header">
                    <h2>
                        <strong>New</strong> Voting</h2>
                </div>
                <div class="body">

                </div>
            </div>
        </div>
        <!-- #END# Task Info -->
    </div>

@endsection