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
          Submissions - Educational Videos
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
              {{-- <div class="form-group">
                <label for="">Video link:</label><br>
                <a target="_blank" class="btn btn-info" href="#" id="video-link">Click here</a>
              </div> --}}
              <div class="form-group">
                <label for="">Letter of Originality:</label><br>
                <a target="_blank" class="btn btn-info" href="" id="loo" target="_blank" role="button">Letter of Originality</a>

              </div>
            </form>
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
        ajax: '{{url('admin/inamscs/2')}}',
        columns: [
          {data: "id"},
          {data: "name"},
          {data: "email"},
          {data: "inamscs[0].gelombang"},
          {data: null,
            render: function(data, type, row) {
              return "<button class='btn btn-info info' submission-id='"+row.inamscs[0].submissions[0].id+"'>Info</button>"
            }
          }
        ]
      });


      $(document).on('click', '.info', async function(){
        let data;
        const id = $(this).attr('submission-id');
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
        // $("#video-link").attr('href', path);
        path = '{{url('admin/letter-of-originality')}}/' + data.id;
        $("#loo").attr('href', path);
        $("#title").val(data.title);
        $("#modal1").modal('show');

      });


    });
  </script>
@endsection
