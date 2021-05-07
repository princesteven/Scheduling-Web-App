
<div style="padding-top: 40px;">
	@if(count($searchResults) > 0)
	<div>
		<h3 style="text-align: center;">Timetable For: {{ ucwords($searchItem) }}</h3>
	</div>
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
                @foreach (range(0, count($mon) - 1) as $index)
                @if(isset($mon[$index]->subject_code) && isset($mon[$index]->user_name))
                @php
                $count ++;
                if($count > 4)
                {
                    $count = 1;
                    $count ++;
                }
                @endphp
                <li class="cd-schedule__event">
                  <a data-start="{{$mon[$index]->start_time}}" data-end="{{$mon[$index]->end_time}}" data-content="event-{{$mon[$index]->subject_name}}" data-event="event-{{$count}}" href="#0">
                    <em class="cd-schedule__name">{{ $mon[$index]->subject_name }}</em>
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
                @foreach (range(0, count($tue) - 1) as $index)
                @if(isset($tue[$index]->subject_code) && isset($tue[$index]->user_name))
                @php
                $count ++;
                if($count > 4)
                {
                    $count = 1;
                    $count ++;
                }
                @endphp
                <li class="cd-schedule__event">
                  <a data-start="{{$tue[$index]->start_time}}" data-end="{{$tue[$index]->end_time}}" data-content="event-{{$tue[$index]->subject_name}}" data-event="event-{{$count}}" href="#0">
                    <em class="cd-schedule__name">{{ $tue[$index]->subject_name }}</em>
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
                @foreach (range(0, count($wed) - 1) as $index)
                @if(isset($wed[$index]->subject_code) && isset($wed[$index]->user_name))
                @php
                $count ++;
                if($count > 4)
                {
                    $count = 1;
                    $count ++;
                }
                @endphp
                <li class="cd-schedule__event">
                  <a data-start="{{$wed[$index]->start_time}}" data-end="{{$wed[$index]->end_time}}" data-content="event-{{$wed[$index]->subject_name}}" data-event="event-{{$count}}" href="#0">
                    <em class="cd-schedule__name">{{ $wed[$index]->subject_name }}</em>
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
                @foreach (range(0, count($thu) - 1) as $index)
                @if(isset($thu[$index]->subject_code) && isset($thu[$index]->user_name))
                @php
                $count ++;
                if($count > 4)
                {
                    $count = 1;
                    $count ++;
                }
                @endphp
                <li class="cd-schedule__event">
                  <a data-start="{{$thu[$index]->start_time}}" data-end="{{$thu[$index]->end_time}}" data-content="event-{{$thu[$index]->subject_name}}" data-event="event-{{$count}}" href="#0">
                    <em class="cd-schedule__name">{{ $thu[$index]->subject_name }}</em>
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
                @foreach (range(0, count($fri) - 1) as $index)
                @if(isset($fri[$index]->subject_code) && isset($fri[$index]->user_name))
                @php
                $count ++;
                if($count > 4)
                {
                    $count = 1;
                    $count ++;
                }
                @endphp
                <li class="cd-schedule__event">
                  <a data-start="{{$fri[$index]->start_time}}" data-end="{{$fri[$index]->end_time}}" data-content="event-{{$fri[$index]->subject_name}}" data-event="event-{{$count}}" href="#0">
                    <em class="cd-schedule__name">{{ $fri[$index]->subject_name }}</em>
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
            </div>
            @endif

            @if(count($searchResults) < 1)
            <h1 style="text-align: center;">No Results For Item: {{ $searchItem }}</h1>
            @endif
</div>

<!-- util functions included in the CodyHouse framework -->
<script type="text/javascript" src="{{asset('js/util.js')}}"></script>
<script type="text/javascript" src="{{asset('js/main.js')}}"></script>