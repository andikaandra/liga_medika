@extends('layouts.admin')


@section('navbar')
  @include('partials.participants-navbar')
@endsection

@section('sidebar')
  @include('partials.participants-sidebar')
@endsection




@section('style')
<style media="screen">

.dropzone {
    background: white;
    border-radius: 5px;
    border: 1px solid rgb(0, 135, 247);
    border-image: none;
    margin-left: auto;
    margin-right: auto;
    padding: 10px;
}

.dropzone:hover{
  cursor: pointer;
}

</style>
@endsection

@section('content')
<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white mr-2">
        <i class="mdi mdi-folder-upload"></i>
      </span>
      Submissions
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
        {{-- notif sukses --}}
        @if (\Session::get('message'))
          <div class="alert alert-success">
            {{\Session::get('message')}}
          </div>
        @endif

        @if ($errors->all())
          <div class="alert alert-danger">
            <strong>Failed to submit: </strong>
            <ul>
              @if ($errors->has('file_path'))
                <li>Uploaded file file cannot exceed 6 mb.</li>
                <li>Uploaded file has to be zip format.</li>
              @endif
            </ul>

          </div>
        @endif

        @if ($dataLomba->status_pengumpulan==0)
          <div class="alert alert-danger">
            You cant submit your work for a while!
          </div>
          <div class="card" style="pointer-events: none; opacity: 0.4;">
        @else
          <div class="card">
        @endif
              <div class="card-body">
                {{-- check if users is allowed to upload --}}
                @if ($allowed)
                  {{-- check if already uploaded --}}
                  @if ($uploaded->count())
                    {{-- link submission --}}
                    @if (Auth::user()->cabang_spesifik == 2)
                      <p>You have uploaded "{{Auth::user()->inamscs[0]->submissions[0]->title}}" and its Letter of Originality.</p>
                      <p>Submission time: {{Auth::user()->inamscs[0]->submissions[0]->created_at}}</p>
                    @else
                      <p>You have uploaded "{{Auth::user()->inamscs[0]->submissions[0]->title}}"</p>
                      <p>Submission time: {{Auth::user()->inamscs[0]->submissions[0]->created_at}}</p>
                    @endif
                  @else
                    <form class="" action="{{url('users/inamsc/submissions')}}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label for="">Title: </label>
                        <input class="form-control" type="text" name="title" value="" required pattern=".*\S+.*" placeholder="What is the title of your submission?">
                        <small class="form-text text-muted">Example : 
                          @if(Auth::user()->cabang_spesifik == 2)
                            Videdu_First Creator Name_Title of Video
                          @elseif(Auth::user()->cabang_spesifik == 3)
                            Pubpos_First Author Name_Title of Poster
                          @elseif(Auth::user()->cabang_spesifik == 4)
                            Litrev_First Author Name_University_Title of Paper
                          @elseif(Auth::user()->cabang_spesifik == 5)
                            RPP_Code of Cluster_First Author Name_Title of Abstract
                          @endif
                        </small>
                      </div>

                      {{-- educational video uploads youtube link  --}}
                      @if (Auth::user()->cabang_spesifik == 2)
                        <div class="form-group">

                          <p>Please email your abstract (word file) and video to inamsc2019@gmail.com</p>
                          <p>Subject name: Videdu_First Creator Name_Title of Video</p>
                          <label for="">Letter of originality: </label> <br>
                          <input type="file" name="letter_of_originality_path" value="" accept="application/zip" required>
                          <small class="form-text text-muted">Please zip your file. You can download letter of originality template <a href="{{url('users/download/letter-of-originality')}}">here</a>. Max size 3 mb.</small>
                        </div>
                      @else
                        <div class="form-group">
                          <label for="">File to be submitted: </label> <br>
                          <input type="file" name="file_path" value="" accept="application/zip" required>
                          <small class="form-text text-muted">Please zip your file(s). It contains your work and letter of originality. Max size 6 mb.</small>
                          <small class="form-text text-muted">You can download letter of originallity template <a href="{{url('users/download/letter-of-originality')}}">here</a></small>
                        </div>
                      @endif
                      <input type="hidden" name="cabang_spesifik" value="{{Auth::user()->cabang_spesifik}}">
                      <input type="submit" class="btn btn-success" name="" value="Submit">
                    </form>
                  @endif

                @else
                  @if ($uploaded->count())

                    @if (Auth::user()->cabang_spesifik == 2)
                      <p>You have uploaded "{{Auth::user()->inamscs[0]->submissions[0]->title}}", with this provided <a target="_blank" href="{{Auth::user()->inamscs[0]->submissions[0]->file_path}}">link</a>.</p>
                      <p>Submission time: {{Auth::user()->inamscs[0]->submissions[0]->created_at}}</p>
                    @else
                      <p>You have uploaded "{{Auth::user()->inamscs[0]->submissions[0]->title}}"</p>
                      <p>Submission time: {{Auth::user()->inamscs[0]->submissions[0]->created_at}}</p>
                    @endif

                  @else
                  <div class="alert alert-danger">
                    <p>Sorry, submissions for wave: {{$wave}} is not open.</p>
                  </div>
                  @endif

                @endif


              </div>
          <br>
        </div>
      </div>
    </div>
  </div>

@endsection


@section('script')
  <script src="{{asset('js/dropzone.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#user-files").addClass('active');




    });
  </script>
@endsection
