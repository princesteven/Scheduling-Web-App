@extends('layouts.template')
@section('title','Time')
@section('step','Time Slots')
@section('description','Manage Time Slots')
@section('active_mainlink', 'active')

@section('content')
        @php
        $sn = 0;
        @endphp
          <div class="ibox">
            <div class="ibox-title"></div><!-- /.box-header -->
            <div class="ibox-content">
                <table class="table table-bordered table-striped myTables">
                  <thead>
                  <tr>
                    <th style="text-align:center" >
                       <input type="checkbox" name="checkAll">
                    </th>
                    <th>SN</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($times as $time)
                  @php
			      $sn ++;
			      @endphp
                  <tr class="time_details">
                    <td style="text-align:center" data-id="{{ $time->id }}">
                    <input type="checkbox" name="checkbox" value="{{ $time->id }}">
                    </td>
                    <td>{{ $sn }}</td>
                    <td>{{ $time->start_time }}</td>
                    <td>{{ $time->end_time }}</td>
                    <td style="text-align:center"> 
                      <button class="btn edit" data-toggle="modal" data-target="#edit_time" style="background-color: #8CAEC7;">
                        <i class="fa fa-edit"></i>
                      </button>
                    </td>
                  </tr>
                  @endforeach
                  
                  </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="ibox-footer clearfix">
              <div id="csrf">
                 @csrf
              </div>
            </div>
            <!-- /.box-footer -->
          </div>
        <!-- Create Time Modal -->
 <div class="modal fade" id="create_venue">
          <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
               <h3 class="modal-title">Add Time</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
              </div>
              <form method="post" action="{{route('createTime')}}">
                @csrf
              <div class="modal-body">
              	<div class="bootstrap-timepicker">
                    <div class="form-group">
                        <label>Start Time</label>
                        <input type="text" class="form-control timepicker" name="start_time" required>
                    </div>
                    <div class="form-group">
                        <label>End Time</label>
                        <input type="text" class="form-control timepicker" name="end_time" required>
                    </div>
              	</div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
                Close
                </button>
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
            </form>
            </div>
          </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->

        <!-- Edit Times -->
    <div class="modal fade" id="edit_time">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
              <h3 class="modal-title">Edit Time</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <form method="post" action="{{route('editTime')}}">
                @csrf
              <div class="modal-body">
                <div class="bootstrap-timepicker">
                    <div class="form-group ">
                        <label>Start Time</label>
                         <input type="hidden"  name="id">
                        <input type="text" class="form-control timepicker" name="start_time" required>
                    </div>
                    <div class="form-group ">
                        <label>End Time</label>
                        <input type="text" class="form-control timepicker" name="end_time" required>
                    </div>
                  </div>
              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
                </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <script>
             $('.edit').on('click',function(){
               rows = $(this).closest('tr').children();
               const id = rows.eq(0).data('id');
               const start_time = rows.eq(2).text()
               const end_time = rows.eq(3).text()
               $('input[name="id"').val(id);
               $('input[name="start_time"').val(start_time);
               $('input[name="end_time"').val(end_time);
             
             })
        </script>
        <script >
            $(function(){
                const token = $('#csrf').html()
                deletePlugin.init("{{route('deleteTime')}}", "Time", token)
            })
            </script>
@endsection