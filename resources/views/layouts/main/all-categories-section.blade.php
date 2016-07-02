<div class="section section-white" id="hymn">
                <div class="container">
                    <h4 class="header-text text-center">ALL Categories</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-blue">
                                <p>
                                	<ol class="a">
                                            @foreach($category as $category)
                                    		<a href="#"><li class="category">{{ $category->name}}</li></a>
                                            @endforeach
                                    	</ol>
                                </p>
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