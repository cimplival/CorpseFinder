<div class="section section-gray" id="all">
  <div class="container">
    <h4 class="header-text text-center">Add Deceased</h4>
    <div class="row">
      <div class="col-lg-6 col-lg-offset-3">
        @if (Session::has('info'))
        <div class="alert alert-info" role="alert">
          {{ Session::get('info') }}
        </div>
        @if (count($errors) > 0)
                  <div class="alert alert-danger">
                  <strong>Whoops! Sorry!</strong> There were some problems with your input.<br>
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                  </div>
                  @endif
        @endif
        {!!
        Form::open(array(
        'url'    => 'submit-deceased',
        'action' =>'route("add-hymn")',
        'method' =>'POST',
        'enctype'=> 'multipart/form-data',
        'class'  => 'form-horizontal'
        ))
        !!}
        <div class="form-group">
          <div class="col-sm-12">
            <input type="text" class="form-control" name="id_no" placeholder="Enter Identification No." required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
          Gender: 
            <select name="gender">
              <option value="">Select Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <input type="author" class="form-control" name="checkin_date" placeholder="Date of Arrival i.e. 12/02/2014">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            Upload Photo<br><br>
            <label class="btn btn-default btn-file">
              <input type="file" name="photo" required>
            </label>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <textarea type="textarea" class="form-control" name="description" rows="10" placeholder="Description i.e. Demographics, Place / Cause of Death, etc."></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-default">
            <i class="fa fa-check"></i> Submit Information
            </button>
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>