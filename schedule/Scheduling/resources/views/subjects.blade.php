@extends('layouts.template')
@section('title','Subject')
@section('step','Subjects')
@section('description','Manage Subjects')
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
                    <th>Code</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Unit</th>
                    <th>Semister</th>
                    <th>Study Level</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($subjects as $subject)
                  <tr class="subject_details">
                    <td style="text-align:center" data-id="{{ $subject->s_id }}">
                    <input type="checkbox" name="checkbox" value="{{ $subject->s_id }}">
                    </td>
                    <td>{{ $subject->s_code }}</td>
                    <td>{{ $subject->s_name }}</td>
                    <td data-course="{{ $subject->c_id}}">{{ $subject->c_name }}</td>
                    <td data-unit="{{ $subject->unit_id}}">{{ $subject->unit_name }}</td >
                    <td data-semister="{{ $subject->semister_id}}">{{ $subject->semister }}</td >
                     <td data-level="{{ $subject->level_id}}">{{ $subject->level }}</td >
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
        <!-- Create Subject Modal -->
 <div class="modal fade" id="create_venue">
          <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
               <h3 class="modal-title">Add Subject</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
              </div>
              <form method="post" action="{{route('createSubject')}}">
                @csrf
              <div class="modal-body">
                    <div class="form-group ">
                        <label>Code</label>
                        <input type="text" class="form-control" name="code" required>
                    </div>
                    <div class="form-group ">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                     <div class="form-group">
                       <select class="form-control " name="course" style="width: 100%;" required>
                         <option value="">Choose course</option>
                         @foreach($courses as $course)
                       <option value="{{ $course->id }}">{{ $course->name}}</option>
                         @endforeach
                       </select>
                    </div>
                   <div class="form-group">
                       <select class="form-control " name="semester" style="width: 100%;" required>
                         <option value="">Choose semister</option>
                         @foreach($semisters as $semister)
                         <option value="{{ $semister->id }}">{{ $semister->name }}</option>
                         @endforeach
                       </select>
                    </div>
                    <div class="form-group">
                       <select class="form-control " name="unit" style="width: 100%;" required>
                         <option value="">Choose unit</option>
                         @foreach($units as $unit)
                         <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                         @endforeach
                       </select>
                    </div>
                    <div class="form-group">
                       <select class="form-control" name="level" style="width: 100%;" required>
                         <option value="">Choose Level</option>
                         @foreach($levels as $level)
                         <option value="{{ $level->id }}">{{ $level->name }}</option>
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

        <!-- Edit Subjects -->
   <div class="modal fade" id="edit_venue">
          <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
               <h3 class="modal-title">Edit Subject</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
              </div>
              <form method="post" action="{{route('editSubject')}}">
                @csrf
              <div class="modal-body">
                    <div class="form-group ">
                        <input type="hidden" class="form-control" name="id" required>
                        <label>Code</label>
                        <input type="text" class="form-control" name="code" required>
                    </div>
                    <div class="form-group ">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                      <div class="form-group">
                      <label>Subject Unit</label>
                       <select class="form-control " name="unit" style="width: 100%;" required id="units">
                         <option value="">Choose unit</option>
                         @foreach($units as $unit)
                         <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                         @endforeach
                       </select>
                    </div>
                     <div class="form-group">
                     <label>Course</label>
                       <select class="form-control" name="course" style="width: 100%;" required id="courses">
                         <option value="">Choose course</option>
                         @foreach($courses as $course)
                         <option value="{{ $course->id }}">{{ $course->name }}</option>
                         @endforeach
                       </select>
                    </div>
                   <div class="form-group">
                   <label>Semester</label>
                       <select class="form-control" name="semester" style="width: 100%;" required id="semisters">
                         <option value="">Choose semister</option>
                         @foreach($semisters as $semister)
                         <option value="{{ $semister->id }}">{{ $semister->name }}</option>
                         @endforeach
                       </select>
                    </div>
                    <div class="form-group">
                    <label>Level</label>
                       <select class="form-control" name="level" style="width: 100%;" required id="levels">
                         <option value="">Choose Level</option>
                         @foreach($levels as $level)
                         <option value="{{ $level->id }}">{{ $level->name }}</option>
                         @endforeach
                       </select>
                    </div>
              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
                Close
                </button>
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
            </form>
            </div>
          </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        <script>
             $('.edit').on('click',function(){
               rows = $(this).closest('tr').children();
               const id = rows.eq(0).data('id');
               const code = rows.eq(1).text()
               const name = rows.eq(2).text()
               const unit = rows.eq(4).data("unit")
               const course = rows.eq(3).data("course")
               const semister = rows.eq(5).data("semister")
               const level = rows.eq(6).data("level")
               $('input[name="id"').val(id);
               $('input[name="code"').val(code);
               $('input[name="name"').val(name);
               $("#units").val(unit)
               $("#courses").val(course)
               $("#semisters").val(semister)
               $("#levels").val(level)
             })
        </script>
        <script >
            $(function(){
                const token = $('#csrf').html()
                deletePlugin.init("{{route('deleteSubject')}}", "Subjects", token)
            })
            </script>
@endsection