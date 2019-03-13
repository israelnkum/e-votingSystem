@extends('layouts.app')
@section('content')

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Nominees</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">New Nominees</li>
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
                    <h4 class="card-title">All Nominees</h4>
                    <form class="m-t-40 needs-validation floating-labels" enctype="multipart/form-data" method="post" action="{{route('nominees.store')}}" novalidate>
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 m-b-30 form-group">
                                <select name="voting_id" value="{{ old('voting_id') }}" class="form-control select2 p-0" required>
                                    <option value="">Select Voting</option>
                                    @foreach($voting as $vote)
                                        <option value="{{$vote->id}}">{{$vote->name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Voting required!
                                </div>
                            </div>

                            <div class="col-md-6 m-b-30 form-group">
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

                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" id="firstName" required>
                                    <span class="bar"></span>
                                    <label for="firstName">First Name</label>
                                    <div class="invalid-feedback">
                                        First Name required
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group m-b-40">
                                    <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" id="lastName" required>
                                    <span class="bar"></span>
                                    <label for="lastName">Last Name</label>
                                    <div class="invalid-feedback">
                                        Last Name required
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control" name="other_name" value="{{ old('other_name') }}" id="otherName">
                                    <span class="bar"></span>
                                    <label for="otherName">Other Name</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control" id="mdate" value="{{ old('voting_date') }}" name="voting_date" required>
                                    <span class="bar"></span>
                                    <label for="mdate">Date of Birth</label>
                                    <div class="invalid-feedback">
                                        Date of Birth required
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control" id="homeTown" name="home_town" value="{{ old('home_town') }}" required>
                                    <span class="bar"></span>
                                    <label for="homeTown">Home Town</label>
                                    <div class="invalid-feedback">
                                        Home Town required
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <select name="region" value="{{ old('region') }}" class="select2 form-control"  required>
                                    <option value="">Select Region</option>
                                    <option value="Greater Accra">Greater Accra</option>
                                    <option value="Central">Central</option>
                                    <option value="Eastern">Eastern</option>
                                    <option value="Ashanti">Ashanti</option>
                                    <option value="Northern">Northern</option>
                                    <option value="Upper West">Upper West</option>
                                    <option value="Upper East">Upper East</option>
                                    <option value="Western">Western</option>
                                    <option value="Volta">Volta</option>
                                    <option value="Brong Ahafo">Brong Ahafo</option>
                                </select>
                                <div class="invalid-feedback">
                                    Region is required!
                                </div>
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control" value="{{ old('home_address') }}" name="home_address" id="homeAddress" required>
                                    <span class="bar"></span>
                                    <label for="homeAddress">Home Address</label>
                                    <div class="invalid-feedback">
                                        Home Address required
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control phone-inputmask" id="phone-mask"  value="{{ old('telephone') }}"  name="telephone" required>
                                    <span class="bar"></span>
                                    <label for="phone-mask">Telephone</label>
                                    <div class="invalid-feedback">
                                        Telephone required
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">

                                <div class="form-group m-b-40">
                                    <input type="email" class="form-control" id="emailAddress" value="{{ old('email_address') }}" name="email_address" required>
                                    <span class="bar"></span>
                                    <label for="emailAddress">Email address</label>
                                    <div class="invalid-feedback">
                                        Email address required
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <div class="form-group m-b-40">
                                    <select value="{{ old('levels') }}" name="levels" class="form-control select2 p-0" required>
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

                            <div class="col-md-4 mb-3">
                                <div class="form-group m-b-40">
                                    <input type="text" value="{{ old('index_number') }}"  name="index_number" class="form-control" id="indexNumber" required>
                                    <span class="bar"></span>
                                    <label for="indexNumber">Index Number</label>
                                    <div class="invalid-feedback">
                                        Index Number required
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group m-b-40">
                                    <input type="text" class="form-control cgpa" id="cgpa" value="{{ old('cgpa') }}"  name="cgpa" required>
                                    <span class="bar"></span>
                                    <label for="cgpa">CGPA</label>
                                    <div class="invalid-feedback">
                                        CGPA is required
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <div class="form-group m-b-40">
                                    <select class="form-control select2 p-0" value="{{ old('position') }}"  name="position" required>
                                        <option value="">Select Position</option>
                                        @foreach($positions as $position)
                                            <option value="{{$position->id}}">{{$position->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Position required!
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group m-b-40">
                                    <input type="text" value="{{ old('previous_position') }}" name="previous_position" class="form-control" id="previous">
                                    <span class="bar"></span>
                                    <label for="previous">Previous Position Held</label>
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="form-group m-b-40">
                                    <div class="fileinput fileinput-new input-group"  data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select Image</span> <span class="fileinput-exists">Change</span>
                                            <input type="file" name="image_file" id="selectFile" required> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                                    <div class="invalid-feedback">
                                        Excel file required
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-info">Add Nominee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

