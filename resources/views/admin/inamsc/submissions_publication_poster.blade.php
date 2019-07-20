@extends('layouts.admin')

@section('navbar')
  @include('partials.admin-navbar')
@endsection

@section('sidebar')
  @include('partials.admin-sidebar')
@endsection

@section('content')
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-library-books"></i>
          </span>
          Submissions - Public Poster
        </h3>
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
              <span></span>Overview
              <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
          </ul>
        </nav>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              @if (\Session::get('message'))
                <div class="alert alert-success">
                  {{\Session::get('message')}}
                </div>
              @endif
              <table class="table table-striped table-hover">
                <thead>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Wave</th>
                  <th>Status</th>
                  <th>Action</th>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  <div class="modal fade" tabindex="-1" role="dialog" id="modal1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{-- <div class="row"> --}}
            <form action="#">
              <div class="form-group">
                <label for="">Title:</label>
                <input type="text" class="form-control" id="title" disabled name="" value="">
              </div>
              <div class="form-group">
                <label for="">Time:</label>
                <input type="text" class="form-control" id="time" disabled name="" value="">
              </div>
              <div class="form-group">
                <label for="">Submission Files:</label><br>
                <a target="_blank" class="btn btn-info" href="" id="loo" target="_blank" role="button">Submission Files</a>
              </div>
            </form>
              <div class="form-group">
                <label for="">Pick this team to continue to the final stage?:</label><br>
                <button class='btn btn-success mr-2 yes'>Yes</button>
                <button class='btn btn-danger mr-2 no'>No</button>
                <input type="hidden" id="user_id" value=""><br>
                <small>*once you accept the team, you cant decline anymore</small>
              </div>
        {{-- </div> --}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $("#admin-submissions").addClass("active");


      let dataTable = $(".table").DataTable({
        responsive: true,
        ajax: '{{url('admin/inamscs/3')}}',
        columns: [
          {data: "id"},
          {data: "name"},
          {data: "email"},
          {data: "gelombang"},
          {data: "status_lolos_user",
            render: function(data, type, row) {
              if (data == 1) {
                return "Finalist";
              }else if (data == -1){
                return "Not Finalist";
              }else{
                return "Pending";
              }
            }
          },
          {data: null,
            render: function(data, type, row) {
              return "<button class='btn btn-info info' user-id='"+row.user_id+"' submission-id='"+row.id+"'>Info</button>"
            }
          }
        ]
      });


      $(document).on('click', '.info', async function(){
        let data;
        const id = $(this).attr('submission-id');
        $('#user_id').val($(this).attr('user-id'));
        try {
            data = await $.ajax({
              url: '{{url('admin/inamsc/submissions')}}/' + id
            });
        } catch (e) {
          alert("Ajax error");
          console.log(e);
          return;
        }
        let path;
        path = '{{url('admin/inamscs')}}/' + data.id + '/download/submissions';
        $("#loo").attr('href', path);
        $("#title").val(data.title);
        $("#time").val(data.created_at);
        $("#modal1").modal('show');
      });


      $(document).on('click', '.yes', function(){
        const id = $('#user_id').val();
        alertify.confirm('Confirmation', 'Would you like to accept this team?',
        async function(){
          let data;
          try {
            await $.ajax({
              url: '{{url('admin/inamsc/final/accept')}}/' + id,
              method: "PUT"
            });
          } catch (e) {
            alert("ajax error");
            console.log(e);
            return;
          }
          dataTable.ajax.reload(null, false);
          $("#modal1").modal('hide');
        },
          function(){

          });
      });


      $(document).on('click', '.no', function(){
        const id = $('#user_id').val();
        alertify.confirm('Confirmation', 'Would you like to decline this team?',
        async function(){
          let data;
          try {
            await $.ajax({
              url: '{{url('admin/inamsc/final/decline')}}/' + id,
              method: "PUT"
            });
          } catch (e) {
            alert("ajax error");
            console.log(e);
            return;
          }
          dataTable.ajax.reload(null, false);
          $("#modal1").modal('hide');
        },
          function(){

          });
      });

    });
  </script>
@endsection
