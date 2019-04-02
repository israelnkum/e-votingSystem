<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ITSU - Voting System">
    <meta name="author" content="Osikani Israel Appiah Nkum">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('e-voting.png')}}">
    <title>E-Voting System</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/steps.css')}}" rel="stylesheet">
    <!--alerts CSS -->
    <link href="{{asset('css/sweetalert.css')}}" rel="stylesheet" type="text/css">
    <!-- chartist CSS -->
    <link href="{{asset('css/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/chartist-init.css')}}" rel="stylesheet">
    <link href="{{asset('css/chartist-plugin-tooltip.css')}}" rel="stylesheet">
    <link href="{{asset('css/css-chart.css')}}" rel="stylesheet">

    <link href="{{asset('css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">



    <link href="{{asset('css/jquery-clockpicker.min.css')}}" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="{{asset('css/asColorPicker.css')}}" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="{{asset('css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->
    <link href="{{asset('css/bootstrap-timepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/daterangepicker.css')}}" rel="stylesheet">



    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/switchery.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/bootstrap-select.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
    <link href="{{asset('jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/multi-select.css')}}" rel="stylesheet" type="text/css" />



    <!-- Vector CSS -->
    <link href="{{asset('css/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('css/colors/blue.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="fix-header fix-sidebar card-no-border logo-center">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-header">
                <a class="navbar-brand" href="javascript:void(0)">
                    <!-- Logo icon --><b>
                        <img src="{{asset('e-voting.png')}}" alt="homepage" class="dark-logo" />
                        <!-- Light Logo icon -->
                        <img src="{{asset('e-voting.png')}}" alt="homepage" height="auto" width="50" class="light-logo" />
                    </b>
                    <span>

                         <!-- dark Logo text -->
                        {{-- <img src="{{asset('logo-light-text.png')}}" alt="homepage" class="dark-logo" />
                        <!-- Light Logo text -->
                         <img src="{{asset('logo-light-text.png')}}" class="light-logo" alt="homepage" />--}}
                    </span> </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav mr-auto mt-md-0">
                    <!-- This is  -->
                    <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
                </ul>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <ul class="navbar-nav my-lg-0">
                    <!-- Language -->
                    <!-- ============================================================== -->
                    <li class="nav-item">
                        {{--<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-us"></i></a>
                        <div class="dropdown-menu dropdown-menu-right scale-up">
                            <a id="languageSwitcher" class="dropdown-item" href="#">
                                <i class="flag-icon flag-icon-in"> </i> India</a>
                            <a id="languageSwitcher" class="dropdown-item" href="#">
                                <i class="flag-icon flag-icon-fr"> </i> French</a>
                            <a id="languageSwitcher" class="dropdown-item" href="#"> <i class="flag-icon flag-icon-cn"> </i> China</a>
                            <a id="languageSwitcher" class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"> </i> Dutch</a>
                        </div>--}}

                        {{-- <select id="languageSwitcher">
                             <option value="en" >English</option>
                             <option value="de" >German</option>
                         </select>--}}

                    </li>
                    <li class="nav-item dropdown">
                        @if(substr($json['data']['LEVEL'],0,3) == '100')
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="http://www.ttuportal.com/admissions/public/albums/thumbnails/{{$json['data']['STNO']}}.jpg" alt="user" class="profile-pic" height="auto" width="200" />
                            </a>
                        @else
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="https://www.ttuportal.com/srms/public/albums/students/{{Auth::user()->username}}.jpg" alt="user" class="profile-pic" height="auto" width="200" />
                            </a>
                        @endif

                        <div class="dropdown-menu dropdown-menu-right scale-up">
                            <ul class="dropdown-user">
                                <li>
                                    <div class="dw-user-box">
                                        <div class="u-img">
                                            @if(substr($json['data']['LEVEL'],0,3) == '100')
                                                <img src="http://www.ttuportal.com/admissions/public/albums/thumbnails/{{$json['data']['STNO']}}.jpg" alt="user"  height="auto" width="80" />
                                            @else
                                                <img src="https://www.ttuportal.com/srms/public/albums/students/{{Auth::user()->username}}.jpg" alt="user" height="auto" width="80" />
                                            @endif
                                        </div>
                                        <div class="u-text">
                                            <h4>{{ Auth::user()->name }}</h4>
                                            <p class="text-muted">{{$json['data']['NAME']}}</p>
                                            <a href="{{ route('logout')}}"
                                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-rounded btn-danger btn-sm">Logout</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <input type="hidden" name="_token" id="csrf_toKen" value="{{csrf_token()}}">
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    @if(Auth::user()->role == "Super Admin" && Auth::user()->updated == 0 || Auth::user()->role == "Admin" && Auth::user()->updated == 0)

    @else
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                            <a href="{{route('home')}}" aria-expanded="false">
                                <i class="mdi mdi-gauge"> </i>
                                <span class="hide-menu">Home </span>
                            </a>
                        </li>
                        @if(Auth::User()->role == 'Admin' || Auth::User()->role == 'Super Admin')
                            <li>
                                <a class="has-arrow " href="#" aria-expanded="false">
                                    <i class="mdi mdi-thumb-up"> </i>
                                    <span class="hide-menu">Election</span>
                                </a>
                                <ul aria-expanded="false" class="collapse">
                                    <li>
                                        <a href={{route('voting.index')}}>All Elections</a>
                                    </li>
                                    <li>
                                        <a href="{{route('voting.create')}}">New Election</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow " href="#" aria-expanded="false">
                                    <i class="mdi mdi-account-location"> </i>
                                    <span class="hide-menu">Position</span>
                                </a>
                                <ul aria-expanded="false" class="collapse">
                                    <li>
                                        <a href="{{route('positions.index')}}">All /New Position(s)</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-devider"></li>
                            <li>
                                <a class="has-arrow " href="#" aria-expanded="false">
                                    <i class="mdi mdi-account"></i>
                                    <span class="hide-menu">Nominee</span>
                                </a>
                                <ul aria-expanded="false" class="collapse">
                                    <li>
                                        <a href="{{route('nominees.index')}}">All Nominee(s)</a>
                                    </li>
                                    <li>
                                        <a href="{{route('nominee_token.index')}}">Generate Token</a>
                                    </li>
                                    {{--    <li>
                                            <a href="{{route('nominees.create')}}">New Nominee</a>
                                        </li>--}}
                                </ul>
                            </li>
                            <li class="two-column">
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                    <i class="mdi mdi-file"></i><span class="hide-menu">File</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li>
                                        <a href="{{route('cast-voting.index')}}">View Results</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">All Generated Report(s)</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Generate Report</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">All Candidates(s)</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow " href="#" aria-expanded="false">
                                    <i class="mdi mdi-account"> </i>
                                    <span class="hide-menu">Voters(s)</span>
                                </a>
                                <ul aria-expanded="false" class="collapse">
                                    <li>
                                        <a href="{{route('voters.index')}}">All Voters(s)</a>
                                    </li>
                                    <li>
                                        <a href="{{route('voters.create')}}">New/Upload Voter(s)</a>
                                    </li>
                                </ul>
                            </li>



                            <li>
                                <a class="has-arrow " href="#" aria-expanded="false">
                                    <i class="mdi mdi-label"> </i>
                                    <span class="hide-menu">Level(s)</span>
                                </a>
                                <ul aria-expanded="false" class="collapse">
                                    <li>
                                        <a href="{{route('levels.index')}}">New/All Level(s)</a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        @if(Auth::User()->role == "Super Admin")
                            <li>
                                <a class="has-arrow " href="#" aria-expanded="false">
                                    <i class="mdi mdi-home"> </i>
                                    <span class="hide-menu">Department/School</span>
                                </a>
                                <ul aria-expanded="false" class="collapse">
                                    <li>
                                        <a href="{{route('departments.index')}}">New/All Department(s)</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a class="has-arrow " href="#" aria-expanded="false">
                                    <i class="mdi mdi-account"> </i>
                                    <span class="hide-menu">Admin(s)</span>
                                </a>
                                <ul aria-expanded="false" class="collapse">
                                    <li>
                                        <a href="{{route('users.index')}}">All Admin(s)</a>
                                    </li>
                                    <li>
                                        <a href="{{route('users.create')}}">New Admin</a>
                                    </li>
                                </ul>
                            </li>
                        @endif

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
@endif
<!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <div class="m-t-15">
                @include('layouts.messages')
            </div>
            @yield('content')

        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-dark">
            © {{date('Y')}} E-Voting System |
            <span>By <b style="font-weight: 900">ANA</b> Technologies</span>
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('js/jquery.slimscroll.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('js/sidebarmenu.js')}}"></script>
<!--stickey kit -->
<script src="{{asset('js/sticky-kit.min.js')}}"></script>
<script src="{{asset('js/jquery.sparkline.min.js')}}"></script>


<!--Custom JavaScript -->
<script src="{{asset('js/custom.min.js')}}"></script>
<!-- ============================================================== -->

<script src="{{asset('js/jquery.steps.min.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<!-- Sweet-Alert  -->
<script src="{{asset('js/sweetalert.min.js')}}"></script>
<script src="{{asset('js/steps.js')}}"></script>

<!-- This page plugins -->
<!-- ============================================================== -->
<!-- chartist chart -->
<script src="{{asset('js/chartist.min.js')}}"></script>
<script src="{{asset('js/chartist-plugin-tooltip.min.js')}}"></script>
<!-- Vector map JavaScript -->
<script src="{{asset('js/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('js/jquery-jvectormap-us-aea-en.js')}}"></script>
<script src="{{asset('js/dashboard3.js')}}"></script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="{{asset('js/jQuery.style.switcher.js')}}"></script>

<!-- Plugin JavaScript -->
<script src="{{asset('js/moment.js')}}"></script>
<script src="{{asset('js/bootstrap-material-datetimepicker.js')}}"></script>
<!-- Clock Plugin JavaScript -->
<script src="{{asset('js/jquery-clockpicker.min.js')}}"></script>
<!-- Color Picker Plugin JavaScript -->
<script src="{{asset('js/jquery-asColor.js')}}"></script>
<script src="{{asset('js/jquery-asGradient.js')}}"></script>
<script src="{{asset('js/jquery-asColorPicker.min.js')}}"></script>
<!-- Date Picker Plugin JavaScript -->
<script src="{{asset('js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap-select.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<!-- Date range Plugin JavaScript -->
<script src="{{asset('js/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('js/daterangepicker.js')}}"></script>
<script src="{{asset('js/jasny-bootstrap.js')}}"></script>
<script src="https://wrappixel.com/demos/admin-templates/material-pro/assets/plugins/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<script src="{{asset('js/mask.init.js')}}"></script>


<script>
    /*******************************************/
    // Basic Date Range Picker
    /*******************************************/
    $('.daterange').daterangepicker();

    /*******************************************/
    // Date & Time
    /*******************************************/
    $('.datetime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
            format: 'MM/DD/YYYY h:mm A'
        }
    });

    /*******************************************/
    //Calendars are not linked
    /*******************************************/
    $('.timeseconds').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        timePicker12Hour: true,
        timePickerSeconds: true,
        locale: {
            format: 'MM-DD-YYYY h:mm:ss'
        }
    });

    /*******************************************/
    // Single Date Range Picker
    /*******************************************/
    $('.singledate').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });

    /*******************************************/
    // Auto Apply Date Range
    /*******************************************/
    $('.autoapply').daterangepicker({
        autoApply: true,
    });

    /*******************************************/
    // Calendars are not linked
    /*******************************************/
    $('.linkedCalendars').daterangepicker({
        linkedCalendars: false,
    });

    /*******************************************/
    // Date Limit
    /*******************************************/
    $('.dateLimit').daterangepicker({
        dateLimit: {
            days: 7
        },
    });

    /*******************************************/
    // Show Dropdowns
    /*******************************************/
    $('.showdropdowns').daterangepicker({
        showDropdowns: true,
    });

    /*******************************************/
    // Show Week Numbers
    /*******************************************/
    $('.showweeknumbers').daterangepicker({
        showWeekNumbers: true,
    });

    /*******************************************/
    // Date Ranges
    /*******************************************/
    $('.dateranges').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    });

    /*******************************************/
    // Always Show Calendar on Ranges
    /*******************************************/
    $('.shawCalRanges').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        alwaysShowCalendars: true,
    });

    /*******************************************/
    // Top of the form-control open alignment
    /*******************************************/
    $('.drops').daterangepicker({
        drops: "up" // up/down
    });

    /*******************************************/
    // Custom button options
    /*******************************************/
    $('.buttonClass').daterangepicker({
        drops: "up",
        buttonClasses: "btn",
        applyClass: "btn-info",
        cancelClass: "btn-danger"
    });

    /*******************************************/
    // Language
    /*******************************************/
    $('.localeRange').daterangepicker({
        ranges: {
            "Aujourd'hui": [moment(), moment()],
            'Hier': [moment().subtract('days', 1), moment().subtract('days', 1)],
            'Les 7 derniers jours': [moment().subtract('days', 6), moment()],
            'Les 30 derniers jours': [moment().subtract('days', 29), moment()],
            'Ce mois-ci': [moment().startOf('month'), moment().endOf('month')],
            'le mois dernier': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
        },
        locale: {
            applyLabel: "Vers l'avant",
            cancelLabel: 'Annulation',
            startLabel: 'Date initiale',
            endLabel: 'Date limite',
            customRangeLabel: 'SÃ©lectionner une date',
            // daysOfWeek: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi','Samedi'],
            daysOfWeek: ['Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa'],
            monthNames: ['Janvier', 'fÃ©vrier', 'Mars', 'Avril', 'ÐœÐ°i', 'Juin', 'Juillet', 'AoÃ»t', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
            firstDay: 1
        }
    });
</script>
<script>
    // MAterial Date picker
    $('#mdate').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
    $('#timepicker,#timepicker1').bootstrapMaterialDatePicker({
        format: 'hh:mm A',
        timePicker12Hour: true,
        time: true,
        date: false
    });
    $('#date-format').bootstrapMaterialDatePicker({
        format: 'dddd DD MMMM YYYY - HH:mm'
    });

    $('#min-date').bootstrapMaterialDatePicker({
        format: 'DD/MM/YYYY HH:mm',
        minDate: new Date()
    });
    // Clock pickers
    $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });
    $('.clockpicker').clockpicker({
        donetext: 'Done',
    }).find('input').change(function() {
        console.log(this.value);
    });
    $('#check-minutes').click(function(e) {
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show').clockpicker('toggleView', 'minutes');
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }
    // Colorpicker
    $(".colorpicker").asColorPicker();
    $(".complex-colorpicker").asColorPicker({
        mode: 'complex'
    });
    $(".gradient-colorpicker").asColorPicker({
        mode: 'gradient'
    });
    // Date Picker
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    jQuery('#date-range').datepicker({
        toggleActive: true
    });
    jQuery('#datepicker-inline').datepicker({
        todayHighlight: true
    });
    // Daterange picker
    $('.input-daterange-datepicker').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-daterange-timepicker').daterangepicker({
        timePicker: true,
        format: 'MM/DD/YYYY h:mm A',
        timePickerIncrement: 30,
        timePicker12Hour: true,
        timePickerSeconds: false,
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-limit-datepicker').daterangepicker({
        format: 'MM/DD/YYYY',
        minDate: '06/01/2015',
        maxDate: '06/30/2015',
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse',
        dateLimit: {
            days: 6
        }
    });

    // For select 2
    $(".select2").select2();
</script>



<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

<script src="{{asset('js/datatables.min.js')}}"></script>
<!-- start - This is for export functionality only -->
<script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('js/buttons.flash.min.js')}}"></script>
<script src="{{asset('js/jszip.min.js')}}"></script>
<script src="{{asset('js/pdfmake.min.js')}}"></script>
<script src="{{asset('js/vfs_fonts.js')}}"></script>
<script src="{{asset('js/buttons.html5.min.js')}}"></script>
<script src="{{asset('js/buttons.print.min.js')}}"></script>
<!-- end - This is for export functionality only -->

<script>

    $(document).ready(function () {

        $('#example23').DataTable({
            dom: 'lBfrtip',
            buttons: ['csv', 'excel', 'pdf'],
        });


        $('#languageSwitcher').change(function () {
            var locale = $(this).val();
            var _token = $("input[name=_token]").val();

            $.ajax({
                url: "/language",
                type: 'POST',
                data:{locale : locale, _token: _token},
                datatype: 'json',
                success: function (data) {

                },
                error: function (data) {

                },
                beforeSend: function () {

                },
                complete: function () {
                    window.location.reload(true);
                }
            })
        })
    })
</script>
@if(Request::is('home')  ? 'active' : '')
    <script>

        let newLevelNames = [];
        let newTotalLevelCount = [];
        let newTotalFemales = [];
        let newTotalMales =[];
        let newTotalEachLevelVoters =[];




        let newMaxValue = '<?php echo $max_lvl_count;?>';



        <?php
        foreach($levelNames as $key=> $val){?>
        newLevelNames.push('<?php echo $val; ?>');
        <?php    }?>

        <?php
        foreach($totalLevelCount as $key=> $val){?>
        newTotalLevelCount.push('<?php echo $val; ?>');
        <?php    }?>
        <?php foreach($totalFemales as $key=> $val){?>
        newTotalFemales.push('<?php echo $val; ?>');
        <?php    }?>

        <?php foreach($totalMales as $key=> $val){?>
        newTotalMales.push('<?php echo $val; ?>');
        <?php    }?>

        <?php foreach($totalEachLevelVoters as $key=> $val){?>
        newTotalEachLevelVoters.push('<?php echo $val; ?>');
            <?php    }?>

        var chart2 = new Chartist.Bar('.amp-pxl', {
                labels:newLevelNames ,
                series: [

                    newTotalFemales,
                    newTotalMales,
                    newTotalLevelCount,
                    newTotalEachLevelVoters,



                ]
            }, {
                axisX: {
                    // On the x-axis start means top and end means bottom
                    position: 'end',
                    showGrid: false
                },
                axisY: {
                    // On the y-axis start means left and end means right
                    position: 'start'
                },
                high:newMaxValue,
                low: '0',
                plugins: [
                    Chartist.plugins.tooltip()
                ]
            });



        let newVotingNames = [];

        let newTotalVoterInEachVoting = [];

        let newTotalNomineesInEachVoting = [];

        let newTotalCandidatesInEachVoting =[];
        let newTotalVotesCastedInEachVoting = [];

        <?php foreach($allVotingNames as $key=> $val){?>
        newVotingNames.push('<?php echo $val; ?>');
        <?php    }?>

        <?php foreach($totalVoterInEachVoting as $key=> $val){?>
        newTotalVoterInEachVoting.push('<?php echo $val; ?>');
        <?php    }?>

        <?php foreach($totalNomineesInEachVoting as $key=> $val){?>
        newTotalNomineesInEachVoting.push('<?php echo $val; ?>');
        <?php    }?>

        <?php foreach($totalCandidatesInEachVoting as $key=> $val){?>
        newTotalCandidatesInEachVoting.push('<?php echo $val; ?>');
        <?php    }?>

        <?php foreach($totalVotesCastedInEachVoting as $key=> $val){?>
        newTotalVotesCastedInEachVoting.push('<?php echo $val; ?>');
            <?php    }?>





        let newMaxVotersCount = '<?php echo $max_voters_count; ?>';

        var chart3 = new Chartist.Bar('.amp', {
            labels:newVotingNames ,
            series: [
                newTotalVoterInEachVoting,
                newTotalNomineesInEachVoting,
                newTotalCandidatesInEachVoting,
                newTotalVotesCastedInEachVoting
            ]
        }, {
            axisX: {
                // On the x-axis start means top and end means bottom
                position: 'end',
                showGrid: false
            },
            axisY: {
                // On the y-axis start means left and end means right
                position: 'start'
            },
            high:newMaxVotersCount,
            low: '0',
            plugins: [
                Chartist.plugins.tooltip()
            ]
        });
    </script>
@endif
</body>
</html>