<!DOCTYPE html>
<html>
<head>
	<title>{{$mon[0]->study_level_name}} Timetable</title>

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Main Script -->
  <script src="{{asset('dist/js/jquery-2.1.1.js')}}"></script>
</head>
<body>
	<h3 style="text-align: center; margin-bottom: 1.5em; margin-top: 1.5em;"><strong>{{$mon[0]->study_level_name}} Timetable</strong></h3>
	<table class="table table-bordered table-striped table-responsive" style="margin-right:-10px;margin-top: 8px;" id="table">
            <col width="15%">
            <col width="17%">
            <col width="17%">
            <col width="17%">
            <col width="17%">
            <col width="17%">
              <thead>
                <tr>
                <th>Time</th>
                <th>MONDAY</th>
                <th>TUESDAY</th>
                <th>WEDNESDAY</th>
                <th>THURSDAY</th>
                <th>FRIDAY</th>

                </tr>
              </thead>
             
                <tbody>
                    @foreach (range(0, count($mon) - 1) as $index)
                       <tr>
                           <td class="first">
                               <input class="form-control" type="text" name="time" placeholder="{{$mon[$index]->start_time}} - {{$mon[$index]->end_time}}" readonly="" style="text-align: center !important;">
                              
                            </td>

                            <td>
                                @if($mon[$index]->subject_code !== null)
                                <strong>Code:</strong> {{$mon[$index]->subject_code}} <br>
                                <strong>Subject:</strong> {{$mon[$index]->subject_name}} <br>
                                <strong>Lecturer:</strong> {{$mon[$index]->user_name}} <br>
                                <strong>Venue:</strong> {{$mon[$index]->venue_name}} <br>
                                @else
                                {{ '' }}
                                @endif
                            </td>
                           

                            <td>
                                @if($tue[$index]->subject_code !== null)
                                <strong>Code:</strong> {{$tue[$index]->subject_code}} <br>
                                <strong>Subject:</strong> {{$tue[$index]->subject_name}} <br>
                                <strong>Lecturer:</strong> {{$tue[$index]->user_name}} <br>
                                <strong>Venue:</strong> {{$tue[$index]->venue_name}} <br>
                                @else
                                {{ '' }}
                                @endif
                            </td>

                            <td>
                                @if($wed[$index]->subject_code !== null)
                                <strong>Code:</strong> {{$wed[$index]->subject_code}} <br>
                                <strong>Subject:</strong> {{$wed[$index]->subject_name}} <br>
                                <strong>Lecturer:</strong> {{$wed[$index]->user_name}} <br>
                                <strong>Venue:</strong> {{$wed[$index]->venue_name}} <br>
                                @else
                                {{ '' }}
                                @endif
                            </td>

                            <td>
                                @if($thu[$index]->subject_code !== null)
                                <strong>Code:</strong> {{$thu[$index]->subject_code}} <br>
                                <strong>Subject:</strong> {{$thu[$index]->subject_name}} <br>
                                <strong>Lecturer:</strong> {{$thu[$index]->user_name}} <br>
                                <strong>Venue:</strong> {{$thu[$index]->venue_name}} <br>
                                @else
                                {{ '' }}
                                @endif
                            </td>

                            <td>
                                @if($fri[$index]->subject_code !== null)
                                <strong>Code:</strong> {{$fri[$index]->subject_code}} <br>
                                <strong>Subject:</strong> {{$fri[$index]->subject_name}} <br>
                                <strong>Lecturer:</strong> {{$fri[$index]->user_name}} <br>
                                <strong>Venue:</strong> {{$fri[$index]->venue_name}} <br>
                                @else
                                {{ '' }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                <th>Time</th>
                <th>MONDAY</th>
                <th>TUESDAY</th>
                <th>WEDNESDAY</th>
                <th>THURSDAY</th>
                <th>FRIDAY</th>

                </tr>
              </tfoot>
              
            </table>

   <script type="text/javascript">
   	$(document).ready(function(){
   		window.print();
   	})
   </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
</body>
</html>