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
                        <a href="javascript:void(0)">Admins</a>
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
        <div class="col-xs-12 col-sm-12 col-md-8 offset-md-2 col-lg-8">
            <div class="card">
                <div class="header">
                    <h2>
                        <strong>New</strong> Admin</h2>
                </div>
                <div class="body">
                    <form class="needs-validation form-float" novalidate method="post" action="{{route('users.store')}}">
                        @csrf
                        <div class="form-group form-float row">
                            <div class="col-md-4">
                                <div class="form-line">
                                    <label >Voting</label>
                                    <select  class="col-10" name="voting_id">
                                        <option value="">Select voting</option>
                                        @foreach($voting as $vote)
                                            <option value="{{$vote->id}}">{{$vote->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Voting is required
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-line">
                                    <label >Department</label>
                                    <select  class="col-10" name="department_id">
                                        <option value="">Select Department</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Department is required
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-float  row">
                            <div class="col-md-6">
                                <div class="form-line">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$user->name}}" required>
                                    <div class="invalid-feedback">
                                        Name is required
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-6">
                                <div class="form-line">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{$user->email}}" required>
                                    <div class="invalid-feedback">
                                        Email is required
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- #END# Task Info -->
    </div>

@endsection