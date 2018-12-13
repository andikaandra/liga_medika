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
          Dashboard
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
              <h3>{{$title}}</h3>
              todo : nampilin data para peserta 1 per 1
              <table class="table table-striped table-hover">
                <thead>
                  <th>No</th>
                  <th>Username</th>
                  <th>Participant's Data</th>
                  <th>Wave</th>
                  <th>Payment</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  @foreach ($verif as $l)
                    <tr>
                      <td>{{$l->id}}</td>
                      <td>{{$l->user_id}}</td>
                      <td><a href="{{url('admin/file/2').'/'.$l->user_id}}" target="_blank">Download File</a></td>
                      <td>{{$l->gelombang}}</td>
                      <td>
                        <button type="button" user-id="{{$l->user_id}}" name="button" class="btn btn-sm btn-primary view">View</button>
                      </td>
                      <td>
                        <form method="post" action="{{route('verifikasi.edukasi.acc')}}">
                          @csrf
                          <input type="hidden" name="edukasi_id" value="{{$l->id}}">
                          <button type="submit" class="btn btn-sm btn-info acc">Acc</button>
                        </form>
                        <form method="post" action="{{route('verifikasi.edukasi.reject')}}">
                          @csrf
                          <input type="hidden" name="edukasi_id" value="{{$l->id}}">
                          <button type="submit" class="btn btn-sm btn-danger reject">Reject</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
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
            <label for="">Bank Account</label>
            <input class="form-control" type="text" name="nama_rekening" disabled>
          </div>
          <div class="form-group">
            <label for="">Ammount</label>
            <input class="form-control" type="text" name="jumlah" disabled>
          </div>
            <a class="btn btn-primary" href="" id="foto-bukti" target="_blank" role="button">Proof of Payment</a>
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
      let userId;
      $(".view").click(async function(){
        const id = $(this).attr('user-id');
        userId = id;

        let data;

        try {
          data = await $.ajax({
            url: '{{url('admin/payment')}}/2/' + id
          });
        } catch (e) {
          console.log(e);
          alert("Error");
        }
        path = "{{url('admin/view/image/payment').'/'}}";
        $(".modal-title").text("");
        $("input[name='nama_rekening']").val(data.nama_rekening);
        $("input[name='jumlah']").val(data.jumlah);
        $("#foto-bukti").attr("href", path+data.id);

        $("#modal1").modal('show');
      });

    });
  </script>
@endsection
