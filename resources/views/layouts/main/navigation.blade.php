        <nav class="navbar navbar-transparent navbar-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="example" >
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{ route('home') }}">
                                <i class="fa fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('all-hymns') }}">
                                <i class=""></i>
                                Archives
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('log-in')}}">
                                <i class="fa fa-plus"></i>
                                Add
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>