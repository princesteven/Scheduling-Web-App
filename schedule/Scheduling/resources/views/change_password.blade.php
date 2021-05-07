@extends('layouts.template')
@section('title','Change Password')
@section('step','Security')
@section('description','Change Password')
@section('active_passwordlink', 'active')

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Change Password</h5>
    </div>
    <div class="ibox-content">

        <form class="form-horizontal ng-pristine ng-valid" method="post" accept-charset="utf-8">
        	@csrf
        <div class="form-group">
        	<label class="col-lg-3 control-label">Old Password : <span class="required">*</span></label>

            <div class="col-lg-8">
                <input type="password" class="form-control" name="old" required>
            </div>
        </div>

        <div class="form-group">
        	<label class="col-lg-3 control-label">New Password : <span class="required">*</span></label>

            <div class="col-lg-8">
                <input type="password" class="form-control" name="new" required>
             </div>
        </div>

        <div class="form-group">
        	<label class="col-lg-3 control-label">Confirm Password : <span class="required">*</span></label>

            <div class="col-lg-8">
                <input type="password" class="form-control" name="new_confirm" required>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-8">
                <input class="btn btn-sm btn-success" type="submit" value="Change Password"/>
            </div>
        </div>
        </form>

        </div>
</div>

@endsection