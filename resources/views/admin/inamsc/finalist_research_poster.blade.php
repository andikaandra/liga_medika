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
          Finalist - Reasearch Paper & poster
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
                  <th>Travel Plan</th>
                  <th>Account Name</th>
                  <th>Amount</th>
                  <th>Payments</th>
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
        <div class="row">
          <div class="col participants">

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
      $("#admin-finalist").addClass("active");


      let dataTable = $(".table").DataTable({
        responsive: true,
        ajax: '{{url('admin/inamscs/finalists/1')}}',
        columns: [
          {data: "id"},
          {data: "name"},
          {data: "email"},
          {data: "link_travel_plan"},
          {data: "nama_rekening"},
          {data: null,
            render: function(data, type, row) {
              if(!row.jumlah_transfer){
                return ""
              }
              return "Rp "+row.jumlah_transfer;
            }
          },
          {data: null,
            render: function(data, type, row) {
              if(!row.jumlah_transfer){
                return ""
              }
              return `<button class="btn btn-info mr-2 info-participant" inamsc-id="${row.inamsc_id}">Info</button><a class="btn btn-info text-white info" target="_blank" href="{{url('admin/view/finalist/image')}}/${row.inamsc_id}">Payment</a>`
            }
          }
        ]
      });

      $(document).on('click', '.info-participant', async function(){
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

        $(".participants").html("");

        data.participants.forEach(function(el, idx, arr){
          let faqq = ""
          if (el.workshop == 1) {
            faqq = `Less Stress for Future Doctors: an Introduction to PRH ( ${el.accreditation} )`;
          }
          else if (el.workshop == 2) {
            faqq = "Mental Health Assessment in General Practice";
          }
          else if (el.workshop == 3) {
            faqq = "Cognitive Function";
          }
          $(".participants").append(`
            <div class="participant">
              <div class="form-group">
                <label>Name:</label>
                <input class="form-control" type="text" disabled value="${el.nama}">
              </div>
              <div class="form-group">
                <label>Workshop:</label>
                <input class="form-control" type="text" disabled value="${faqq}">
              </div>
            </div><hr><br>`
          );
        });

        $("#modal1").modal('show');

      });

    });
  </script>
@endsection
