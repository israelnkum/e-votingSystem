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
    <div class="row">
        <div class="col-md-12 text-center">
            <h3 class="mb-0">ITSU VOTING SYSTEM</h3>
            <p class="mb-0">Date: 2019-12-06</p>
            <p class="mb-0">Time: 08:00 AM - 05:00 PM</p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Voter</h3>
                </div>
                <div class="card-body text-dark">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{asset('osikani.jpg')}}" height="auto" width="150">
                        </div>
                        <div class="col-md-8">
                            <h1 class="text-dark"><span class="text-info">NAME: </span>APPIAH NKUM AMOS</h1>
                            <h4 class="text-dark"><span class="text-info">INDEX NUMBER: </span>07162374</h4>
                            <h4 class="text-dark"><span class="text-info">DEPARTMENT: </span>COMPUTER SCIENCE</h4>
                            <h4 class="text-dark"><span class="text-info">PROGRAM: </span>HND INFORMATION TECHNOLOGY</h4>
                            <h4 class="text-dark"><span class="text-info">LEVEL: </span>300</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-3 text-center">
            <img height="150" width="150" src="{{asset('osikani.jpg')}}" alt="user" class="img-circle">
        </div>

        <div class="col-md-6 text-center mt-5">
            <h5>AMOS APPIAH NKUM</h5>
        </div>

        <div class="col-md-3 text-center mt-5">
            <h5>PRESIDENT</h5>
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