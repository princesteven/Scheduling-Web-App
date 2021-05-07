@extends('layouts.template')
@section('title','Faculties')
@section('step','Faculties')
@section('description','Manage Faculties')
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
                    <th>Name</th>
                    <th>IDNo</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Position</th>
                    <th>Salutation</th>
                    <th>Department</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($faculties as $faculty)
                  <tr class="faculty_details">
                    <td style="text-align:center" data-id="{{ $faculty->id }}">
                    <input type="checkbox" name="checkbox" value="{{ $faculty->id }}">
                    </td>
                   <td>{{ $faculty->name }}</td>
                    <td>{{ $faculty->regno }}</td>
                    <td>{{ $faculty->email }}</td>
                    <td>{{ $faculty->mobile }}</td>
                    <td>{{ $faculty->privilage }}</td>
                    <td data-rank="{{ $faculty->r_id}}">{{ $faculty->r_name }}</td>
                    <td data-dept="{{ $faculty->d_id}}">{{ $faculty->d_name }}</td>
                    <input type="hidden" name="text" data-gender="{{ $faculty->gender}}" id="input_gender" >
                    <input type="hidden" name="text" data-category="{{ $faculty->category_id}}" id="input_faculty_category" >
                    <td style="text-align:center"> 
                      <button class="btn edit" data-toggle="modal" data-target="#edit_faculty" style="background-color: #8CAEC7;">
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
        <!-- Create Faculty Modal -->
 <div class="modal fade" id="create_venue">
          <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
               <h3 class="modal-title">Add Faculty</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
              </div>
              <form method="post" action="{{route('createFaculty')}}">
                @csrf
              <div class="modal-body">
                    <div class="form-group ">
                        <label>Faculty</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="form-group ">
                      <label>IDNo</label>
                      <input type="text" class="form-control" name="regno" required>
                    </div>

                    <div class="form-group ">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" required>
                    </div>

                    <div class="form-group ">
                      <label>Mobile</label>
                      <input type="text" class="form-control" name="mobile" required>
                    </div>

                    <div class="form-group">
                       <select class="form-control" name="gender" style="width: 100%;" required >
                         <option value="">Gender</option>
                         <option value="Male">{{ 'Male' }}</option>
                         <option value="Female">{{ 'Female' }}</option>
                       </select>

                    </div>

                    <div class="form-group">
                       <select class="form-control" name="department" style="width: 100%;" required>
                         <option value="">Department</option>
                         @foreach($departments as $department)
                         <option value="{{ $department->id }}">{{ $department->name }}</option>
                         @endforeach
                       </select>

                    </div>

                    <div class="form-group">
                       <select class="form-control" name="rank" style="width: 100%;" required>
                         <option value="">Salutation</option>
                         @foreach($ranks as $rank)
                         <option value="{{ $rank->id }}">{{ $rank->name }}</option>
                         @endforeach
                       </select>

                    </div>

                    <div class="form-group">
                       <select class="form-control" name="category" style="width: 100%;" required>
                         <option value="">Faculty Category</option>
                         @foreach($categories as $category)
                         <option value="{{ $category->id }}">{{ $category->name }}</option>
                         @endforeach
                       </select>

                    </div>

                    <div class="form-group">
                       <select class="form-control" name="privilage" style="width: 100%;" required>
                         <option value="">Assign Privilage</option>
                         <option value="hod">{{ 'Hod' }}</option>
                         <option value="faculty">{{ 'Faculty' }}</option>
                         <option value="admin">{{ 'Timetable Admin' }}</option>
                         <option value="timetabler">{{ 'Timetable Officer' }}</option>
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

        <!-- Edit Faculties -->
    <div class="modal fade" id="edit_faculty">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
              <h3 class="modal-title">Edit Faculty</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <form method="post" action="{{route('editFaculty')}}">
                @csrf
              <div class="modal-body">
                    <div class="form-group ">
                        <label>Faculty</label>
                        <input type="hidden"  name="id">
                        <input type="text" class="form-control" name="name" required>
                    </div>

                    <div class="form-group ">
                      <label>IDNo</label>
                      <input type="text" class="form-control" name="regno" required>
                    </div>

                    <div class="form-group ">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" required>
                    </div>

                    <div class="form-group ">
                      <label>Mobile</label>
                      <input type="text" class="form-control" name="mobile" required>
                    </div>

                    <div class="form-group">
                    <label>Gender</label>
                       <select class="form-control" name="gender" style="width: 100%;" required id="gender">
                         <option value="">Gender</option>
                         <option value="Male">{{ 'Male' }}</option>
                         <option value="Female">{{ 'Female' }}</option>
                       </select>

                    </div>

                    <div class="form-group">
                    <label>Department</label>
                       <select class="form-control" name="department" style="width: 100%;" required id="departments">
                         <option value="">Department</option>
                         @foreach($departments as $department)
                         <option value="{{ $department->id }}">{{ $department->name }}</option>
                         @endforeach
                       </select>

                    </div>

                    <div class="form-group">
                    <label>Salutation</label>
                       <select class="form-control" name="rank" style="width: 100%;" required id="ranks">
                         <option value="">Salutation</option>
                         @foreach($ranks as $rank)
                         <option value="{{ $rank->id }}">{{ $rank->name }}</option>
                         @endforeach
                       </select>

                    </div>

                    <div class="form-group">
                    <label>Faculty Category</label>
                       <select class="form-control" name="category" style="width: 100%;" required id="facultCategories">
                         <option value="">Faculty Category</option>
                         @foreach($categories as $category)
                         <option value="{{ $category->id }}">{{ $category->name }}</option>
                         @endforeach
                       </select>

                    </div>

                    <div class="form-group">
                    <label>Faculty Privilage</label>
                       <select class="form-control" name="privilage" style="width: 100%;" required id="privilages">
                         <option value="">Assign Privilage</option>
                         <option value="hod">{{ 'Hod' }}</option>
                         <option value="faculty">{{ 'Faculty' }}</option>
                         <option value="admin">{{ 'Timetable Admin' }}</option>
                         <option value="timetabler">{{ 'Timetable Officer' }}</option>
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
               const name = rows.eq(1).text();
               const regno = rows.eq(2).text();
               const email = rows.eq(3).text();
               const mobile = rows.eq(4).text();
               const privilage = rows.eq(5).text();
               const rank = rows.eq(6).data("rank")
               const department = rows.eq(7).data("dept")
               const gender = $('#input_gender').data("gender")
               const faculty_category = $('#input_faculty_category').data("category")
               $('input[name="id"').val(id);
               $('input[name="name"').val(name);
               $('input[name="regno"').val(regno);
               $('input[name="email"').val(email);
               $('input[name="mobile"').val(mobile);
               $('#departments').val(department)
               $('#ranks').val(rank)
               $("#privilages").val(privilage)
               $("#gender").val(gender)
               $("#facultCategories").val(faculty_category)
             
             })
        </script>
        <script >
            $(function(){
                const token = $('#csrf').html()
                deletePlugin.init("{{route('deleteFaculty')}}", "Faculties", token)
            })
            </script>
@endsection