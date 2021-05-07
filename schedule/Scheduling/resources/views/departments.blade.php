@extends('layouts.template')
@section('title','Departments')
@section('step','Departments')
@section('description','Manage Departments')
@section('active_mainlink', 'active')

@section('content')
          <div class="ibox">
            <div class="ibox-title"></div><!-- /.ibox-header -->
            <div class="ibox-content">
                <table class="table table-bordered table-striped myTables">
                  <thead>
                  <tr>
                    <th style="text-align:center" >
                       <input type="checkbox" name="checkAll">
                    </th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>HoD</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($departments as $department)
                  <tr class="department_details">
                    <td style="text-align:center" data-id="{{ $department->d_id }}">
                    <input type="checkbox" name="checkbox" value="{{ $department->d_id }}">
                    </td>
                    <td>{{ $department->d_code }}</td>
                    <td>{{ $department->d_name }}</td>
                    <td data-user="{{ $department->user_id}}">{{ $department->name }}</td>
                    <td style="text-align:center"> 
                      <button class="btn edit" data-toggle="modal" data-target="#edit_department" style="background-color: #8CAEC7;">
                        <i class="fa fa-edit"></i>
                      </button>
                    </td>
                  </tr>
                  @endforeach
                  
                  </tbody>
                </table>
            </div>
            <!-- /.ibox-body -->
            <div class="ibox-footer clearfix">
              <div id="csrf">
                 @csrf
              </div>
            </div>
            <!-- /.ibox-footer -->
          </div>
        <!-- Create Department Modal -->
 <div class="modal fade" id="create_venue">
          <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
               <h3 class="modal-title">Add Department</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
              </div>
              <form method="post" action="{{route('createDepartment')}}">
                @csrf
              <div class="modal-body">
                    <div class="form-group ">
                        <label>Department</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="form-group ">
                      <label>Code</label>
                      <input type="text" class="form-control" name="code" required>
                    </div>

                    <div class="form-group">
                    <label>HoD</label>
                       <select class="form-control" name="hod" style="width: 100%;" >
                         <option value="">Choose HoD</option>
                         @foreach($users as $user)
                         <option value="{{ $user->id }}">{{ $user->name }}</option>
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

        <!-- Edit Departments -->
    <div class="modal fade" id="edit_department">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
              <h3 class="modal-title">Edit Department</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <form method="post" action="{{route('editDepartment')}}">
                @csrf
              <div class="modal-body">
                    <div class="form-group ">
                        <label>Department</label>
                        <input type="hidden"  name="id">
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="form-group ">
                      <label>Code</label>
                      <input type="text" class="form-control" name="code" required>
                    </div>

                    <div class="form-group">
                    <label>HoD</label>
                       <select class="form-control select" name="hod" style="width: 100%;" id="hod">
                         <option value="">Choose HoD</option>
                         @foreach($users as $user)
                         <option value="{{ $user->id }}">{{ $user->name }}</option>
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
               const code = rows.eq(1).text();
               const name = rows.eq(2).text();
               const hod = rows.eq(3).data("user")
               $('input[name="id"').val(id);
               $('input[name="code"').val(code);
               $('input[name="name"').val(name);
               $('#hod').val(hod)
             
             })
        </script>
        <script >
            $(function(){
                const token = $('#csrf').html()
                deletePlugin.init("{{route('deleteDepartment')}}", "Departments", token)
            })
            </script>
@endsection