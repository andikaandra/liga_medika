<div class="dash-content">
  <h3>My data:</h3>
  <form class="" action="#">
    <div class="form-group">
      <label for="">Name: </label>
      <input class="form-control" type="text" disabled name="" value="{{Auth::user()->name}}">
    </div>
    <div class="form-group">
      <label for="">Email: </label>
      <input class="form-control" type="text" disabled name="" value="{{Auth::user()->email}}">
    </div>
    <div class="form-group">
      <label for="">Event/ competition: </label>
      <input type="text" disabled class="form-control" name="" value="INAMSC - Passive Participant">
    </div>
    <div class="form-group">

    </div>
  </form>
</div>
