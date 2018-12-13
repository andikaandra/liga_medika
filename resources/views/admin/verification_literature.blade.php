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
                  <th>Action</th>
                </thead>
                <tbody>
                  @foreach ($verif as $l)
                    <tr>
                      <td>{{$l->id}}</td>
                      <td>{{$l->user_id}}</td>
                      <td><a href="{{url('admin/file/3').'/'.$l->user_id}}" target="_blank">Download File</a></td>
                      <td>{{$l->gelombang}}</td>
                      <td>
                        <form method="post" action="{{route('verifikasi.literature.acc')}}">
                          @csrf
                          <input type="hidden" name="literature_id" value="{{$l->id}}">
                          <input type="hidden" name="user_id" value="{{$l->user_id}}">
                          <button type="submit" class="btn btn-sm btn-info acc">Acc</button>
                        </form>
                        <form method="post" action="{{route('verifikasi.literature.reject')}}">
                          @csrf
                          <input type="hidden" name="literature_id" value="{{$l->id}}">
                          <input type="hidden" name="user_id" value="{{$l->user_id}}">
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

@endsection

@section('script')
@endsection
