 <div class="section section-white" id="all">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="card card-blue">
                                <h4 class="header-text text-center">
                                    Deceased No: {{ $number }}
                                </h4>
                                <h5 class="text-center">
                                    {{ $fullname }} of gender<strong><i> {{ $gender }} </i></strong>was brought in on {{ $checkin_date }}.
                                </h5>
                                <div class="text-center text-justify">
                                    <p>
                                          {!! nl2br($description) !!}
                                    </p>
                                    <p class="text-center">-----------------------------------------------------------------------------
                                          Below is a link to the deceased photo.<br>
                                          <i><strong>WARNING! The photo may be Disturbing.<br><a href="" target="_blank"><i><small>Our Terms and Conditions Apply</small></i></strong></i></a><br>
                                          <a href="{{$photo_path}}" target="_blank">Click here to view photo.</a>
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