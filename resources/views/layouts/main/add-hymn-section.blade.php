<div class="section section-gray" id="hymn">
                <div class="container">
                    <h4 class="header-text text-center">Add a Hymn</h4>
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">
                                @if (Session::has('info'))
                                    <div class="alert alert-info" role="alert">
                                      {{ Session::get('info') }}
                                    </div>
                                  @endif
                            {!!
                              Form::open(array(
                              'url' => 'submit-hymn',
                              'action'=>'route("add-hymn")',
                              'method'=>'POST',
                              'class' => 'form-horizontal'
                              ))
                              !!}
                              <div class="form-group">
                                <div class="col-sm-12">
                                  <input type="text" class="form-control" name="title" placeholder="Enter Title of Hymn here..." required>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-12">
                                  <input type="author" class="form-control" name="author" placeholder="Enter Author of Hymn here..." required>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-12">
                                  <select class="form-control" name="category" required>
                                      <option class=""value="">Choose Category from here...</option>
                                      <option value="Entrance">Entrance</option>
                                      <option value="Mass">Mass</option>
                                      <option value="Bible Procession">Bible Procession</option>
                                      <option value="Offertory">Offertory</option>
                                      <option value="Peace">Peace</option>
                                      <option value="Communion">Communion</option>
                                      <option value="Thanksgiving">Thanksgiving</option>
                                      <option value="Advent">Advent</option>
                                      <option value="Lent">Lent</option>
                                      <option value="Christmas">Christmas</option>
                                      <option value="Pentecost">Pentecost</option>
                                      <option value="Epiphany">Epiphany</option>
                                      <option value="Palm Sunday">Palm Sunday</option>
                                      <option value="Ascension">Ascension</option>
                                      <option value="Baptism">Baptism</option>
                                      <option value="Marriage">Marriage</option>
                                      <option value="Funeral">Funeral</option>
                                      <option value="Exit">Exit</option>
                                      <option value="Holy Week">Holy Week</option>
                                      <option value="Easter">Easter</option>
                                      <option value="Marian">Marian Hymns</option>
                                      <option value="Holy Trinity">Holy Trinity</option>
                                      <option value="Christ The King">Christ The King</option>
                                      <option value="Saints">Saints</option>
                                      <option value="Forgiveness">Forgiveness</option>
                                      <option value="Christ the King">Christ the King</option>
                                      <option value="Discipleship">Discipleship</option>
                                      <option value="Sacred Heart">Sacred Heart</option>
                                      <option value="Addedum">Addedum</option>
                                      <option value="General">General</option>
                                      <option value="Praise and Worship">Praise and Worship</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-12">
                                  <textarea type="textarea" class="form-control" name="lyrics" rows="25" placeholder="Enter chorus, verses, etc. here... Enter in the order of singing." required></textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-4">
                                  <button type="submit" class="btn btn-default">
                                    <i class="fa fa-check"></i> Submit Lyrics
                                  </button>
                                </div>
                              </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>