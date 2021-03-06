@extends('layouts.app')
@section('content')

    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Admins</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">All Admins</li>
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
                    <h4 class="card-title">All Admins</h4>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="nowrap table  table-striped " cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Department</th>
                                <th>Voting</th>
                                {{--<th>Edit</th>--}}
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->department->name}}</td>
                                    <td>{{$user->voting->name}}</td>
                                    {{--<td>
                                        <a class="text-success " role="button" href="{{route('users.edit',$user->id)}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>--}}
                                    <td>
                                        <form method="post" action="{{route('users.destroy',$user->id)}}" onsubmit="return confirm('Do you really want to delete this Admin')">
                                            @csrf
                                            {!! method_field('DELETE') !!}
                                            <button type="submit" class=" btn btn-outline-danger font-8 btn-sm pt-0 pb-0" style="font-size: 10px;  padding-top: 0;padding-bottom:  0">
                                                <i class="fa fa-trash "  style="font-size: 10px; padding-top: 0;padding-bottom:  0;margin-top: 0;"></i>
                                            </button>
                                        </form>
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

