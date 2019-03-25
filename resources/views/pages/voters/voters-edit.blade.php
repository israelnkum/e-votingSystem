@extends('layouts.app')
@section('content')

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Level</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">New Level</li>
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
        @foreach($users as $user)

        @endforeach
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Voter Info</h4>
                    <form class="m-t-10 needs-validation form-material" method="post" action="{{route('voters.update',$user->id)}}" novalidate>
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label>Department</label>
                                <select name="department_id"  class="form-control select2 p-0" required>
                                    <option value="{{$user->department->id}}" >{{$user->department->name}}</option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Department Required
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Voting</label>
                                <select name="voting_id" class="selectpicker" multiple data-style="form-control">
                                    <option value="{{$user->voting->id}}">{{$user->voting->name}}</option>
                                    @foreach($voting as $vote)
                                        <option value="{{$vote->id}}">{{$vote->name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Voting Required
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label>Index Number</label>
                                <input type="text" value="{{$user->name}}" name="index_number" class="form-control" required>
                                <div class="invalid-feedback">
                                    Index Number required
                                </div>
                            </div>
                        </div>
                        <p class="text-danger mt-2">Leave the password field blank if you don't want to change</p>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <input type="password" placeholder="Password" class="form-control" name="password">
                                <div class="invalid-feedback">
                                    Password is required
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <input type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation">
                                <div class="invalid-feedback">
                                    Password is Mismatch
                                </div>
                            </div>
                        </div>
                        {!! method_field('PUT') !!}
                        <div class="text-xs-right m-t-5">
                            <button type="submit" class="btn btn-info btn-block">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
