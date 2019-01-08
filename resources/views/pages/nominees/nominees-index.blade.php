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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-dark">
                    <h4 class="card-title">All Nominees</h4>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="nowrap table  table-striped " cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Index Number</th>
                                <th>CPGA</th>
                                <th>Position</th>
                                <th>Telephone</th>
                                <th>Email</th>
                                <th>Department</th>
                                <th>Manage</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($nominees as $nominee)
                                <tr>
                                    <td>{{$nominee->last_name." ".$nominee->first_name." ".$nominee->other_name}}</td>
                                    <td><img class="rounded-circle" height="60" width="60" src="{{asset('nominee_img/'.$nominee->image)}}"></td>
                                    <td>{{$nominee->index_number}}</td>
                                    <td>{{$nominee->cgpa}}</td>
                                    <td>{{$nominee->position->name}}</td>
                                    <td>{{$nominee->telephone}}</td>
                                    <td>{{$nominee->email}}</td>
                                    <td>{{$nominee->department->name}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="manage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="manage">
                                                <a href="{{route('nominees.edit',$nominee->id)}}" class="dropdown-item ml-1 text-dark">
                                                    <i class="mdi mdi-account-edit"> </i> Edit
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <form method="post" action="{{route('makeCandidate',$nominee->id)}}" onsubmit="return confirm('Are you sure you want to continue?')">
                                                        @csrf
                                                        <button type="submit" style="background: transparent; border: 0;">
                                                            @if($nominee->candidate == 0)
                                                                <i class="mdi mdi-thumb-up"> </i> Make Candidate
                                                            @else
                                                                <i class="mdi mdi-thumb-down"> </i> Unmake Candidate
                                                            @endif
                                                        </button>
                                                    </form>
                                                </a>
                                                <a class="dropdown-item" href="javascript:void(0)">
                                                    <form method="post" action="{{route('nominees.destroy',$nominee->id)}}" onsubmit="return confirm('Do you really want to delete this Nominee')">
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
    </div>

@endsection
