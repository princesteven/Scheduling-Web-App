@extends('layouts.template')
@section('title','Department Timetable')
@section('step','View Timetable')
@section('description','View Department Timetable')
@section('active_mainlink', 'active')

@section('content')
<div style="overflow-x:visible; width: 100%;">
    <table class="table table-bordered table-striped table-responsive" style="margin-right:-10px;margin-top: 8px;">
        <thead>
            <td colspan='2'>Venue Name</td>
            @foreach($venues as $venue)
            <td>{{$venue->name}}</td>
            @endforeach
        </thead>
        <thead>
            <td colspan="2">Venue Capacity</td>
            @foreach($venues as $venue)
            <td>{{$venue->capacity}}</td>
            @endforeach
        </thead>
        <tr>
            <td rowspan="{{count($times) + 1}}" style="background-color: #FDFDFD;">Monday</td>           
        </tr>
        @foreach($times as $time)
        <tr>  
            <td>{{$time->start_time}} - {{$time->end_time}}</td>
            @foreach($venues as $venue)
                @foreach($monday as $mon)
                    @if($mon->start_time == $time->start_time && $mon->venue_name == $venue->name && $mon->status == null)
                        @php
                        $subject_name = $mon->subject_name;
                        $venue_name = $mon->venue_name;
                        @endphp
                    @endif
                @endforeach
                @if(isset($subject_name))
                    <td>{{$subject_name}}, {{$venue_name}}</td>
                @else
                    <td> </td>
                @endif
                @php
                    unset($subject_name);
                @endphp
            @endforeach
        </tr>
        @endforeach
        <tr>
            <td rowspan="{{count($times) + 1}}" style="background-color: #FDFDFD;">Tuesday</td>           
        </tr>
        @foreach($times as $time)
        <tr>  
            <td>{{$time->start_time}} - {{$time->end_time}}</td>
            @foreach($venues as $venue)
                @foreach($tuesday as $tue)
                    @if($tue->start_time == $time->start_time && $tue->venue_name == $venue->name && $mon->status == null)
                        @php
                        $subject_name = $tue->subject_name;
                        $venue_name = $tue->venue_name;
                        @endphp
                    @endif
                @endforeach
                @if(isset($subject_name))
                    <td>{{$subject_name}}, {{$venue_name}}</td>
                @else
                    <td> </td>
                @endif
                @php
                    unset($subject_name);
                @endphp
            @endforeach
        </tr>
        @endforeach
        <tr>
            <td rowspan="{{count($times) + 1}}" style="background-color: #FDFDFD;">Wednesday</td>
        </tr>
        @foreach($times as $time)
        <tr>  
            <td>{{$time->start_time}} - {{$time->end_time}}</td>
            @foreach($venues as $venue)
                @foreach($wednesday as $wed)
                    @if($wed->start_time == $time->start_time && $wed->venue_name == $venue->name && $mon->status == null)
                        @php
                        $subject_name = $wed->subject_name;
                        $venue_name = $wed->venue_name;
                        @endphp
                    @endif
                @endforeach
                @if(isset($subject_name))
                    <td>{{$subject_name}}, {{$venue_name}}</td>
                @else
                    <td> </td>
                @endif
                @php
                    unset($subject_name);
                @endphp
            @endforeach
        </tr>
        @endforeach
        <tr>
            <td rowspan="{{count($times) + 1}}" style="background-color: #FDFDFD;">Thursday</td>
        </tr>
        @foreach($times as $time)
        <tr>  
            <td>{{$time->start_time}} - {{$time->end_time}}</td>
            @foreach($venues as $venue)
                @foreach($thursday as $thu)
                    @if($thu->start_time == $time->start_time && $thu->venue_name == $venue->name && $mon->status == null)
                        @php
                        $subject_name = $thu->subject_name;
                        $venue_name = $thu->venue_name;
                        @endphp
                    @endif
                @endforeach
                @if(isset($subject_name))
                    <td>{{$subject_name}}, {{$venue_name}}</td>
                @else
                    <td> </td>
                @endif
                @php
                    unset($subject_name);
                @endphp
            @endforeach
        </tr>
        @endforeach
        <tr>
            <td rowspan="{{count($times) + 1}}" style="background-color: #FDFDFD;">Friday</td>
        </tr>
        @foreach($times as $time)
        <tr>  
            <td>{{$time->start_time}} - {{$time->end_time}}</td>
            @foreach($venues as $venue)
                @foreach($friday as $fri)
                    @if($fri->start_time == $time->start_time && $fri->venue_name == $venue->name && $mon->status == null)
                        @php
                        $subject_name = $fri->subject_name;
                        $venue_name = $fri->venue_name;
                        @endphp
                    @endif
                @endforeach
                @if(isset($subject_name))
                    <td>{{$subject_name}}, {{$venue_name}}</td>
                @else
                    <td> </td>
                @endif
                @php
                    unset($subject_name);
                @endphp
            @endforeach
        </tr>
        @endforeach
        <thead>
            <td colspan='2'>Venue Name</td>
            @foreach($venues as $venue)
            <td>{{$venue->name}}</td>
            @endforeach
        </thead>
        <thead>
            <td colspan="2">Venue Capacity</td>
            @foreach($venues as $venue)
            <td>{{$venue->capacity}}</td>
            @endforeach
        </thead>
    </table>
    <div>
        <button type="button" class="btn btn-default" id="printDepartmentTimetable">
            Print
        </button>
    </div>
</div>
<script type="text/javascript">
        var department = "{{$department->name}} DEPARTMENT TIMETABLE"
        $('#printDepartmentTimetable').on("click", function () {
              $('.table').printThis({
                base: true,
                importCSS: true,
                header: null,
                footer: null,
                pageTitle: department.toUpperCase()
              });
            });
</script>
@endsection