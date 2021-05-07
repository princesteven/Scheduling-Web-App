@extends('layouts.template')
@section('title','Timetable')
@section('step','Timetable')
@section('description','View Timetable')
@section('active_timetable', 'active')

@section('content')
<input type="hidden" value="{{ Auth::User()->id}}" id="lecturer_id">
    <div class="ibox-content">
        <div class="pull-right" style="padding-top: 20px;">
            <form action="" id="search_box">
              <input type="search" data-provide="typeahead" data-source='[{{"$autocomplete"}}]' id="q" name="q" placeholder="search lecturer, venue or subject">
              <i class="fa fa-search search_icon"></i>
           </form> 
        </div>
        <div></div>


    <div class="default-content" style="padding-top: 40px;">
        @can('student_category')
             <div>
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
                                    @if($mon[$index]->subject_code !== null && $mon[$index]->status !== 'pending')
                                    <strong>Code:</strong> {{$mon[$index]->subject_code}} <br>
                                    <strong>Subject:</strong> {{$mon[$index]->subject_name}} <br>
                                    <strong>Lecturer:</strong> {{$mon[$index]->user_name}} <br>
                                    <strong>Venue:</strong> {{$mon[$index]->venue_name}} <br>
                                    @else
                                    {{ '' }}
                                    @endif
                                </td>
                               
    
                                <td>
                                    @if($tue[$index]->subject_code !== null && $tue[$index]->status !== 'pending')
                                    <strong>Code:</strong> {{$tue[$index]->subject_code}} <br>
                                    <strong>Subject:</strong> {{$tue[$index]->subject_name}} <br>
                                    <strong>Lecturer:</strong> {{$tue[$index]->user_name}} <br>
                                    <strong>Venue:</strong> {{$tue[$index]->venue_name}} <br>
                                    @else
                                    {{ '' }}
                                    @endif
                                </td>
    
                                <td>
                                    @if($wed[$index]->subject_code !== null && $wed[$index]->status !== 'pending')
                                    <strong>Code:</strong> {{$wed[$index]->subject_code}} <br>
                                    <strong>Subject:</strong> {{$wed[$index]->subject_name}} <br>
                                    <strong>Lecturer:</strong> {{$wed[$index]->user_name}} <br>
                                    <strong>Venue:</strong> {{$wed[$index]->venue_name}} <br>
                                    @else
                                    {{ '' }}
                                    @endif
                                </td>
    
                                <td>
                                    @if($thu[$index]->subject_code !== null && $thu[$index]->status !== 'pending')
                                    <strong>Code:</strong> {{$thu[$index]->subject_code}} <br>
                                    <strong>Subject:</strong> {{$thu[$index]->subject_name}} <br>
                                    <strong>Lecturer:</strong> {{$thu[$index]->user_name}} <br>
                                    <strong>Venue:</strong> {{$thu[$index]->venue_name}} <br>
                                    @else
                                    {{ '' }}
                                    @endif
                                </td>
    
                                <td>
                                    @if($fri[$index]->subject_code !== null && $fri[$index]->status !== 'pending')
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
                <div>
                    <button type="button" class="btn btn-default" id="printTimetable">
                        Print
                </button>
            </div>
        </div>
    
            <!-- <a class="btn btn-default" href="{{route('printTimetable')}}" target="_blank">
                        Print
                    </a> -->
        @endcan
    
        @cannot('student')
      <div>
      <div class="cd-schedule cd-schedule--loading margin-top--lg margin-bottom--lg js-cd-schedule lecturer-schedule">
        <div class="cd-schedule__timeline">
          <ul>
            <li><span>07:00</span></li>
            <li><span>07:30</span></li>
            <li><span>08:00</span></li>
            <li><span>08:30</span></li>
            <li><span>09:00</span></li>
            <li><span>09:30</span></li>
            <li><span>10:00</span></li>
            <li><span>10:30</span></li>
            <li><span>11:00</span></li>
            <li><span>11:30</span></li>
            <li><span>12:00</span></li>
            <li><span>12:30</span></li>
            <li><span>13:00</span></li>
            <li><span>13:30</span></li>
            <li><span>14:00</span></li>
            <li><span>14:30</span></li>
            <li><span>15:00</span></li>
            <li><span>15:30</span></li>
            <li><span>16:00</span></li>
            <li><span>16:30</span></li>
            <li><span>17:00</span></li>
            <li><span>17:30</span></li>
            <li><span>18:00</span></li>
            <li><span>18:30</span></li>
            <li><span>19:00</span></li>
            <li><span>19:30</span></li>
            <li><span>20:00</span></li>
            <li><span>20:30</span></li>
            <li><span>21:00</span></li>
          </ul>
        </div> <!-- .cd-schedule__timeline -->
      
        <div class="cd-schedule__events">
          <ul>
            <li class="cd-schedule__group">
              <div class="cd-schedule__top-info"><span>Monday</span></div>
      
              <ul>
                @php
                $count = 0;
                @endphp
                @foreach (range(0, count($fmon) - 1) as $index)
                @if(isset($fmon[$index]->subject_code) && isset($fmon[$index]->user_name))
                @php
                $count ++;
                if($count > 4)
                {
                    $count = 1;
                    $count ++;
                }
                @endphp
                <li class="cd-schedule__event">
                  <a data-start="{{$fmon[$index]->start_time}}" data-end="{{$fmon[$index]->end_time}}" data-content="event-{{$fmon[$index]->subject_name}}" data-event="event-{{$count}}" href="#0">
                    <em class="cd-schedule__name">Subject: {{ $fmon[$index]->subject_name }}</em>
                    <em class="cd-schedule__name">Venue: {{ $fmon[$index]->venue_name }}</em>
                    <em class="cd-schedule__name">Level: {{ $fmon[$index]->study_level_name }}</em>
                    @if($fmon[$index]->status == 'pending')
                    <em><span class='label label-warning'>Request Still Not Approved</span></em>
                    @endif
                  </a>
                </li>
                @endif
                @endforeach
              </ul>
            </li>
      
            <li class="cd-schedule__group">
              <div class="cd-schedule__top-info"><span>Tuesday</span></div>
      
              <ul>
                 @php
                $count = 0;
                @endphp
                @foreach (range(0, count($ftue) - 1) as $index)
                @if(isset($ftue[$index]->subject_code) && isset($ftue[$index]->user_name))
                @php
                $count ++;
                if($count > 4)
                {
                    $count = 1;
                    $count ++;
                }
                @endphp
                <li class="cd-schedule__event">
                  <a data-start="{{$ftue[$index]->start_time}}" data-end="{{$ftue[$index]->end_time}}" data-content="event-{{$ftue[$index]->subject_name}}" data-event="event-{{$count}}" href="#0">
                  <em class="cd-schedule__name">Subject: {{ $ftue[$index]->subject_name }}</em>
                    <em class="cd-schedule__name">Venue: {{ $ftue[$index]->venue_name }}</em>
                    <em class="cd-schedule__name">Level: {{ $ftue[$index]->study_level_name }}</em>
                    @if($ftue[$index]->status == 'pending')
                    <em><span class='label label-warning'>Request Still Not Approved</span></em>
                    @endif
                  </a>
                </li>
                @endif
                @endforeach
              </ul>
            </li>
      
            <li class="cd-schedule__group">
              <div class="cd-schedule__top-info"><span>Wednesday</span></div>
      
              <ul>
                 @php
                $count = 0;
                @endphp
                @foreach (range(0, count($fwed) - 1) as $index)
                @if(isset($fwed[$index]->subject_code) && isset($fwed[$index]->user_name))
                @php
                $count ++;
                if($count > 4)
                {
                    $count = 1;
                    $count ++;
                }
                @endphp
                <li class="cd-schedule__event">
                  <a data-start="{{$fwed[$index]->start_time}}" data-end="{{$fwed[$index]->end_time}}" data-content="event-{{$fwed[$index]->subject_name}}" data-event="event-{{$count}}" href="#0">
                  <em class="cd-schedule__name">Subject: {{ $fwed[$index]->subject_name }}</em>
                    <em class="cd-schedule__name">Venue: {{ $fwed[$index]->venue_name }}</em>
                    <em class="cd-schedule__name">Level: {{ $fwed[$index]->study_level_name }}</em>
                    @if($fwed[$index]->status == 'pending')
                    <em><span class='label label-warning'>Request Still Not Approved</span></em>
                    @endif
                  </a>
                </li>
                @endif
                @endforeach
              </ul>
            </li>
      
            <li class="cd-schedule__group">
              <div class="cd-schedule__top-info"><span>Thursday</span></div>
      
              <ul>
                 @php
                $count = 0;
                @endphp
                @foreach (range(0, count($fthu) - 1) as $index)
                @if(isset($fthu[$index]->subject_code) && isset($fthu[$index]->user_name))
                @php
                $count ++;
                if($count > 4)
                {
                    $count = 1;
                    $count ++;
                }
                @endphp
                <li class="cd-schedule__event">
                  <a data-start="{{$fthu[$index]->start_time}}" data-end="{{$fthu[$index]->end_time}}" data-content="event-{{$fthu[$index]->subject_name}}" data-event="event-{{$count}}" href="#0">
                  <em class="cd-schedule__name">Subject: {{ $fthu[$index]->subject_name }}</em>
                    <em class="cd-schedule__name">Venue: {{ $fthu[$index]->venue_name }}</em>
                    <em class="cd-schedule__name">Level: {{ $fthu[$index]->study_level_name }}</em>
                    @if($fthu[$index]->status == 'pending')
                    <em><span class='label label-warning'>Request Still Not Approved</span></em>
                    @endif
                  </a>
                </li>
                @endif
                @endforeach
              </ul>
            </li>
      
            <li class="cd-schedule__group">
              <div class="cd-schedule__top-info"><span>Friday</span></div>
      
              <ul>
                 @php
                $count = 0;
                @endphp
                @foreach (range(0, count($ffri) - 1) as $index)
                @if(isset($ffri[$index]->subject_code) && isset($ffri[$index]->user_name))
                @php
                $count ++;
                if($count > 4)
                {
                    $count = 1;
                    $count ++;
                }
                @endphp
                <li class="cd-schedule__event">
                  <a data-start="{{$ffri[$index]->start_time}}" data-end="{{$ffri[$index]->end_time}}" data-content="event-{{$ffri[$index]->subject_name}}" data-event="event-{{$count}}" href="#0">
                  <em class="cd-schedule__name">Subject: {{ $ffri[$index]->subject_name }}</em>
                    <em class="cd-schedule__name">Venue: {{ $ffri[$index]->venue_name }}</em>
                    <em class="cd-schedule__name">Level: {{ $ffri[$index]->study_level_name }}</em>
                    @if($ffri[$index]->status == 'pending')
                    <br>
                    <span class='label label-warning'>Request Still Not Approved</span>
                    @endif
                  </a>
                </li>
                @endif
                @endforeach
              </ul>
            </li>
          </ul>
        </div>
      
            <div class="cd-schedule-modal">
              <header class="cd-schedule-modal__header">
                <div class="cd-schedule-modal__content">
                  <span class="cd-schedule-modal__date"></span>
                  <h3 class="cd-schedule-modal__name"></h3>
                </div>
          
                <div class="cd-schedule-modal__header-bg"></div>
              </header>
          
              <div class="cd-schedule-modal__body">
                <div class="cd-schedule-modal__event-info"></div>
                <div class="cd-schedule-modal__body-bg"></div>
              </div>
          
              <a href="#0" class="cd-schedule-modal__close text--replace">Close</a>
            </div>
      
            <div class="cd-schedule__cover-layer"></div>
            </div> <!-- .cd-schedule -->
    
            <div>
                <button type="button" class="btn btn-default" id="printLecturerTimetable">
                    Print
                </button>
                <div id="root"></div>
            </div>
        </div>
        @endcannot
    </div>

    </div>

    <script type="text/javascript">
    @can('student')
        var level = "{{$level->name}} Timetable"
    @endcan()
        var user = "{{$user}} Timetable"
        $('#printTimetable').on("click", function () {
              $('.table').printThis({
                base: true,
                importCSS: true,
                header: null,
                footer: null,
                pageTitle: level.toUpperCase()
              });
            });

        $('#printLecturerTimetable').on("click", function () {
              $('.lecturer-schedule').printThis({
                base: true,
                importCSS: true,
                header: null,
                footer: null,
                pageTitle: user.toUpperCase()
              });
            });

        $('#search_box').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url: '{{ route("searchResults") }}',
                type: 'GET',
                data: {'q': $('#q').val()},
                success: function(data){
                    $('.default-content').load(encodeURI('/timeTable/searchResults?q='+$('#q').val()));
                },
                error: function(data){
                    console.log(data);
                },

            });
        });
        </script>
@endsection