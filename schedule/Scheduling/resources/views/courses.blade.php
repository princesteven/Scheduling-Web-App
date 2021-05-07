@extends('layouts.template')
@section('title','Courses')
@section('step','Courses')
@section('description','Manage Courses')
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
                    <th>Department</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($courses as $course)
                  <tr class="course_details">
                    <td style="text-align:center" data-id="{{ $course->c_id }}">
                    <input type="checkbox" name="checkbox" value="{{ $course->c_id }}">
                    </td>
                    <td>{{ $course->c_code }}</td>
                    <td>{{ $course->c_name }}</td>
                    <td data-dept="{{ $course->d_id}}">{{ $course->d_name }}</td>
                    <td style="text-align:center"> 
                      <button class="btn edit" data-toggle="modal" data-target="#edit_course" style="background-color: #8CAEC7;">
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
        <!-- Create Course Modal -->
 <div class="modal fade" id="create_venue">
          <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                     <h3 class="modal-title">Add Course</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
              </div>
              <form method="post" action="{{route('createCourse')}}">
                @csrf
              <div class="modal-body">
                    <div class="form-group ">
                        <label>Course</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="form-group ">
                      <label>Code</label>
                      <input type="text" class="form-control" name="code" required>
                    </div>

                    <div class="form-group">
                      <label>Department</label>
                       <select class="form-control" name="department" style="width: 100%;" required>
                         <option value="">Choose department</option>
                         @foreach($departments as $department)
                         <option value="{{ $department->id }}">{{ $department->name }}</option>
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

        <!-- Edit Courses -->
    <div class="modal fade" id="edit_course">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title">Edit Course</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <form method="post" action="{{route('editCourse')}}">
                @csrf
              <div class="modal-body">
                    <div class="form-group ">
                        <label>Course</label>
                        <input type="hidden"  name="id">
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="form-group ">
                      <label>Code</label>
                      <input type="text" class="form-control" name="code" required>
                    </div>

                    <div class="form-group">
                    <label>Department</label>
                       <select class="form-control select" name="department" style="width: 100%;" required id="dpt">
                         <option value="">Choose department</option>
                         @foreach($departments as $department)
                         <option value="{{ $department->id }}">{{ $department->name }}</option>
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
               const dept = rows.eq(3).data("dept")
               $('input[name="id"').val(id);
               $('input[name="code"').val(code);
               $('input[name="name"]').val(name);
               $('#dpt').val(dept)
             
             })
        </script>
        <script >
            $(function(){
                const token = $('#csrf').html()
                deletePlugin.init("{{route('deleteCourse')}}", "Courses", token)
            })
            </script>
@endsection