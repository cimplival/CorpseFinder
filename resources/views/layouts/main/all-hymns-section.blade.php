<div class="section section-white" id="hymn">
                <div class="container">
                    <h4 class="header-text text-center">Categories</h4>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="card card-blue">
                                <div class="text">
                                    <p>
                                        <h4 class="text-center">
                                            {{$hymn_title}}
                                        </h4>
                                    	<ol class="b">
                                            @foreach($hymns as $hymn)
                                    		<a href="{{ $hymn->slug }}#hymn">
                                                <li class="category">
                                                    {{ $hymn->title }}
                                                </li>
                                            </a>
                                            @endforeach
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
            			Shout joyfully to the LORD, all the earth; 
            			Break forth and sing for joy and sing praises.<br>
            			- Psalms 98:4 
            		</p>
            	</div>
            </div>