<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ITSU - Voting System | Print Out">
    <meta name="author" content="Osikani Israel Appiah Nkum">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('itsu.jpeg')}}">
    <title>ITSU | Voting System - Print Out</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    {{--<link href="{{asset('css/colors/blue.css')}}" id="theme" rel="stylesheet">--}}


</head>

<body >
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->

<div class="container" >
    <div class="row mt-5">
        <div class="col-md-6 text-right">
            <img src="{{asset('e-voting.png')}}" height="auto" width="100">
        </div>
        <div class="col-md-6 text-left">
            <h3 class="mb-0">ITSU VOTING SYSTEM</h3>
            <p class="mb-0">Date: 2019-12-06</p>
            <p class="mb-0">Time: 08:00 AM - 05:00 PM</p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <h3 class="card-title">Voter</h3>
            <hr>
            <div class="card-body text-dark">
                <div class="row">
                    <div class="col-md-2 text-right">
                        <img src="{{asset('osikani.jpg')}}" height="auto" width="100">
                    </div>
                    <div class="col-md-8">
                        <h1 class="text-dark"><span class="text-info">NAME: </span>APPIAH NKUM AMOS</h1>
                        <h4 class="text-dark"><span class="text-info">INDEX NUMBER: </span>07162374</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <h3>Candidates</h3>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 text-center">
            <img height="auto" width="100" src="{{asset('osikani.jpg')}}" alt="user" class="img-fluid">
        </div>

        <div class="col-md-6 text-center mt-5">
            <h5>AMOS APPIAH NKUM</h5>
        </div>

        <div class="col-md-3 text-center mt-5">
            <h5>PRESIDENT</h5>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-3 text-center">
            <img height="auto" width="100" src="{{asset('osikani.jpg')}}" alt="user" class="img-fluid">
        </div>

        <div class="col-md-6 text-center mt-5">
            <h5>AMOS APPIAH NKUM</h5>
        </div>

        <div class="col-md-3 text-center mt-5">
            <h5>INTEREST AND INNOVATIONS COORDINATOR</h5>
        </div>
    </div>
</div>


<!-- ============================================================== -->

<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>