@extends('layouts.template')
@section('title','Venues')
@section('step','Venues')
@section('description','Manage Venues')
@section('active_mainlink', 'active')

@section('content')
        
          <div class="ibox">
            <div class="ibox-title"></div><!-- /.box-header -->
            <div class="ibox-content">
                <table class="table table-bordered table-striped myTables">
                  <thead>
                  <tr>
                    <th style="text-align:center" >
                       <input type="checkbox" name="checkAll">
                    </th>
                    <th>Wing</th>
                    <th>Name</th>
                    <th>Capacity</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($venues as $venue)
                  <tr class="venue_details">
                    <td style="text-align:center" data-id="{{ $venue->v_id }}">
                    <input type="checkbox" name="checkbox" value="{{ $venue->v_id }}">
                    </td>
                    <td data-wing="{{ $venue->w_id}}">{{ $venue->w_name }}</td>
                    <td>{{ $venue->v_name }}</td>
                    <td>{{ $venue->capacity }}</td >
                    <td style="text-align:center"> 
                      <button class="btn edit" data-toggle="modal" data-target="#edit_venue" style="background-color: #8CAEC7;">
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
        <!-- Create Venue Modal -->
 <div class="modal fade" id="create_venue">
          <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
               <h3 class="modal-title">Add Venu</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
              </div>
              <form method="post" action="{{route('createVenue')}}">
                @csrf
              <div class="modal-body">
                    <div class="form-group ">
                        <label>Venue</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                     <div class="form-group">
                        <label>Capacity</label>
                        <input type="number" class="form-control" min=1 name="capacity" required>
                    </div>
                    <div class="form-group">
                       <select class="form-control" name="wing" style="width: 100%;" required>
                         <option value="">Choose wing</option>
                         @foreach($wings as $wing)
                         <option value="{{ $wing->id }}">{{ $wing->name }}</option>
                         @endforeach
                       </select>
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

        <!-- Edit Venues -->
    <div class="modal fade" id="edit_venue">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
              <h3 class="modal-title">Edit Venue</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <form method="post" action="{{route('editVenue')}}">
                @csrf
              <div class="modal-body">
                    <div class="form-group ">
                        <label>Venue</label>
                         <input type="hidden"  name="id">
                        <input type="text" class="form-control" name="name" required>
                    </div>
                     <div class="form-group">
                        <label>Capacity</label>
                        <input type="number" class="form-control" min=1 name="capacity" required>
                    </div>
                    <div class="form-group">
                    <label>Wing</label>
                       <select class="form-control" name="wing" style="width: 100%;" required id="wings">
                         <option value="">Choose wing</option>
                         @foreach($wings as $wing)
                         <option value="{{ $wing->id }}">{{ $wing->name }}</option>
                         @endforeach
                       </select>
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
               const wing = rows.eq(1).data('wing');
               const venue = rows.eq(2).text()
               const capacity = rows.eq(3).text()
               $('input[name="id"').val(id);
               $('input[name="name"').val(venue);
               $('input[name="capacity"').val(capacity);
               $('#wings').val(wing)
            
             
             })
        </script>
        <script >
            $(function(){
                const token = $('#csrf').html()
                deletePlugin.init("{{route('deleteVenue')}}", "Venues", token)
            })
            </script>
@endsection