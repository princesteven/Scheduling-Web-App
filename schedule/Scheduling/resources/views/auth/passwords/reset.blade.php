<html>
<head>
    <title>Student Information Management System</title>
    <link rel="icon" type="image/ico" href="{{asset('images/logo.jpg')}}" />
    <link type="text/css" href="{{asset('css/login.css')}}" rel="stylesheet" media="all"
          rel="stylesheet"/>
    <link type="text/css" href="{{asset('css/app.css')}}" rel="stylesheet" media="all"
          rel="stylesheet"/>
    <link type="text/css" href="{{asset('css/jtip.css')}}" rel="stylesheet" media="all"
          rel="stylesheet"/>
    <script type="text/javascript" src="{{asset('js/jquery-2.1.1.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jtip.js')}}"></script>
    <style type="text/css">
        .error {
            color: red;
        }
    </style>
</head>
<body>
<div id="home">
    <div id="head">
        <div style="float: left; width: 200px; height: 90px; margin: 0px 0px 0px 30px;  border: 0px solid red;">
            <img src="{{asset('/images/logo.jpg')}}"
                 style="width: 200px; margin: 0px; height: 100px;"/>

        </div>
        <div style="float: left; margin: 30px 0px 0px 10px;">
            <div style="color: white; font-size: 30px; font-weight: bold;">          MBEYA UNIVERSITY OF SCIENCE AND TECHNOLOGY</div>
            <div style="color: white; font-size: 25px;   margin: 30px 0px 0px 10px;">STUDENT INFORMATION MANAGEMENT
                SYSTEM { SIMS }
            </div>
        </div>
        <div style="clear: both;"></div>


    </div>
    <div class="login_line">
    </div>
    <div id="head2">

        <div
            style="float: left; color: #000000; font-weight: bold; font-size: 15px; margin: 15px 0px 0px 50px; width: 300px;">
            Academic Year : 2018/2019</div>
        <div
            style="float:right; color: #000000; font-weight: bold; font-size: 15px; margin: 15px 0px 0px 0px; width: 300px;">
            {{date("F j, Y")}}
        </div>
        <div style="clear: both;"></div>
    </div>
    <div style="width: 1000px; border: 0px solid red; margin: auto;padding-bottom: 50px;overflow: auto; ">
        <div style="float: left; width: 400px; border: 0px; margin: 0px 0px 0px 10px; font-size: 12px;">

            <p><b> Welcome to SIMS </b><br/>
                <span style="margin-left: 15px; display: block; ">The Student Information Management System (SIMS) holds all the information relating to students.</span>
            </p>

            <p><b style="display: block;">Students</b></label>
                <span style="display: block; text-indent: 15px;"><b>*</b> Register for Courses online</span>
                <span style="display: block; text-indent: 15px;"><b>*</b> View Course Progress and Results</span>
                <span style="display: block; text-indent: 15px;"><b>*</b>  Forums</span>


            </p>

            <p>
                <b style="display: block;">Teaching Staff</b>
                <span style="display: block; text-indent: 15px;"><b>*</b> View list of Students per Course</span>
                <span style="display: block; text-indent: 15px;"><b>*</b> Publish Course Results</span>
                <span style="display: block; text-indent: 15px;"><b>*</b> Track Students Progress/Reports</span>
            </p>

            <p>
                <b style="display: block;">Other</b>
                <span style="display: block; text-indent: 15px;"><b>*</b> Payment Management</span>
                <span style="display: block; text-indent: 15px;"><b>*</b> Configuration</span>

            </p>

        </div>


        <div style="float: left; height: 350px; border: 1px solid #494949; width: 0px; margin: 20px 0px 0px 0px;"></div>
        <div style="float: left; width: 500px; border: 0px; margin: 20px 0px 0px 20px;">

            <div class="signin">Reset Password</div>

            <div style="color: red; font-size: 12px;">
                            </div>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                        
        </div>
        <div style="clear: both;"></div>
    </div>
</div>
<div id="footer">
    <div class="login_line">
    </div>
    <p id="copyright" style="float: left; font-weight: bold;">&copy; 2012 -  {{date("Y")}} <a
            href="http://mist.ac.tz/" target="_blank">MBEYA UNIVERSITY OF SCIENCE AND TECHNOLOGY</a></p>

    <p id="developers"><span> For Project Demonatration Purposes Only</span>

    </p>
</div>
</body>
</html>