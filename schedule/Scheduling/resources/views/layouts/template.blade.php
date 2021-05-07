<!DOCTYPE html>
<html lang="en">
    

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <script src="{{asset('template/js/app.js')}}"></script>
        <link rel="stylesheet" href="{{ asset('template/css/main.css') }}">
        <title>TMS | @yield('title')</title>
        @if (request()->is('timeTable/view/timetable') || request()->is('timeTable/searchResults'))
        <style type="text/css">
        #search_box{
            position: relative;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            transition: all 1s;
            width: 50px;
            height: 50px;
            background: white;
            box-sizing: border-box;
            border-radius: 25px;
            border: 4px solid white;
            padding: 5px;
        }

        input#q{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 42.5px;
            line-height: 30px;
            outline: 0;
            border: 0;
            display: none;
            font-size: 1em;
            border-radius: 20px;
            padding: 0 20px;
            background: #F3F3F4;
        }

        .search_icon{
            box-sizing: border-box;
            padding: 10px;
            width: 42.5px;
            height: 42.5px;
            position: absolute;
            top: 0;
            right: 0;
            border-radius: 50%;
            color: #07051a;
            text-align: center;
            font-size: 1.2em;
            transition: all 1s;
        }

        #search_box:hover{
            width: 350px;
            cursor: pointer;
        }

        #search_box:hover input#q{
            display: block;
        }

        /*input[type=search]:focus{
            display: block;
            width: 350px;
        }*/

        #search_box:hover .search_icon{
            background: #07051a;
            color: white;
        }
        </style>

        <script>document.getElementsByTagName("html")[0].className += " js";</script>
        <!-- Timetable css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        @endif

        <link rel="icon" type="image/ico" href="{{asset('images/logo.jpg')}}" />
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('dist/css/iCheck/custom.css')}}">
        @if (!request()->is('timeTable/view/timetable') && !request()->is('timeTable/searchResults'))
        <!-- anime -->
        <!--   Mchawi wa code Pen Schedule timetable template -->
        <link rel="stylesheet" href="{{asset('dist/css/anime.css')}}">
        @endif 
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
        
            a:link{
                text-decoration: none;
            }

            a:visited{
                text-decoration: none;
            }

            a:hover{
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <aside class="side-nav-box">
            <a class="logo-box" href="javascript:;">
                <img class="logo" src="{{asset('images/logo.jpg')}}" alt="Must Logo">
                <div class="title">MUST - <span class="highlight">Main Campus</span></div>
            </a>
            <div class="side-nav">
                <div class="title">Start</div>
                <div class="main-menu">
                    <ul>
                        <li>
                            <a href="{{route('home')}}" class="menu-item">
                                <i class="icon mdi mdi-view-dashboard" aria-hidden="true"></i> 
                                <div class="title">Dashboard</div>
                            </a>
                        </li>
                        @cannot('timetable')
                        <li>
                            <a href="{{route('viewTimetable')}}" class="menu-item">
                                <i class="icon mdi mdi-calendar-clock" aria-hidden="true"></i> 
                                <div class="title">View Timetable</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('departmentTimetable')}}" class="menu-item">
                                <i class="icon mdi mdi-calendar-clock" aria-hidden="true"></i> 
                                <div class="title">Department Timetable</div>
                            </a>
                        </li>
                        @endcannot
                        <li>
                            <a href="{{route('masterTimetable')}}" class="menu-item">
                                <i class="icon mdi mdi-calendar-clock" aria-hidden="true"></i> 
                                <div class="title">Master Timetable</div>
                            </a>
                        </li>
                    </ul>
                </div>

                @can('timetable')
                <div class="title">Management</div>
                <div class="main-menu">
                    <ul>
                        <!-- <li>
                            <a href="{{route('categories')}}" class="menu-item">
                                <i class="icon mdi mdi-folder-open" aria-hidden="true"></i> 
                                <div class="title">Categories</div>
                            </a>
                        </li> -->
                        <li>
                            <a href="{{route('courses')}}" class="menu-item">
                                <i class="icon mdi mdi-library-books" aria-hidden="true"></i> 
                                <div class="title">Courses</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('timetableCreate')}}" class="menu-item">
                                <i class="icon mdi mdi-calendar-check" aria-hidden="true"></i> 
                                <div class="title">Create Timetable</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('changeRequests')}}" class="menu-item">
                                <i class="icon mdi mdi-calendar-edit" aria-hidden="true"></i> 
                                <div class="title">Change Requests</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('departments')}}" class="menu-item">
                                <i class="icon mdi mdi-book" aria-hidden="true"></i> 
                                <div class="title">Departments</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('faculties')}}" class="menu-item">
                                <i class="icon mdi mdi-account-plus" aria-hidden="true"></i> 
                                <div class="title">Faculties</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('ranks')}}" class="menu-item">
                                <i class="icon mdi mdi-account-details" aria-hidden="true"></i> 
                                <div class="title">Salutations</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('semesters')}}" class="menu-item">
                                <i class="icon mdi mdi-playlist-edit" aria-hidden="true"></i> 
                                <div class="title">Semisters</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('study_levels')}}" class="menu-item">
                                <i class="icon mdi mdi-notification-clear-all" aria-hidden="true"></i> 
                                <div class="title">Study Levels</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('subjects')}}" class="menu-item">
                                <i class="icon mdi mdi-book-open-page-variant" aria-hidden="true"></i> 
                                <div class="title">Subjects</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('study_years')}}" class="menu-item">
                                <i class="icon mdi mdi-calendar-today" aria-hidden="true"></i> 
                                <div class="title">Year of Study</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('times')}}" class="menu-item">
                                <i class="icon mdi mdi-clock" aria-hidden="true"></i> 
                                <div class="title">Time Slots</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('units')}}" class="menu-item">
                                <i class="icon mdi mdi-credit-card-scan" aria-hidden="true"></i> 
                                <div class="title">Subject Credits</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('venues')}}" class="menu-item">
                                <i class="icon mdi mdi-map-marker" aria-hidden="true"></i> 
                                <div class="title">Venues</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('wings')}}" class="menu-item">
                                <i class="icon mdi mdi-map-marker-circle" aria-hidden="true"></i> 
                                <div class="title">Venue Wings</div>
                            </a>
                        </li>
                    </ul>
                </div>
                @endcan

                <div class="title">Security</div>
                <div class="main-menu">
                    <ul>
                        <li>
                            <a href="{{route('password_change')}}" class="menu-item">
                                <i class="icon mdi mdi-security-lock" aria-hidden="true"></i> 
                                <div class="title">Change Password</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>
        <div class="top-bar-box colored">
            <div class="container">
                <div class="top-bar">
                    <div class="page-info" style="font-size: 1.35rem;">Home / @yield('step') / @yield('description')</div>
                    <!-- <div class="top-side-box">
                        <div class="notification-box">
                            <div class="notification-item">
                                <i class="icon mdi mdi-earth" aria-hidden="true"></i> 
                                <div class="bullet"></div>
                                <div class="notification-content">
                                    <div class="header">
                                        <div class="title">Notifications</div>
                                        <div class="action"> <a href="#">Mark all as read</a> <a href="#">See all</a> </div>
                                    </div>
                                    <div class="content">
                                        <a href="javascript:;" class="item">
                                            <img src="images/profile-1.jpg" alt="Generic placeholder image">
                                            <div class="info">
                                                <div class="text"> <span class="highlight">Geena Fern</span> shared tour post. </div>
                                                <div class="time">2 Hours ago</div>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="item">
                                            <img src="images/profile-2.jpg" alt="Generic placeholder image">
                                            <div class="info">
                                                <div class="text"> <span class="highlight">Wiley Gladwyn</span> posted in UI/UX Event 2018. </div>
                                                <div class="time">1 Hours ago</div>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="item">
                                            <img src="images/profile-3.jpg" alt="Generic placeholder image">
                                            <div class="info">
                                                <div class="text"> <span class="highlight">Wiley Gladwyn</span> changed group name. </div>
                                                <div class="time">5 Hours ago</div>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="item">
                                            <img src="images/profile-1.jpg" alt="Generic placeholder image">
                                            <div class="info">
                                                <div class="text"> <span class="highlight">Geena Fern</span> added new post. </div>
                                                <div class="time">4 Hours ago</div>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="item">
                                            <img src="images/profile-2.jpg" alt="Generic placeholder image">
                                            <div class="info">
                                                <div class="text"> <span class="highlight">Wiley Gladwyn</span> changed group name. </div>
                                                <div class="time">5 Hours ago</div>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="item">
                                            <img src="images/profile-3.jpg" alt="Generic placeholder image">
                                            <div class="info">
                                                <div class="text"> <span class="highlight">Geena Fern</span> added new post. </div>
                                                <div class="time">4 Hours ago</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="notification-item">
                                <i class="icon mdi mdi-buffer" aria-hidden="true"></i> 
                                <div class="notification-content">
                                    <div class="header">
                                        <div class="title">Notifications</div>
                                        <div class="action"> <a href="#">Mark all as read</a> <a href="#">See all</a> </div>
                                    </div>
                                    <div class="content">
                                        <a href="javascript:;" class="item">
                                            <img src="images/profile-1.jpg" alt="Generic placeholder image">
                                            <div class="info">
                                                <div class="text"> <span class="highlight">Geena Fern</span> shared tour post. </div>
                                                <div class="time">2 Hours ago</div>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="item">
                                            <img src="images/profile-2.jpg" alt="Generic placeholder image">
                                            <div class="info">
                                                <div class="text"> <span class="highlight">Wiley Gladwyn</span> posted in UI/UX Event 2018. </div>
                                                <div class="time">1 Hours ago</div>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="item">
                                            <img src="images/profile-3.jpg" alt="Generic placeholder image">
                                            <div class="info">
                                                <div class="text"> <span class="highlight">Wiley Gladwyn</span> changed group name. </div>
                                                <div class="time">5 Hours ago</div>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="item">
                                            <img src="images/profile-1.jpg" alt="Generic placeholder image">
                                            <div class="info">
                                                <div class="text"> <span class="highlight">Geena Fern</span> added new post. </div>
                                                <div class="time">4 Hours ago</div>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="item">
                                            <img src="images/profile-2.jpg" alt="Generic placeholder image">
                                            <div class="info">
                                                <div class="text"> <span class="highlight">Wiley Gladwyn</span> changed group name. </div>
                                                <div class="time">5 Hours ago</div>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="item">
                                            <img src="images/profile-3.jpg" alt="Generic placeholder image">
                                            <div class="info">
                                                <div class="text"> <span class="highlight">Geena Fern</span> added new post. </div>
                                                <div class="time">4 Hours ago</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="notification-item">
                                <i class="icon mdi mdi-checkbox-multiple-blank" aria-hidden="true"></i> 
                                <div class="bullet"></div>
                                <div class="notification-content">
                                    <div class="header">
                                        <div class="title">Messages</div>
                                        <div class="action"> <a href="#">Mark all as read</a> <a href="#">See all</a> </div>
                                    </div>
                                    <div class="messages-content">
                                        <a href="javascript:;" class="item">
                                            <img src="images/profile-1.jpg" alt="Generic placeholder image">
                                            <div class="messages-box">
                                                <div class="name">Wiley Gladwyn</div>
                                                <div class="messages">Shared tour post.</div>
                                                <div class="time">2 Hours ago</div>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="item">
                                            <img src="images/profile-2.jpg" alt="Generic placeholder image">
                                            <div class="messages-box">
                                                <div class="name">Nadia Raelene</div>
                                                <div class="messages">Posted in UI/UX Event 2018.</div>
                                                <div class="time">2 Hours ago</div>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="item">
                                            <img src="images/profile-3.jpg" alt="Generic placeholder image">
                                            <div class="messages-box">
                                                <div class="name">Geena Fern</div>
                                                <div class="messages">Changed group name.</div>
                                                <div class="time">2 Hours ago</div>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="item">
                                            <img src="images/profile-1.jpg" alt="Generic placeholder image">
                                            <div class="messages-box">
                                                <div class="name">Wiley Gladwyn</div>
                                                <div class="messages">Added new post.</div>
                                                <div class="time">2 Hours ago</div>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="item">
                                            <img src="images/profile-2.jpg" alt="Generic placeholder image">
                                            <div class="messages-box">
                                                <div class="name">Wiley Gladwyn</div>
                                                <div class="messages">Shared tour post.</div>
                                                <div class="time">2 Hours ago</div>
                                            </div>
                                        </a>
                                        <a href="javascript:;" class="item">
                                            <img src="images/profile-3.jpg" alt="Generic placeholder image">
                                            <div class="messages-box">
                                                <div class="name">Nadia Raelene</div>
                                                <div class="messages">Posted in UI/UX Event 2018.</div>
                                                <div class="time">2 Hours ago</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="side-layout-toggle">
                            <i class="icon mdi mdi-apps" aria-hidden="true"></i> 
                            <div class="text">Side Content</div>
                        </div>
                    </div> -->
                    <div class="mobile-nav-toggle"> <i class="icon mdi mdi-menu" aria-hidden="true"></i> Menu </div>
                    <div class="user-profile">
                        <img class="user-image" src="{{asset('template/images/profile-1.jpg')}}" alt="Generic placeholder image">
                        <div class="info">
                            <div class="user-name">
                                @if(Auth::user()->gender == 'Male')
                                Mr. {{ Auth::user()->name }}
                                @else
                                Miss. {{ Auth::user()->name }}
                                @endif
                            </div>
                            <div class="user-info" style="font-size: 1rem;">{{ strtoupper(Auth::user()->privilage) }}</div>
                        </div>
                        <div class="user-profile-content">
                            <a href="{{route('password_change')}}"> <i class="icon mdi mdi-security-lock" aria-hidden="true"></i> Change Password </a>
                            <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="icon mdi mdi-logout-variant" aria-hidden="true"></i> Logout </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-wrapper" style="background-color: #f3f3f4;">
            <div class="container">
                <div class="box-layout">
                    <div class="main-layout full-width">
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
                    </div>
                </div>
            </div>
        </div>
        <!-- Graphs -->
        <script>
			$(document).ready(function() {
				var lineChart = $("#line-chart")
				var lineData = {
					labels: ["02.00", "02.30", "03.00", "03.30", "04.00", "04.30", "02.00", "02.30", "03.00", "02.00", "02.30"],
					datasets: [{
						label: "Visitors Graph",
						borderColor: "#fbd5007a",
						pointRadius: 2,
						borderWidth: 1,
						backgroundColor: "transparent",
						pointBackgroundColor: "#fbd500",
						data: [1, 5, 10, 4, 20, 5, 10, 2, 12, 5, 1]
					},
					{
						label: "Visitors Graph",
						borderColor: "#48527270",
						pointRadius: 2,
						borderWidth: 1,
						backgroundColor: "transparent",
						pointBackgroundColor: "#5b6b98",
						data: [5, 32, 5, 42, 50, 59, 5, 32, 5, 40, 5]
					}]
				};

				var myLineChart = new Chart(lineChart, {
					type: 'line',
					data: lineData,
					options: {
						legend: {
							display: false
						},
						scales: {
							xAxes: [{
								ticks: {
									fontSize: '11',
									fontColor: '#969da5'
								},
								gridLines: {
									color: '#f6f8fd',
									zeroLineColor: '#f6f8fd'
								}
							}],
							yAxes: [{
								gridLines: {
									color: '#f6f8fd',
									zeroLineColor: '#f6f8fd'
								},
								ticks: {
									fontSize: '11',
									fontColor: '#969da5'
								}
							}]
						}
					}
				})
			})
		</script>
        <!-- End of Graphs -->

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
        <!-- util functions included in the CodyHouse framework -->
        <script type="text/javascript" src="{{asset('js/util.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/main.js')}}"></script>

        <!-- Bootstrap-3 Typehead plugin -->
        
        <script src="{{asset('template/js/bootstrap3-typeahead.js')}}"></script>
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
            
            // $('.myTables').DataTable({
            //     'paging':true,
            //     'lengthChange':true,
            //     'searching': true,
            //     'ordering': false,
            //     'info': true,
            //     'autoWidth':true
            //     })

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