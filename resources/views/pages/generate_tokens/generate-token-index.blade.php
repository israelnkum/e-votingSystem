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
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-dark">
                    <h4 class="card-title">All Tokens</h4>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="nowrap table  table-striped " cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Token No.</th>
                                <th>Index No.</th>
                                <th>Department</th>
                                <th>Voting</th>
                                <th>Manage</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allTokens as $token)
                                <tr>
                                    <td>{{$token->token_number}}</td>
                                    <td>{{$token->name}}</td>
                                    <td>{{$token->department->name}}</td>
                                    <td>{{$token->voting->name}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="manage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="manage">
                                                <a href="{{route('nominee_token.edit',$token->id)}}" class="dropdown-item ml-1 text-dark">
                                                    <i class="mdi mdi-account-edit"> </i> Edit
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <form method="post" action="{{route('nominee_token.destroy',$token->id)}}" onsubmit="return confirm('Do you really want to delete this Voting')">
                                                        @csrf
                                                        {!! method_field('DELETE') !!}
                                                        <button type="submit" style="background: transparent; border: 0;">
                                                            <i class="mdi mdi-delete"> </i> Delete
                                                        </button>
                                                    </form>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">New Token</h4>
                    <form class="m-t-40 needs-validation form-material" method="post" action="{{route('nominee_token.store')}}" novalidate>
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3 form-group">
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
                                    <input type="text" class="form-control" name="index_number" id="validationCustom01" placeholder="Index Number" required>
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
                            <button type="submit" class="btn btn-info btn-block">New Token</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


