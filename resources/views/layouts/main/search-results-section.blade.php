    <div class="section section-white" id="all">
                <div class="container">
                    <h4 class="header-text text-center">Search Results</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-blue">
                                <div class="text">
                                    <p>
                                    	<ol class="b">
                                            @if (count($hymns) === 0)
                                                Sorry, there were no results found.
                                            @elseif (count($hymns) >= 1)
                                                @foreach($hymns as $hymn)
                                                    <a href="{{ $hymn->slug }}#hymn">
                                                        <li class="category">{{$hymn->title}}</li>
                                                    </a>
                                                @endforeach
                                            @endif
                                    	</ol>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
           <div class="section section-gray">
            	<div class="container text-center">
            		<p>
            			"Though lovers be lost, love shall not; And death shall have no dominion."<br> Dylan Thomas.
            		</p>
            	</div>
            </div>