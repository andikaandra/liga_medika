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
            <i class="mdi mdi-home"></i>
          </span>
          {{$title}}
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
                  <th>Verified</th>
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
            <h5 class="modal-title">Account Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col">
                <form action="#">
                  <div class="form-group">
                    <label for="">University:</label>
                    <input class="form-control" type="text" name="university" disabled>
                  </div>
                  <div class="form-group">
                    <label for="">Name of Person in Charge:</label>
                    <input class="form-control" type="text" name="penanggung_jawab" disabled>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label for="">Event:</label>
                    <input class="form-control" type="text" name="cabang" disabled>
                  </div>
                  <div class="form-group">
                    <label for="">Sub Event:</label>
                    <input class="form-control" type="text" name="cabang_spesifik" disabled>
                  </div>
                  <div class="form-group">
                    <label for="">Participant Event Status:</label>
                    <input class="form-control" type="text" name="lomba_verified" disabled>
                  </div>
                  <hr>
                </form>
              </div>
            </div>
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
      $("#admin-account").addClass("active");

      let dataTable = $(".table").DataTable({
        responsive: true,
        ajax: '{{url('admin/account/data')}}',
        columns: [
          {data: "id"},
          {data: "name", className: 'text-capitalize'},
          {data: "email"},
          {data: "verified", className: 'text-center',
            render: function(data, type, row) {
              if (data == 1) {
                return "Yes";
              }else{
                return "No";
              }
            }
          },
          {data: null,
            render: function(data, type, row) {
              if (row.verified == 0) {
                return "<button class='btn btn-sm btn-success mr-2 accept' account-id='"+row.id+"'>Accept</button>";
              }
              else {
                return "<button class='btn btn-sm btn-info mr-2 info' account-id='"+row.id+"'>Info</button>";
              }
            }
          }
        ]
      });

      $(document).on('click', '.info', async function(){
        const id = $(this).attr('account-id');
        let data;
        try {
            data = await $.ajax({
              url: '{{url('admin/account/data')}}/' + id
            });
        } catch (e) {
          alert("Ajax error");
          console.log(e);
          return;
        }
        $("input[name='university']").val((data.user.universitas) ? (data.user.universitas) : ("-"));
        $("input[name='penanggung_jawab']").val((data.user.penanggung_jawab) ? (data.user.penanggung_jawab) : ("-"));
        if (data.user.cabang) {
          let cabang="-";
          let cabang_spesifik="-";

          if (data.user.cabang_spesifik) {
            let temp=data.user.cabang_spesifik;
            if (data.user.cabang==1) {
              cabang = "IMSSO";
              if(temp==1) {cabang_spesifik="Men Basketball"} else if(temp==2) {cabang_spesifik="Women Basketball"} else {cabang_spesifik="Men Futsal"}
            }
            else if(data.user.cabang==2){
              cabang = "IMARC";
              if(temp==1) {cabang_spesifik="Photography"} else if(temp==2) {cabang_spesifik="Traditional Dance"} else if(temp==3) {cabang_spesifik="Vocal Group"} else {cabang_spesifik="Band"}
            }
            else if(data.user.cabang==3){
              cabang = "INAMSC";
              if(temp==1) {cabang_spesifik="Symposium & Workshop"} else if(temp==2) {cabang_spesifik="Educational Video"} else if(temp==3) {cabang_spesifik="Public Poster"} else if(temp==4) {cabang_spesifik="Literature Review"} else {cabang_spesifik="Research Paper"}
            }
            else if(data.user.cabang==4){
              cabang = "HFGM";
              if(temp==1) {cabang_spesifik="Campaign"} else {cabang_spesifik="Concert"}
            }
            $("input[name='cabang_spesifik']").val(cabang_spesifik);
            $("input[name='lomba_verified']").val((data.user.lomba_verified==1) ? ("Accepted by Admin") : ("Not Accepted Yet"));
          }
          else{
            $("input[name='cabang_spesifik']").val(cabang_spesifik);
            $("input[name='lomba_verified']").val("Not Submitted Yet");
          }
          $("input[name='cabang']").val(cabang);
        }
        else{
          $("input[name='cabang']").val("-");
          $("input[name='cabang_spesifik']").val("-");
          $("input[name='lomba_verified']").val("Not Submitted Yet");
        }

        $("#modal1").modal('show');

      });

      $(document).on('click', '.accept', function(){
        const id = $(this).attr('account-id');

        alertify.confirm('Confirmation', 'Would you like to verify this participant? this action can\'t be undone',
        async function(){
          let data;
          try {
            await $.ajax({
              url: '{{url('admin/account/accept')}}/' + id,
              method: "PUT"
            });
          } catch (e) {
            alert("ajax error");
            console.log(e);
            return;
          }
          alertify.success("Participant has been verified!");
          dataTable.ajax.reload(null, false);
        },
          function(){

          });

      });

    });
  </script>
@endsection
