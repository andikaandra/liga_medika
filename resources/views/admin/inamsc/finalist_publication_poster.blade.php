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
          Finalist - Public Poster
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
                  <th>Workshop(Certificate)</th>
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
@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $("#admin-finalist").addClass("active");


      let dataTable = $(".table").DataTable({
        responsive: true,
        ajax: '{{url('admin/inamscs/finalists/3')}}',
        columns: [
          {data: "id"},
          {data: "name"},
          {data: "email"},
          {data: "link_travel_plan"},
          {data: null,
            render: function(data, type, row) {
              if (row.workshop == 1) {
                return `Less Stress for Future Doctors: an Introduction to PRH ( ${row.accreditation} )`;
              }
              else if (row.workshop == 2) {
                return "Mental Health Assessment in General Practice (none)";
              }
              else if (row.workshop == 3) {
                return "Cognitive Function (none)";
              }
              else {
                return ""
              }
            }
          },
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
              return `<a class="btn btn-info text-white info" target="_blank" href="{{url('admin/view/finalist/image')}}/${row.inamsc_id}">Payment</a>`
            }
          }
        ]
      });


    });
  </script>
@endsection
