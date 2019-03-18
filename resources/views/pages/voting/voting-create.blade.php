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
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New Voting</h4>
                    <form class="m-t-40 needs-validation form-material" method="post" action="{{route('voting.store')}}" novalidate>
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3 form-group">
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
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" name="voting_name" id="validationCustom01" placeholder="Voting Name" required>
                                    <div class="invalid-feedback">
                                        Voting Name required
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="voting_date" class="form-control" placeholder="Voting Date" id="mdate" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                        </div>
                                        <div class="invalid-feedback">
                                            Voting Date required
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" id="timepicker" name="starting_time" class="form-control" placeholder="Starting Time" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="mdi mdi-clock"></i></span>
                                        </div>
                                        <div class="invalid-feedback">
                                            Starting Time required
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" id="timepicker1" name="ending_time" class="form-control" placeholder="Ending Time" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="mdi mdi-clock"></i></span>
                                        </div>
                                        <div class="invalid-feedback">
                                            Ending Time required
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-xs-right text-right">
                            <button type="submit" class="btn btn-outline-info">Add Voting</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection