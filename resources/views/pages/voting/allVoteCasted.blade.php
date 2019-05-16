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
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-dark">
                    <h4 class="card-title">All Voting</h4>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="nowrap table  table-striped " cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Index Number</th>
                                <th>Voting Date</th>
                                <th>Voted Time</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($participants as $participant)
                                <tr>
                                    <td>{{$participant->username}}</td>
                                    <td>{{$participant->username}}</td>
                                    <td>{{substr($participant->eligible[0]->updated_at,'0',10)}}</td>
                                    <td>{{substr($participant->eligible[0]->updated_at,10)}}</td>
                                    <td>
                                        @if($participant->eligible[0]->participated == 1)
                                            <label class="badge badge-success">Voted Casted</label>
                                        @elseif($participant->eligible[0]->participated == 0)
                                            <label class="badge badge-danger">Not Voted</label>
                                        @endif
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


