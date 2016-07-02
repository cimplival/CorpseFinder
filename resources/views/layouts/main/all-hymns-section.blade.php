<div class="section section-white" id="all">
                <div class="container">
                    <h4 class="header-text text-center">Categories</h4>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="card card-blue">
                                <div class="text">
                                    <p>
                                        <h4 class="text-center">
                                            {{$title}}
                                        </h4>
                                    	<ol class="b">
                                            @foreach($deceased as $deceased)
                                    		<a href="{{ $deceased->slug }}#all">
                                                <li class="category">
                                                    {{ $deceased->checkin_date }}, {{ $deceased->full_name }}, {{ $deceased->full_name }}, {{ $deceased->number }}
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
            			"Though lovers be lost, love shall not; And death shall have no dominion."<br> Dylan Thomas.
            		</p>
            	</div>
            </div>