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
                                <h2>Tumshangilie Bwana</h2>
                                Log in Below to add a Hymn<br>
                                  @if (Session::has('info'))
                                  
                                      {{ Session::get('info') }}
                                   
                                  @endif
                        </div>
                    </div>    
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-4">
                            {!!
                              Form::open(array(
                              'url' => 'sign-in',
                              'action'=>'route("login")',
                              'method'=>'POST',
                              'class' => 'form-horizontal'
                              ))
                              !!}
                              <div class="form-group">
                                <div class="col-sm-12">
                                  <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-12">
                                  <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-12">
                                  <div class="checkbox">
                                    <label>
                                      <input type="checkbox" name="remember"> Remember me
                                    </label>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-4">
                                  <button type="submit" class="btn btn-default signin">Sign in</button>
                                </div><br><br>
                                <span class="forgot"><a href="{{ route('forgot-password') }}">Forgot Password?</a></span>
                                <span class="register"><a href="{{ route('register') }}">Register now?</a></span>
                              </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>