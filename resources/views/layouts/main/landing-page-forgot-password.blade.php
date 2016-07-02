<div class="wrapper">
  <div class="parallax filter-gradient orange" data-color="orange">
    <div class="parallax-background">
      <img class="parallax-background-image" src="assets/img/showcases/showcase-1/bg.jpg">
    </div>
    <div class= "container">
      <div class="row">
        <div class="description text-center col-lg-12">
          <a href="#">
            <img src="assets/img/logo.png" alt="Church Logo">
          </a><br><br>
          <h2>CorpseFinder</h2>
          <p>Forgot your Password?</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
          {!!
          Form::open(array(
          'url' => 'forgot-password',
          'action'=>'route("forgot-password")',
          'method'=>'POST',
          'class' => 'form-horizontal'
          ))
          !!}
          <div class="form-group">
            <div class="col-sm-12">
              <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-4 col-sm-4">
              <button type="submit" class="btn btn-default signin">Send Me a Link</button>
              <br><br>
              <span class="register">
                <i class="fa fa-long-arrow-left"></i>
                <a href="{{ route('log-in') }}">Go Back</a>
              </span>
            </div><br><br><br>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>