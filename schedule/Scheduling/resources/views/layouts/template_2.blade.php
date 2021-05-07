
<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SIMS | @yield('title')</title>
  <link rel="icon" type="image/ico" href="{{asset('images/logo.jpg')}}" />

  @if (request()->is('timeTable/view/timetable'))
  <!-- Timetable css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/codePenSchedule.css') }}">
  @endif
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
 
  <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('dist/css/iCheck/custom.css')}}">
  <!-- anime -->
<!--   Mchawi wa code Pen Schedule timetable template
<link rel="stylesheet" href="{{asset('dist/css/anime.css')}}">
 -->  
 <!-- Style CSS -->
  <link href="{{asset('dist/css/style.css')}}" rel="stylesheet">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- Select2 Bootstrap -->
  <link href="{{asset('dist/css/select2-bootstrap.css')}}" rel="stylesheet">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{asset('plugins/timepicker/bootstrap-timepicker.min.css')}}">
  <!-- Jquery-Confirm -->
  <link href="{{asset('dist/css/jquery-confirm.css')}}" rel="stylesheet">
  <!-- Datatables -->
  <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- Slick -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/slick.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/slick-theme.css')}}"> 
  <!-- Mainly scripts -->
  <script src="{{asset('dist/js/jquery-2.1.1.js')}}"></script>
  <script  src="{{asset('js/create-timetable.js')}}"></script>

  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <!-- Jquery-Confirm.js -->
  <script src="{{asset('dist/js/jquery-confirm.min.js')}}"></script>
  <script src="{{asset('dist/js/script.js')}}"></script>
  <!-- Select2 -->
  <script src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>

  <!-- EasyTicker -->
    <script src="{{asset('dist/js/easy-ticker.js')}}"></script>
    <script src="{{asset('dist/js/jquery.easing.min.js')}}"></script>

  <!-- bootstrap time picker -->
    <script src="{{asset('plugins/timepicker/bootstrap-timepicker.js')}}"></script>

    <style>
    .btn-round{
        border-radius:100%;
    }
    .demof{
       margin: 25px 0;
    }
    .demof ul{
        padding: 0;
        list-style: none;
    }
    .demof li{
        padding: 20px;
        border-bottom: 1px dashed #ccc;
    }
    .demof li.odd{
        background: #fafafa;
    }
    .demof li:after {
        content: '';
        display: block;
        clear: both;
    }
    .demof p {
        margin: 15px 0 0;
        font-size: 14px;
    }
   </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap" />
    </head>

<body>

<div id="wrapper">
    <div id="header_div">
        <div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0px;" id="header_div">
        <div class="navbar-header pull-right" style="margin-right: 30px;">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

        </div>
        <div style="background: transparent; height: 80px; margin-left: 10px; overflow: hidden;">
            <div style="float: left; width: 150px; height: 80px; margin: 0px 0px 0px 20px;  border: 0px solid red;">
                <img src="{{asset('images/logo.jpg')}}"
                     style="width: 150px; margin: 0px 0px 0px 0px; height: 80px;"/>

            </div>
            <div style="float: left; margin: 0px 0px 0px 10px;">
                <div style="color: white; font-size: 30px; font-weight: bold;">MBEYA UNIVERSITY OF SCIENCE AND TECHNOLOGY</div>
                <div style="color: white; font-size: 25px;   margin: 0px 0px 0px 10px;">STUDENT INFORMATION MANAGEMENT
                    SYSTEM { SIMS }
                </div>
            </div>
            <div style="clear: both;"></div>

        </div>


    </nav>
</div>
        

    </div>
    <div id="header_line"></div>
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">

       <li class="nav-header"  style="background-color: #273A4A;">
           <div class="dropdown profile-element"> <span>

               <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                  <span class="clear">
                    <span class="block m-t-xs"> 
                      <strong class="font-bold">Main Campus</strong>
                  </span>
                                                            </span> </a>
               <ul class="dropdown-menu animated fadeInRight m-t-xs">
                   
               </ul>

           </div>
           <div class="logo-element">
               SIMS MUST
           </div>
       </li>


       <li class="@yield('active_dashboard') ">
    <a href="{{route('home')}}">
        <i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>

</li>

<li class="@yield('active_timetable') ">
  <a href="{{route('viewTimetable')}}">
    <i class="fa fa-calendar"></i> <span class="nav-label">View Timetable</span>
  </a>
</li>
       
<!-- Start Admission Link here -->
<li class = "@yield('active_mainlink')">
    <a href="http://sims.mustnet.ac.tz/index.php">
        <i class="fa fa-registered"></i> <span class="nav-label">Timetable</span> <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
        <li class="@yield('active_mainlink')">
            <a href="#"><i class="fa fa-angle-right"></i> <span class="nav-label">Management</span></a>
            <ul class="nav nav-third-level">
              <!-- <li class=" ">
                  <a href="{{route('categories')}}"><i class="fa fa-angle-right"></i>Categories</a>
              </li> -->
              <li class=" ">
                  <a href="{{route('courses')}}"><i class="fa fa-angle-right"></i>Courses</a>
              </li>
              <li class=" ">
                  <a href="{{route('timetableCreate')}}"><i class="fa fa-angle-right"></i>Create Timetable</a>
              </li>
              <li class=" ">
                  <a href="{{route('departments')}}"><i class="fa fa-angle-right"></i>Departments</a>
              </li>
              <li class=" ">
                  <a href="{{route('faculties')}}"><i class="fa fa-angle-right"></i>Faculties</a>
              </li>
              <li class=" ">
                  <a href="{{route('ranks')}}"><i class="fa fa-angle-right"></i>Salutations</a>
              </li>
              <li class=" ">
                  <a href="{{route('semesters')}}"><i class="fa fa-angle-right"></i>Semisters</a>
              </li>
              <li class=" ">
                  <a href="{{route('study_levels')}}"><i class="fa fa-angle-right"></i>Study Levels</a>
              </li>
              <li class=" ">
                  <a href="{{route('subjects')}}"><i class="fa fa-angle-right"></i>Subjects</a>
              </li>
              <li class=" ">
                  <a href="{{route('study_years')}}"><i class="fa fa-angle-right"></i>Year of Study</a>
              </li>
              <li class=" ">
                  <a href="{{route('times')}}"><i class="fa fa-angle-right"></i>Time Slots</a>
              </li>
              <li class=" ">
                  <a href="{{route('units')}}"><i class="fa fa-angle-right"></i>Subject Credits</a>
              </li>
              <li class=" ">
                  <a href="{{route('venues')}}"><i class="fa fa-angle-right"></i>Venues</a>
              </li>
              <li class=" ">
                  <a href="{{route('wings')}}"><i class="fa fa-angle-right"></i>Venue Wings</a>
              </li>

            </ul>
        </li>
    </ul>
</li>

<!-- End of Admission Link -->


<li class="@yield('active_passwordlink') ">
    <a href="">
        <i class="fa fa-lock"></i> <span class="nav-label">Security</span> <span
            class="fa arrow"></span></a>
    <ul class="nav nav-second-level collapse">
        <li>
          <a href="{{route('password_change')}}">
            <i class="fa fa-angle-right"></i>Change Password
          </a>
        </li>


    </ul>
</li>

    </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-6">
        <ol class="breadcrumb">
            <li>
                <a href="http://sims.mustnet.ac.tz/index.php">Home</a>
            </li>
                            <li >
                    <a href="http://sims.mustnet.ac.tz/index.php/dashboard">@yield('step')</a>
                </li>
                            <li class="active">
                    <a href="#"><strong>@yield('description')</strong></a>
                </li>
            
        </ol>
    </div>
    <div class="col-lg-6">
<ul class="nav navbar-top-links navbar-right" >
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            
            <span style="display: inline-block; margin-top: -10px; ">
              @if(Auth::user()->gender == 'Male')
              Mr. {{ Auth::user()->name }}
              @else
              Miss. {{ Auth::user()->name }}
              @endif
            </span>
            <b style="display: inline-block; margin-top: -10px;" class="caret"></b>
        </a>
        <ul class="dropdown-menu" style="width: 200px;">
            <li>
                <a href="{{route('password_change')}}">
                    <div>Change Password </div>
                </a>

            </li>
            <li class="divider"></li>
            <li>
                <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div>Logout </div>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                   @csrf
                </form>

            </li>
                        </ul>

    </li>


    <li class="dropdown">
        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="javascript:void(0);">
            <i class="fa fa-user-md"></i>  <span class="label label-info" style="display: none;" id="online_user_count" ></span>
        </a>
        <ul class="dropdown-menu dropdown-messages" style="display: none; max-height: 500px; overflow:auto; " id="list_online_user">

        </ul>
    </li>


    <li>
                <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div>Logout </div>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                   @csrf
                </form>

            </li>
</ul>
    </div>
</div>        

<div style="border-bottom: 1px solid #2f4050; text-align: right; padding: 2px; color: #2f4050; font-weight: bold;">
            Active Academic Year : 2018/2019 - Semester II        
        </div>
<div class="wrapper wrapper-content animated fadeInRight" >

  <!-- Main content -->
    
    <section class="content">
     @if (session('success'))
     <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                {{ session('success') }}
              </div>
     @endif 

     @if (session('danger'))
     <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                {{ session('danger') }}
              </div>
     @endif 
     @yield('content')
    </section>
    <!-- /.content -->

</div>
            




            </div>

        </div>
    </div>
</div>
        </div>
        <div class="footer fixed">
            <div class="pull-right">
            <strong>
                For Project Demonstration Only
            </strong>.
            </div>
            <div>
                <strong>
                  &copy; 2012- 2019 &nbsp; &nbsp; 
                  <a href="http://mustnet.ac.tz" target="_blank">MBEYA UNIVERSITY OF SCIENCE AND TECHNOLOGY</a>
                </strong>
            </div>
        </div>

    </div>
</div>


<script src="{{asset('dist/js/jquery.metisMenu.js')}}"></script>
<script src="{{asset('dist/js/jquery.slimscroll.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('dist/js/inspinia.js')}}"></script>
<script src="{{asset('dist/js/pace.js')}}"></script>

<!-- datepicker -->
<script src="{{asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

<!-- Datatables -->
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<!-- Delete Plugin -->
<script src="{{asset('dist/js/deletePlugin.js')}}"></script>

<!-- Slick -->
<!-- <script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script> -->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!-- printThis -->
<script type="text/javascript" src="{{asset('js/printThis.js')}}"></script>

@if (request()->is('timeTable/view/timetable'))
<!-- Code Pen Schedule -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js'></script>

<!-- Timetable js -->
<script type="text/javascript" src="{{asset('js/codePenSchedule.js')}}"></script>
@endif

<!--  React scripts  -->
<script src="{{ asset('js/app.js') }}"></script>



<!-- ******************************POP UP************************************ -->
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModal" aria-hidden="true"
     data-backdrop="dynamic" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="display: none;" id="model_header">
                <h4 class="modal-title"></h4>
                </div>
            <div class="modal-body" id="modal_body">
            <div style="height: 100px; line-height: 100px; text-align: center;"><img
                    src="http://sims.mustnet.ac.tz/icon/loader.gif"/> Loading....
            </div>
                </div>
            <div class="modal-footer" style="display: none;" id="model_footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<script>
  $(function(){
    //Initialize Select2 Elements
    $('.select2').select2();
    
      $('.myTables').DataTable({
          'paging':true,
          'lengthChange':true,
          'searching': true,
           'ordering': false,
           'info': true,
           'autoWidth':true
        })

      //Timepicker
    $('.timepicker').timepicker({
      showMeridian: false,
      showInputs: false,
      minuteStep: 5,
    });

    //Slick
     $('.slick').slick({
                dots: true
            });

  })
</script>

</body>

</html>
