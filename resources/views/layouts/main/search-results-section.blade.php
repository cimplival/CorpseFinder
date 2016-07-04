<div class="section section-white" id="all">
    <div class="container">
        <h4 class="header-text text-center">Search Results</h4>
        <div class="row">
            <div class="col-md-8 col-offset-md-2">
                <div class="card card-blue">
                    <div class="text">
                        <p>
                            @if (count($deceased) === 0)
                            Sorry, there were no results found.
                            @elseif (count($deceased) >= 1)
                            <ol class="b">
                                @foreach($deceased as $deceased)
                                <a href="{{ $deceased->slug }}#all">
                                    <li class="category">
                                        {{ $deceased->full_name }} {{ $deceased->gender }} of No. {{ $deceased->number }} was checked in on {{ $deceased->checkin_date }}. 
                                    </li>
                                </a>
                                @endforeach
                                
                            </ol>
                            @endif
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