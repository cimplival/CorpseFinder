 <div class="section section-white" id="hymn">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="card card-blue">
                                <h4 class="header-text text-center">
                                    {{ $hymn->title }}
                                </h4>
                                <div class="text-center">
                                    <p>
                                        {!!  nl2br($hymn->lyrics) !!}
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
                       <i>Author: {{ $hymn->author }}</i>
                    </p>
            	</div>
            </div>