@extends('layouts.app')
@section('content')

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Admin</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">New Admin</li>
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
                    <h4 class="card-title">Add New Admin</h4>
                    <form class="m-t-10 needs-validation form-material" method="post" action="{{route('users.store')}}" novalidate>
                        @csrf
                        <div class="form-group form-float row">
                            <div class="col-md-4">
                                <select name="voting_id" class="select2 form-control" required>
                                    <option value="">Select Voting</option>
                                    @foreach($voting as $vote)
                                        <option value="{{$vote->id}}">{{$vote->name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Voting required!
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select name="department_id" class="select2 form-control" required>
                                    <option value="">Select Department</option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Department required!
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select name="role" class="select2 form-control" required>
                                    <option value="">Select Role</option>
                                    <option value="Super Admin">Super Admin</option>
                                    <option value="Admin">Admin</option>
                                </select>
                                <div class="invalid-feedback">
                                    Role is required!
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-float  row">
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required>
                                <div class="invalid-feedback">
                                    Name required
                                </div>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required>
                                <div class="invalid-feedback">
                                    Username required
                                </div>
                            </div>

                            <div class="col-md-4 mb-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>
                                <div class="invalid-feedback">
                                    Email is required
                                </div>
                            </div>
                        </div>
                        <div class="text-xs-right m-t-5 text-right">
                            <button type="submit" class="btn btn-outline-info btn-sm ">Add Admin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
