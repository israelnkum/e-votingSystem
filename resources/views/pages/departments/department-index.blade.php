@extends('layouts.app')
@section('content')

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Department</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">New Department</li>
            </ol>
        </div>
        {{--<div class="col-md-7 col-4 align-self-center">
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
        </div>--}}
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
                    <h4 class="card-title">Add New Department/School</h4>
                    <form class="m-t-10 needs-validation form-material" method="post" action="{{route('departments.store')}}" novalidate>
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12">
                                <input type="text" name="department_name" class="form-control" placeholder="Department/School" required>
                                <div class="invalid-feedback">
                                    Name required
                                </div>
                            </div>
                        </div>
                        <div class="text-xs-right m-t-5 text-right">
                            <button type="submit" class="btn btn-outline-info">Add Department</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-dark">
                    <h4 class="card-title">All Departments</h4>
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
                            @foreach($departments as $department)
                                <tr>
                                    <td>{{$department->name}}</td>
                                    <td>{{$department->added_by}}</td>
                                    <td>{{substr($department->created_at,0,10)}}</td>
                                    <td>{{substr($department->created_at,10)}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="manage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="manage">
                                                <a href="{{route('departments.edit',$department->id)}}" class="dropdown-item ml-1 text-dark">
                                                    <i class="mdi mdi-account-edit"></i> Edit
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <form method="post" action="{{route('departments.destroy',$department->id)}}" onsubmit="return confirm('Do you really want to delete this Department')">
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
