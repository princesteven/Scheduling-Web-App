@extends('layouts.template')
@section('title','Ranks')
@section('step','Ranks')
@section('description','Manage Ranks')
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
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($ranks as $rank)
                  @php
			      $sn ++;
			      @endphp
                  <tr class="rank_details">
                    <td style="text-align:center" data-id="{{ $rank->id }}">
                    <input type="checkbox" name="checkbox" value="{{ $rank->id }}">
                    </td>
                    <td>{{ $sn }}</td>
                    <td>{{ $rank->name }}</td>
                    <td style="text-align:center"> 
                      <button class="btn edit" data-toggle="modal" data-target="#edit_rank" style="background-color: #8CAEC7;">
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
        <!-- Create Rank Modal -->
 <div class="modal fade" id="create_venue">
          <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
               <h3 class="modal-title">Add Rank</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
              </div>
              <form method="post" action="{{route('createRank')}}">
                @csrf
              <div class="modal-body">
                    <div class="form-group ">
                        <label>Rank</label>
                        <input type="text" class="form-control" name="name" required>
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

        <!-- Edit Ranks -->
    <div class="modal fade" id="edit_rank">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
              <h3 class="modal-title">Edit Rank</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
              <form method="post" action="{{route('editRank')}}">
                @csrf
              <div class="modal-body">
                    <div class="form-group ">
                        <label>Rank</label>
                         <input type="hidden"  name="id">
                        <input type="text" class="form-control" name="name" required>
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
               const rank = rows.eq(2).text()
               $('input[name="id"').val(id);
               $('input[name="name"').val(rank);
             
             })
        </script>
        <script >
            $(function(){
                const token = $('#csrf').html()
                deletePlugin.init("{{route('deleteRank')}}", "Ranks", token)
            })
            </script>
@endsection