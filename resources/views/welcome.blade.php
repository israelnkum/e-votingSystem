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
    {{--<link href="{{asset('css/style.css')}}" rel="stylesheet">--}}
    {{--<link href="{{asset('css/colors/blue.css')}}" id="theme" rel="stylesheet">--}}


</head>

<body >
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->

<div class="container">
    <div class="row">
        <div class="col-md-6">
        </div>

        <div class="text-left">
            <h3 class="">Date: 2019-12-06</h3>
        </div>
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