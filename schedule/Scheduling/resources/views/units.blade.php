@extends('layouts.template')
@section('title','Units')
@section('step','Credits')
@section('description','Manage Subject Credits')
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
                    <th># of Credits</th>
                    <th>Periods per Week</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($units as $unit)
                  @php
            $sn ++;
            @endphp
                  <tr class="unit_details">
                    <td style="text-align:center" data-id="{{ $unit->id }}">
                    <input type="checkbox" name="checkbox" value="{{ $unit->id }}">
                    </td>
                    <td>{{ $sn }}</td>
                    <td>{{ $unit->name }}</td>
                    <td>{{ $unit->periods_per_week }}</td>
                    <td style="text-align:center"> 
                      <button class="btn edit" data-toggle="modal" data-target="#edit_unit" style="background-color: #8CAEC7;">
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
        <!-- Create unit Modal -->
 <div class="modal fade" id="create_venue">
          <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
               <h3 class="modal-title">Add Unit</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
              </div>
              <form method="post" action="{{route('createUnit')}}">
                @csrf
              <div class="modal-body">
                    <div class="form-group ">
                        <label>Unit</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group ">
                        <label>Periods per Week</label>
                        <input type="text" class="form-control" name="ppw" required>
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

        <!-- Edit Units -->
    <div class="modal fade" id="edit_unit">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
              <h3 class="modal-title">Edit Unit</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <form method="post" action="{{route('editUnit')}}">
                @csrf
              <div class="modal-body">
                    <div class="form-group ">
                        <label>Unit</label>
                         <input type="hidden"  name="id">
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group ">
                        <label>Periods per Week</label>
                        <input type="text" class="form-control" name="ppw" required>
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
               const unit = rows.eq(2).text()
               const ppw = rows.eq(3).text()
               $('input[name="id"').val(id);
               $('input[name="name"').val(unit);
               $('input[name="ppw"').val(ppw);
             
             })
        </script>
        <script >
            $(function(){
                const token = $('#csrf').html()
                deletePlugin.init("{{route('deleteUnit')}}", "Units", '@csrf')
            })
            </script>
@endsection