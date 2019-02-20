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
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->

    @foreach($ctokens as $token)
        @endforeach
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">New Token</h4>
                    <form class="m-t-40 needs-validation form-material" method="post" action="{{route('nominee_token.update',$token->id)}}" novalidate>
                        @csrf
                        {!! method_field('PUT') !!}
                        <div class="form-row">
                            <div class="col-md-12 mb-3 form-group">
                                <select name="voting_id" class="select2 form-control" required>
                                    <option value="{{$token->voting->id}}">{{$token->voting->name}}</option>
                                    @foreach($voting as $vote)
                                        <option value="{{$vote->id}}">{{$vote->name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Voting required!
                                </div>
                            </div>

                            <div class="col-md-12 mb-3 form-group">
                                <select name="department_id" class="select2 form-control"required>
                                    {{--<option value="{{$token->department->id}}">{{$token->department->name}}</option>--}}
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Department required!
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <input type="text" class="form-control" name="index_number" value="{{$token->name}}" id="validationCustom01" placeholder="Index Number" required>
                                    <div class="invalid-feedback">
                                        Index Number required
                                    </div>
                                </div>
                            </div>
                            {{--<div class="form-row">
                                <div class="col-md-8">
                                    <input class="form-control" required placeholder="Token" type="text" name="random_token" id="random_token">
                                    <div class="invalid-feedback">
                                        Token required
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <button class="btn btn-info" type="button" id="generate_token">
                                        <i class="mdi mdi-key"> </i>
                                    </button>
                                    <script type="text/javascript">
                                        function random_password_generate(max,min)
                                        {
                                            var passwordChars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                                            var randPwLen = Math.floor(Math.random()) + min;
                                            return Array(randPwLen).fill(passwordChars).map(function (x) {
                                                return x[Math.floor(Math.random() * x.length)]
                                            }).join('');
                                        }
                                        document.getElementById("generate_token").addEventListener("click", function(){
                                            random_password = random_password_generate(16,8);
                                            document.getElementById("random_token").value = random_password;
                                        });
                                    </script>
                                </div>
                            </div>--}}
                        </div>
                        <div class="text-xs-right">
                            <button type="submit" class="btn btn-info btn-block">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


