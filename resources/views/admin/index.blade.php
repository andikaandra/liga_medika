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
        <div class="col-md-4 stretch-card grid-margin">
          <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
              <img src="{{asset('admin-dashboard/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image"/>
              <h4 class="font-weight-normal mb-3">Weekly Sales
                <i class="mdi mdi-chart-line mdi-24px float-right"></i>
              </h4>
              <h2 class="mb-5">$ 15,0000</h2>
              <h6 class="card-text">Increased by 60%</h6>
            </div>
          </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
          <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
              <img src="{{asset('admin-dashboard/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image"/>
              <h4 class="font-weight-normal mb-3">Weekly Orders
                <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
              </h4>
              <h2 class="mb-5">45,6334</h2>
              <h6 class="card-text">Decreased by 10%</h6>
            </div>
          </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
          <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
              <img src="{{asset('admin-dashboard/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image"/>
              <h4 class="font-weight-normal mb-3">Visitors Online
                <i class="mdi mdi-diamond mdi-24px float-right"></i>
              </h4>
              <h2 class="mb-5">95,5741</h2>
              <h6 class="card-text">Increased by 5%</h6>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h3>Competitions and events management</h3>
              <table class="table table-striped table-hover">
                <thead>
                  <th>Name</th>
                  <th>Number of waves</th>
                  <th>Current wave</th>
                  <th>Registration status</th>
                  <th>Submission status</th>
                  <th>Price</th>
                  <th>Capacity</th>
                </thead>
                <tbody>
                  @foreach ($lombas as $l)
                    <tr id="{{$l->id}}">
                      <td id="nama-{{$l->id}}">{{$l->nama}}</td>
                      <td id="jumlah_gelombang-{{$l->id}}">{{$l->jumlah_gelombang}}</td>
                      <td id="gelombang_sekarang-{{$l->id}}">{{$l->gelombang_sekarang}}</td>
                      @if ($l->status_pendaftaran)
                        <td id="status_pendaftaran-{{$l->id}}">Open</td>
                      @else
                        <td id="status_pendaftaran-{{$l->id}}">Close</td>
                      @endif
                      @if ($l->status_pengumpulan)
                        <td id="status_pengumpulan-{{$l->id}}">Open</td>
                      @else
                        <td id="status_pengumpulan-{{$l->id}}">Close</td>
                      @endif
                      <td id="biaya-{{$l->id}}">{{"Rp " . number_format((int)$l->biaya,2,',','.')}}</td>
                      <td id="kuota-{{$l->id}}">{{$l->kuota}}</td>
                      <td>
                        <button type="button" cabang-id={{$l->id}} name="button" class="btn btn-info edit">Edit</button>
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

    <div class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="lomba-form" action="#">
          <div class="form-group">
            <label for="">Number of waves: </label>
            <input class="form-control" type="number" step="1" min="1" name="jumlah_gelombang" value="">
          </div>
          <div class="form-group">
            <label for="">Current wave: </label>
            <input class="form-control" type="number" step="1" min="1" name="gelombang_sekarang" value="">
          </div>
          <div class="form-group">
            <label for="">Registration status: </label> <br>
            <small>Are users allowed to register in the current wave?</small>
            <select class="form-control" name="status_pendaftaran">
              <option value="1">Yes</option>
              <option value="0">No</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Submission status: </label> <br>
            <small>Are registered users allowed to submit their work?</small>
            <select class="form-control" name="status_pengumpulan">
              <option value="1">Yes</option>
              <option value="0">No</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Price: </label> <br>
            <small>How much do users have to pay in the current wave?</small>
            <input class="form-control" type="text" name="biaya" value="">
          </div>
          <div class="form-group">
            <label for="">Capacity: </label>
            <input class="form-control" type="number" step="1" min="1" name="kuota" value="">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success save">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection


@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      let lombaId;
      $(".edit").click(async function(){
        const id = $(this).attr('cabang-id');

        lombaId = id;

        let data;

        try {
          data = await $.ajax({
            url: '{{url('admin/lombas')}}/' + id
          });
        } catch (e) {
          console.log(e);
          alert("Error")
        }
        $(".modal-title").text(data.nama);
        $("input[name='jumlah_gelombang']").val(data.jumlah_gelombang);
        $("input[name='gelombang_sekarang']").val(data.gelombang_sekarang);
        $("select[name='status_pendaftaran']").val(data.status_pendaftaran);
        $("select[name='status_pengumpulan']").val(data.status_pengumpulan);
        $("input[name='biaya']").val(parseInt(data.biaya));
        $("input[name='kuota']").val(data.kuota);

        $(".modal").modal('show');
      });


      $(".save").click(async function(){
        let formData = $(".lomba-form").serializeArray();
        try {
          await $.ajax({
            url: '{{url('admin/lombas')}}/' + lombaId,
            method: "PUT",
            data: $(".lomba-form").serialize()
          });
        } catch (e) {
          alert("Error");
          console.log(e);
        }

        $("#jumlah_gelombang-"+lombaId).text(formData[0].value);
        $("#gelombang_sekarang-" + lombaId).text(formData[1].value);
        if (formData[2].value == "1") {
          $("#status_pendaftaran-" + lombaId).text("Open");

        } else {
          $("#status_pendaftaran-" + lombaId).text("Close");
        }

        if (formData[3].value == "1") {
          $("#status_pengumpulan-" + lombaId).text("Open");

        } else {
          $("#status_pengumpulan-" + lombaId).text("Close");

        }
        $("#biaya-" + lombaId).text(parseInt(formData[4].value));
        $("#kuota-"+ lombaId).text(formData[5].value);

        $(".modal").modal('hide');

        alert("success");

      });



    });
  </script>
@endsection
