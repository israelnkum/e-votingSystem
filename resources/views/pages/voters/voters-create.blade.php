@extends('layouts.app')
@section('content')

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Voter</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">New Voter</li>
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New Voter</h4>
                    <form class="m-t-40 needs-validation form-material" method="post" action="{{route('voters.store')}}" novalidate>
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
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

                            <div class="col-md-12 mb-3 form-group">
                                @if(Auth::User()->role == "Super Admin")
                                    <select name="department_id" class="select2 form-control" required>
                                        <option value="">Select Department</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Department required!
                                    </div>
                                @else
                                    <input type="hidden" class="form-control" value="{{ Auth::User()->department_id}}" name="department_id" id="validationCustom01" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Index Number required
                                    </div>
                                @endif
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <select name="level_id" class="select2 form-control" required>
                                        <option value="">Select Level</option>
                                        @foreach($levels as $level)
                                            <option value="{{$level->id}}">{{$level->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Level required!
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <select name="gender" class="select2 form-control" required>
                                        <option value="">Select Gender</option>
                                        <option value="MALE">Male</option>
                                        <option value="FEMALE">Female</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Gender required!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <input type="text" class="form-control" name="index_number" id="validationCustom01" placeholder="Index Number" required>
                                    <div class="invalid-feedback">
                                        Index Number required
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <input type="password" placeholder="Password" class="form-control" name="password" required>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <input type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation"  required>
                                    <div class="invalid-feedback">
                                        Password is Mismatch
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-xs-right text-right">
                            <button type="submit" class="btn btn-outline-info">Add Voter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Upload Voters</h4>
                    <form class="m-t-40 needs-validation form-material" enctype="multipart/form-data" method="post" action="{{route('upload-voters')}}" novalidate>
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
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

                            <div class="col-md-12 mb-3 form-group">
                                @if(Auth::User()->role == "Super Admin")
                                    <select name="department_id" class="select2 form-control" required>
                                        <option value="">Select Department</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Department required!
                                    </div>

                                @else
                                    <input type="hidden" class="form-control" value="{{ Auth::User()->department_id}}" name="department_id" id="validationCustom01" placeholder="" required>
                                    <div class="invalid-feedback">
                                        Index Number required
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-12 mb-3">
                                <select name="level_id" class="select2 form-control" required>
                                    <option value="">Select Level</option>
                                    @foreach($levels as $level)
                                        <option value="{{$level->id}}">{{$level->name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Level required!
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Select File</label>
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                            <input type="file" name="file" required> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                                    <div class="invalid-feedback">
                                        Excel file required
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-xs-right text-right">
                            <button type="submit" class="btn btn-outline-info">Upload Voter(s)</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
