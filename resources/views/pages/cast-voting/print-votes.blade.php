<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="E-Voting System | Print Out">
    <meta name="author" content="Osikani Israel Appiah Nkum">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('e-voting.png')}}">
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
        <div class="col-md-12">
            <img class="img-responsive mt-0 img-fluid"  src="{{asset('e-header.jpg')}}" height="auto">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <h3 class="card-title">Voter</h3>
            <hr>
            <div class="card-body text-dark">
                <div class="row">
                    <div class="col-md-12  text-center">
                        <?php
                        $json = json_decode(file_get_contents("https://www.ttuportal.com/srms/api/student/".Auth::User()->username.""), true, JSON_PRETTY_PRINT);
                        ?>
                        @if(substr($json['data']['LEVEL'],0,3) == '100')
                            <?php
                            echo "<img src='http://www.ttuportal.com/admissions/public/albums/thumbnails/".$json['data']['STNO'].".jpg' alt='".Auth::user()->username."' class='img-fluid' height='auto' width='100'> ";
                            echo '<h6 class="text-dark mt-3"><span class="text-info"></span>'.str_replace(',', '',$json['data']['NAME']).'</h6>
                            <h6 class="text-dark"><span class="text-info"></span>'.Auth::User()->username.'</h6>
                        ';
                            ?>
                        @else
                            <?php
                            $json = json_decode(file_get_contents("https://www.ttuportal.com/srms/api/student/".Auth::User()->username.""), true, JSON_PRETTY_PRINT);
                            echo '<img src="https://www.ttuportal.com/srms/public/albums/students/'.Auth::user()->username.'.jpg" alt="'.Auth::user()->username.'" class="img-fluid" height="auto" width="100" />';
                            ?>
                        @endif
                    </div>
                    {{--  @php
                          echo '
                          <div class="col-md-4">
                              <h6 class="text-dark"><span class="text-info"></span>'.str_replace(',', '',$json['data']['NAME']).'</h1>
                              <h6 class="text-dark"><span class="text-info"></span>'.Auth::User()->username.'</h4>
                          </div>
                          ';
                      @endphp--}}
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
    @foreach($voteCastedFor as $voteCast)
        <div class="row">
            <div class="col-md-3 text-center">
                <img height="auto" width="100" src="http://localhost:800/api/image/{{$voteCast->image}}" alt="user" class="img-fluid">
            </div>

            <div class="col-md-6 text-center mt-5">
                <h5>{{$voteCast->first_name." ".$voteCast->other_name." ".$voteCast->last_name}}</h5>
            </div>

            <div class="col-md-3 text-center mt-5">
                <h5>{{$voteCast->position->name}}</h5>
            </div>
        </div>
        <hr>
    @endforeach

    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <img class="img-responsive mt-0 img-fluid"  src="{{asset('e-footer.png')}}" height="auto">
            <small class="text-danger">E-Voting System By ANA TECHNOLOGIES</small>
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
<script>
     window.onload = function() {
         window.print();
         window.close();
         //   window.history.back();


         document.location.href="/cast-voting";
     }
</script>

</body>
</html>