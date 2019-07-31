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
                  <th>Wave</th>
                  <th>Workshop(Certificate)</th>
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
        <form action="#">
          <div class="form-group">
            <label for="">KTP/ KTP Identification:</label>
          </div>
          <a class=" btn btn-info" href="" id ="ktp" target="_blank" role="button">Check</a>

          <hr>
          <div class="form-group">
            <label for="">Bank Account:</label>
            <input class="form-control" type="text" name="nama_rekening" disabled>
          </div>
          <div class="form-group">
            <label for="">Amount:</label>
            <input class="form-control price" type="text" name="jumlah" disabled>
          </div>
            <a class="btn btn-info" href="" id="foto-bukti" target="_blank" role="button">Proof of Payment</a>
        </form>
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
      $("#admin-inamsc").addClass("active");
      $('.price').mask('0.000.000.000.000', {reverse: true});

      let symposiumTable = $(".table").DataTable({
        ajax: '{{url('admin/inamsc/symposium')}}',
        columns: [
          {data: 'id'},
          {data: 'nama'},
          {data: 'user.email'},
          {data: 'gelombang'},
          {data: null,
            render: function(data, type, row) {
              if (row.workshop == 1) {
                return `Less Stress for Future Doctors: an Introduction to PRH (${row.sertifikat})`;
              }
              else if (row.workshop == 2) {
                return "Mental Health Assessment in General Practice (none)";
              }
              else {
                return "Assessment of schizophrenia in primary health care: mental disease with common occurence in young adult (none)";
              }
            }
          },
          {data: 'status_verif',
            render: function(data, type, row) {
              if (data == -1) {
                return "Declined";
              }
              else if (data == 0) {
                return "Pending";
              }
              else {
                return "Accepted";
              }
            }
          },
          {data: null,
            render: function(data, type, row) {
              if (row.status_verif == -1) {
                return "<button class='btn btn-success mr-2 accept' symposium-id='"+row.id+"'>Accept</button>"
                +"<button class='btn btn-danger mr-2 decline' symposium-id='"+row.id+"' disabled>Decline</button>" +
                "<button class='btn btn-info mr-2 info' symposium-id='"+row.id+"'>Info</button>";
              }
              else if (row.status_verif == 0) {
                return "<button class='btn btn-success mr-2 accept' symposium-id='"+row.id+"'>Accept</button>"
                +"<button class='btn btn-danger mr-2 decline' symposium-id='"+row.id+"'>Decline</button>" +
                "<button class='btn btn-info mr-2 info' symposium-id='"+row.id+"'>Info</button>";
              }
              else {
                return "<button class='btn btn-success mr-2 accept' symposium-id='"+row.id+"' disabled>Accept</button>"
                +"<button class='btn btn-danger mr-2 decline' symposium-id='"+row.id+"'>Decline</button>" +
                "<button class='btn btn-info mr-2 info' symposium-id='"+row.id+"'>Info</button>";
              }
            }
          }
        ],
        responsive: true
      });

      $(document).on('click', '.info', async function(){
        const id = $(this).attr('symposium-id');
        let data;
        try {
          data = await $.ajax({
            url: '{{url('admin/inamsc/symposium')}}/' + id
          });
        } catch (e) {
          alert("Ajax error");
          console.log(e);
          return;
        }
        console.log(data);
          let path = "{{url('admin/view/symposium/image/payment').'/'}}";
          $(".modal-title").text("");
          $("input[name='nama_rekening']").val(data.payment.nama_rekening);
          $("input[name='jumlah']").val(data.payment.jumlah);
          $("#foto-bukti").attr("href", path + data.payment.id);

          path = '{{url("admin/view/symposium/image/ktp")}}/' + data.symposium_data.id;
          $("#ktp").attr('href', path);
          $('.price').trigger('input');

          $("#modal1").modal('show');
      });

      $(document).on('click', '.accept', function(){
        const id = $(this).attr('symposium-id');
        alertify.confirm('Confirmation', 'Would you like to accept this participant?',
        async function(){
          // user has confirmed
          let data;
          try {
            await $.ajax({
              url: '{{url('admin/inamsc/symposium/accept')}}/' + id,
              method: "PUT"
            });
          } catch (e) {
            alert("ajaax error");
            console.log(e);
            return;
          }
          alertify.success("Participant has been accepted!");
          symposiumTable.ajax.reload(null, false);
        },
          function(){

          });
      });

      $(document).on('click', '.decline', function(){
        const id = $(this).attr('symposium-id');
        alertify.confirm('Confirmation', 'Would you like to decline this participant?',
        async function(){
          // user has confirmed
          let data;
          try {
            await $.ajax({
              url: '{{url('admin/inamsc/symposium/decline')}}/' + id,
              method: "PUT"
            });
          } catch (e) {
            alert("ajaax error");
            console.log(e);
            return;
          }
          alertify.success("Participant has been declined!");
          symposiumTable.ajax.reload(null, false);
        },
          function(){

          });
      });


    });
  </script>
@endsection
