        <div class="parallax filter-gradient orange" data-color="orange">
            <div class="parallax-background">
                <img class="parallax-background-image" src="../assets/img/showcases/showcase-1/bg.jpg">
            </div>
            <div class= "container">
                <div class="row">
                    <div class="description text-center col-lg-12">
                        <a href="{{route('home')}}">
                            <i fa fa-search></i>
                        </a><br><br>
                        <h2>CorpseFinder</h2><br>
                        <p>Corpse Finder Information System</p><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        {!! Form::open(array('route' => 'search')) !!}
                            <div class="input-group add-on">
                                <input class="form-control search-input" name="search" placeholder="Search Here..." type="text" required>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </span>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>