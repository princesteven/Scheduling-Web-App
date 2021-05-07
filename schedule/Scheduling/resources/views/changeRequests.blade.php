@extends('layouts.template')
@section('title','Change Requests')
@section('step','Timetable')
@section('description','View Requests')
@section('active_mainlink', 'active')

@section('content')

@foreach($changes as $change)
<div class="ibox">
    <div class="ibox-title">
        <div class='row'>
            <h5 class='col-md-3 text-center'>Request From: {{$change->schedule_lecture}} &nbsp; </h5>
            <h5 class='col-md-3 text-center'>Subject: {{$change->schedule_subject}}</h5>
            <h5 class='col-md-3 text-center'>Course: {{$change->schedule_course}}</h5>
            <h5 class='col-md-3 text-center'>Level: {{$change->schedule_level}}</h5>
        </div>        
    </div>
    <div class="ibox-content">
        <div class='request_content row'>
            <div class='col-md-6'  style='padding-bottom: 10px;'>
                <h3 class='request-heading col-md-12 text-center'  style='padding-bottom: 10px;'><strong>Current Timetable</strong></h3>
                <h4 class="col-md-6 control-label">Time Slot : </h4>
                <h4 class="col-md-6 control-label">{{$change->schedule_start_time}} - {{$change->schedule_end_time}} </h4>
                <h4 class="col-md-6 control-label">Venue : </h4>
                <h4 class="col-md-6 control-label">{{$change->schedule_venue}} </h4>
                <h4 class="col-md-6 control-label">Day : </h4>
                <h4 class="col-md-6 control-label">{{$change->schedule_day}} </h4>
            </div>
            <div class='col-md-6' style='padding-bottom: 10px;'>
                <h3 class='request-heading col-md-12 text-center'  style='padding-bottom: 10px;'><strong>Requested Changes</strong></h3>
                <h4 class="col-md-6 control-label">Time Slot : </h4>
                <h4 class="col-md-6 control-label">{{$change->proposed_schedule_start_time}} - {{$change->proposed_schedule_end_time}} </h4>
                <h4 class="col-md-6 control-label">Venue : </h4>
                <h4 class="col-md-6 control-label">{{$change->proposed_schedule_venue}} </h4>
                <h4 class="col-md-6 control-label">Day : </h4>
                <h4 class="col-md-6 control-label">{{$change->proposed_schedule_day}} </h4>
            </div>

            <div class='col-md-6'>
                <div class='text-center'  style='padding-bottom: 10px;'>
                    <button type="button" class='btn btn-sm btn-success' data-toggle="modal" data-target="#acceptModal">Accept</button>
                </div>
            </div>

            <div class="modal inmodal" id="acceptModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <i class="fa fa-laptop modal-icon"></i>
                            <h4 class="modal-title">Confirm Action</h4>
                        </div>
                        <div class="modal-body">
                            <p><strong>Are you sure?</strong></p>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ action('TimeTableController@acceptChangeRequest') }}" method="post" class='col-md-6'>
                                @csrf
                                <input type="hidden" name="proposed_schedule_id" value="{{$change->proposed_schedule_id}}">
                                <input type="hidden" name="schedule_id" value="{{$change->schedule_id}}">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Accept Request</button>
                            </form>
                       </div>
                    </div>
            </div>
            </div>

            <div class='text-center'  style='padding-bottom: 10px;'>
                    <button type="button" class='btn btn-sm btn-danger' data-toggle="modal" data-target="#denyModal">Deny</button>
            </div>

            <div class="modal inmodal" id="denyModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content animated bounceInRight">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <i class="fa fa-laptop modal-icon"></i>
                            <h4 class="modal-title">Confirm Action</h4>
                        </div>
                        <div class="modal-body">
                            <p><strong>Are you sure?</strong></p>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ action('TimeTableController@denyChangeRequest') }}" method="post" class='col-md-6'>
                                @csrf
                                <input type="hidden" name="proposed_schedule_id" value="{{$change->proposed_schedule_id}}">
                                <input type="hidden" name="schedule_id" value="{{$change->schedule_id}}">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Deny Request</button>
                            </form>
                       </div>
                    </div>
            </div>
            
        </div>

    </div>
</div>
@endforeach

@endSection