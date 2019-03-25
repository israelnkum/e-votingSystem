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
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New Level</h4>
                    <form class="m-t-10 needs-validation form-material" method="post" action="{{route('levels.store')}}" novalidate>
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <input type="text" name="level_name" class="form-control" placeholder="Level Name" required>
                                <div class="invalid-feedback">
                                    Name required
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
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
                                @endif
                            </div>
                        </div>
                        <div class="text-xs-right text-right m-t-5">
                            <button type="submit" class="btn btn-success">Add Level</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-dark">
                    <h4 class="card-title">All Levels</h4>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="nowrap table  table-striped " cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Added By</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Manage</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($levels as $level)
                                <tr>
                                    <td>{{$level->name}}</td>
                                    <td>{{$level->added_by}}</td>
                                    <td>{{substr($level->created_at,0,10)}}</td>
                                    <td>{{substr($level->created_at,10)}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="manage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="manage">
                                                <a href="{{route('levels.edit',$level->id)}}" class="dropdown-item ml-1 text-dark">
                                                    <i class="mdi mdi-account-edit"></i> Edit
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <form method="post" action="{{route('levels.destroy',$level->id)}}" onsubmit="return confirm('Do you really want to delete this Level')">
                                                        @csrf
                                                        {!! method_field('DELETE') !!}
                                                        <button type="submit" style="background: transparent; border: 0;">
                                                            <i class="mdi mdi-delete"></i> Delete
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
    </div>

@endsection
