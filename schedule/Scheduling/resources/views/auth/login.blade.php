<html>
<head>
    <title>Timetable Management System</title>
    <link rel="icon" type="image/ico" href="{{asset('images/logo.jpg')}}" />
    <link type="text/css" href="{{asset('css/login.css')}}" rel="stylesheet" media="all"
          rel="stylesheet"/>
    <link type="text/css" href="{{asset('css/app.css')}}" rel="stylesheet" media="all"
          rel="stylesheet"/>
    <link type="text/css" href="{{asset('css/jtip.css')}}" rel="stylesheet" media="all"
          rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('template/css/main.css') }}">
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
            <div style="color: white; font-size: 30px; font-weight: bold;"> MBEYA UNIVERSITY OF SCIENCE AND TECHNOLOGY</div>
            
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

            <p><b> Welcome to TMS </b><br/>
                <span style="margin-left: 15px; display: block; ">The Timetable Management System creates and manages the university Timetable.</span>
            </p>

            <p><b style="display: block;">Students</b></label>
                <span style="display: block; text-indent: 15px;"><b>*</b> Views Timetable</span>


            </p>

            <p>
                <b style="display: block;">Teaching Staff</b>
                <span style="display: block; text-indent: 15px;"><b>*</b> Views Timetable</span>
                <span style="display: block; text-indent: 15px;"><b>*</b> Propose Changes to Existing Timetable</span>
            </p>

            <p>
                <b style="display: block;">Examination Officer</b>
                <span style="display: block; text-indent: 15px;"><b>*</b> Creates and Manages Univeristy Timetable</span>
                <span style="display: block; text-indent: 15px;"><b>*</b> Process the Received Timetable from Teaching Staff</span>

            </p>

        </div>


        <div style="float: left; height: 350px; border: 1px solid #494949; width: 0px; margin: 20px 0px 0px 0px;"></div>
        <div style="float: left; width: 500px; border: 0px; margin: 20px 0px 0px 20px;">

            <div class="signin">Login</div>

            <div style="color: red; font-size: 12px;">
                            </div>

            <form method="POST" action="{{ route('login') }}">
                        @csrf

            <p>
                <label for="identity">Username</label><br/>
                <input type="text" name="regno" id="identity" placeholder="Username" class="form-control{{ $errors->has('regno') ? ' is-invalid' : '' }}" value="{{ old('regno') }}" required  />

                @if ($errors->has('regno'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('regno') }}</strong>
                                    </span>
                @endif

            </p>

            <p>
                <label for="password">Password</label><br/>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </p>

            <p style=" width: 400px;">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                <label for="remember" style="font-size: 15px; ">Remember me</label>
                <a href="{{ route('password.request') }}" style="margin-left: 80px">
                    Forgot your password?
                </a>

                <a href="http://sims.mustnet.ac.tz/index.php/ajax/?width=230" class="jTip" id="help" name="Student login help :">
                    <img src="../../images/help.png" style="border: 0px"/>HELP
                </a>
            </p>

            <p style=" width: 350px;">
                <button type="submit" class="submit">
                                    {{ __('Login') }}
                </button>
</p>


            </form>

        </div>
        <div style="clear: both;"></div>
    </div>
</div>
<div id="footer">
    <div class="login_line">
    </div>

    <div>
        <p style="text-align:center!important; font-weight: bold;" class="text-center pt-20">&copy; 2012 -  {{date("Y")}} 
            <a href="http://mist.ac.tz/" target="_blank">MBEYA UNIVERSITY OF SCIENCE AND TECHNOLOGY</a>
        </p>
    </div>

</div>
</body>
</html>


