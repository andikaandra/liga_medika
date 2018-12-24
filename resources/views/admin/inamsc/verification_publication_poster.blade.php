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
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6 participants">

          </div>
          <div class="col-md-6">
            <form action="#">
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
      $('.price').mask('0.000.000.000.000', {reverse: true});
      $("#admin-inamsc").addClass("active");

      let dataTable = $(".table").DataTable({
        responsive: true,
        ajax: '{{url('admin/inamsc/publication-poster')}}',
        columns: [
          {data: "id"},
          {data: "user.name"},
          {data: "user.email"},
          {data: "gelombang"},
          {data: "status_verif",
            render: function(data, type, row) {
              if (data == -1) {
                return "Declined";
              }else if (data == 1){
                return "Accepted";
              }else{
                return "Pending";
              }
            }
          },
          {data: null,
            render: function(data, type, row) {
              if (row.status_verif == -1) {
                return "<button class='btn btn-success mr-2 accept' inamsc-id='"+row.id+"'>Accept</button>"
                +"<button class='btn btn-danger mr-2 decline' inamsc-id='"+row.id+"' disabled>Decline</button>" +
                "<button class='btn btn-info mr-2 info' inamsc-id='"+row.id+"'>Info</button>";
              }
              else if (row.status_verif == 0) {
                return "<button class='btn btn-success mr-2 accept' inamsc-id='"+row.id+"'>Accept</button>"
                +"<button class='btn btn-danger mr-2 decline' inamsc-id='"+row.id+"'>Decline</button>" +
                "<button class='btn btn-info mr-2 info' inamsc-id='"+row.id+"'>Info</button>";
              }
              else {
                return "<button class='btn btn-success mr-2 accept' inamsc-id='"+row.id+"' disabled>Accept</button>"
                +"<button class='btn btn-danger mr-2 decline' inamsc-id='"+row.id+"'>Decline</button>" +
                "<button class='btn btn-info mr-2 info' inamsc-id='"+row.id+"'>Info</button>";
              }
            }
          }
        ]
      });


      $(document).on('click', '.info', async function(){
        const id = $(this).attr('inamsc-id');
        let data;

        try {
            data = await $.ajax({
              url: '{{url('admin/inamsc/publication-poster')}}/' + id
            });
        } catch (e) {
          alert("Ajax error");
          console.log(e);
          return;
        }
        console.log(data);
        // image path of payment proof
        let path = '{{url('admin/view/image/payment')}}/' + data.payment.id;
        $("#foto-bukti").attr('href', path);
        $("input[name='nama_rekening']").val(data.payment.nama_rekening);
        $("input[name='jumlah']").val(parseInt(data.payment.jumlah));
        $('.price').trigger('input');

        $(".participants").html("");

        data.participants.forEach(function(el, idx, arr){

          $(".participants").append(
            "<div class='participant'>"
            + "<h5>Participant "+ parseInt(idx+1) +"</h5>"+
              "<div class='form-group'>"+
                "<label>Name</label>" +
                "<input class='form-control' type='text' disabled value=\""+el.nama+"\">" +
              "</div>"+
            "<div class='form-group'>"+
              "<label>University:</label>"+
            "<input class='form-control' type='text' disabled value=\""+el.universitas+"\">"+
            "</div>"+
            "<div class='form-group'>"+
              "<label>Department:</label>"+
            "<input class='form-control' type='text' disabled value=\""+el.jurusan+"\">"+
            "</div>"+
              "<div class='form-group'>"+
                "<label>Ambassador Code:</label>"+
                "<input class='form-control' type='text' disabled value=\""+el.kode_ambassador+"\">"+
              "</div>" +
              "<div class='form-group'>"+
                "<label>Participant's File:</label><br>"+
                '<a class="btn btn-sm btn-info" href="{{url('admin/inamsc/file')}}/'+el.id+'" id="files" target="_blank" role="button">Check</a>'+
              "</div>" +
            "</div>"
          );



        });

        $("#modal1").modal('show');

      });


      $(document).on('click', '.accept', function(){
        const id = $(this).attr('inamsc-id');

        alertify.confirm('Confirmation', 'Would you like to accept this participant?',
        async function(){
          // user has confirmed
          let data;
          try {
            await $.ajax({
              url: '{{url('admin/inamsc/publication-poster/accept')}}/' + id,
              method: "PUT"
            });
          } catch (e) {
            alert("ajaax error");
            console.log(e);
            return;
          }
          alertify.success("Participant has been accepted!");
          dataTable.ajax.reload(null, false);
        },
          function(){

          });

      });

      $(document).on('click', '.decline', function(){
        const id = $(this).attr('inamsc-id');

        alertify.confirm('Confirmation', 'Would you like to decline this participant?',
        async function(){
          // user has confirmed
          let data;
          try {
            await $.ajax({
              url: '{{url('admin/inamsc/publication-poster/decline')}}/' + id,
              method: "PUT"
            });
          } catch (e) {
            alert("ajaax error");
            console.log(e);
            return;
          }
          alertify.success("Participant has been declined!");
          dataTable.ajax.reload(null, false);
        },
          function(){

          });

      });

    });
  </script>
@endsection
