<?php include("header.php");?>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top wed-navbar">
      <div class="container container-custom">
        <div class="row">
          <div class="col-md-2">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand wed-navbar-logo" href="">
                <img src="img/wed-logo.png">
              </a>
            </div>
          </div>
          <div class="col-md-10">
            <div id="navbar" class="navbar-collapse collapse" aria-expanded="false">
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                  <ul class="wed-navbar-list">
                    <li>
                      <input class="wed-navbar-input" type="text" placeholder="email">
                    </li>
                    <li>
                      <input class="wed-navbar-input" type="text" placeholder="password">
                    </li>
                    <li>
                      <button class="wed-login">Login</button>
                      <span>Or</span>
                      <button class="wed-fb-login">Signin</button>
                    </li>
                    <div class="clearfix"></div>
                  </ul>
                </div>
              </div>
              <!--<ul class="wed-inside-menu">
                <li>My Home</li>
                <li>Search</li>
                <li>Matches</li>
                <li>Messages</li>
                <li>Services</li>
                <li>Update</li>
                <li>Help</li>
                <li><span><img src="img/notification.png"></span></li>
                <li><div class="wed-profile" >
                  <img src="img/pic5.png" data-toggle="modal" data-target="#drop">
                </div>
              </li>

              <!-- MY-ACCOUNT-DROP-DOWN -->

            <!--  <div id="drop" class="modal wed-drop-modal fade" role="dialog">
                <div class="modal-dialog wed-drop-modal-dialog">
                    <div class="modal-content wed-modal-content">
                      <div class="modal-body wed-modal-body">
                        <div class="wed-modal-head">
                          <div class="wed-arrow-up"></div>
                          <h5>Joe Adams</h5>
                          <p>E3642350</p>
                          <hr>
                          <div class="wed-acnt">
                            <li style="width:60%;padding-top: 4px;">Account Type : Free</li>
                            <li style="width:40%;"><button class="wed-upgrade">Upgrade</button></li>
                            <div class="clearfix"></div>
                          </div>
                        </div>
                        <div class="wed-modal-list">
                          <li><a href="#">Edit Profile</a></li>
                          <li><a href="#">Edit Partner Preference</a></li>
                          <li><a href="#">Generate Hororscope</a></li>
                          <li><a href="#">Add Trust Badge</a></li>
                          <li><a href="#">Settings</a></li>
                          <li><a href="#">Feedback</a></li>
                          <li><a href="#">Logout</a></li>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>


                <li><span class="arrow" data-toggle="modal" data-target="#drop"><img src="img/arrow.png"></span></li>



                <div class="clearfix"></div>
              </ul>-->

            </div>
          </div>
        </div>
      </div>
    </nav>

    <!-- BANNER -->

    <div class="wed-banner">
      <div class="container container-custom">
        <div class="row">
          <div class="col-md-6"></div>
          <div class="col-md-6">
            <div class="wed-reg-div animated zoomIn">
              <h3>REGISTER FREE</h3>
              <div class="wed-reg-body">
                <ul>
                  <li>
                    <div class="child1">
                      Profile for
                    </div>
                    <div class="child2">
                      <select class="wed-reg-input-select">
                        <option>Select</option>
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                      Name
                    </div>
                    <div class="child2">
                      <input class="wed-reg-input" type="text">
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                      Gender
                    </div>
                    <div class="child2">
                      <div class="wed-custom">
                          <input id="male" type="radio" name="gender" value="male">
                          <label for="male">Male</label>
                          <input id="female" type="radio" name="gender" value="female">
                          <label for="female">Female</label>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                      Birth Date
                    </div>
                    <div class="child2">
                      <input class="wed-reg-input1" type="text" placeholder="D">
                      <input class="wed-reg-input1" type="text" placeholder="M">
                      <select class="wed-reg-input-select1">
                        <option>Y</option>
                        <option></option>
                        <option></option>
                      </select>

                    </div>
                    <div class="clearfix"></div>
                  </li>
                  
                  <li>
                    <div class="child1">
                      Religion
                    </div>
                    <div class="child2">
                      <select class="wed-reg-input-select" placeholder="Select">
                        <option>Select Religion</option>
                        <option></option>
                        <option></option>
                      </select>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                      Mother tongue
                    </div>
                    <div class="child2">
                      <select class="wed-reg-input-select" placeholder="Select">
                        <option>Select</option>
                        <option></option>
                        <option></option>
                      </select>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                      Caste
                    </div>
                    <div class="child2">
                      <select class="wed-reg-input-select" placeholder="Select">
                        <option>Select Caste</option>
                        <option></option>
                        <option></option>
                      </select>
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                      Phone
                    </div>
                    <div class="child2">
                      <input class="wed-reg-input" type="text" placeholder="Mobile Number">
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                      E mail
                    </div>
                    <div class="child2">
                      <input class="wed-reg-input" type="text" placeholder="Email">
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="child1">
                      Password
                    </div>
                    <div class="child2">
                      <input class="wed-reg-input" type="text" placeholder="Password">
                    </div>
                    <div class="clearfix"></div>
                  </li>
                  <li>
                    <div class="wed-custom1">
                        <input id="check1" type="checkbox" name="check" value="check1">
                        <label for="check1">I have read and agree to the T&C and Privacy Policy</label>
                    </div>
                  </li>
                    <div class="wed-submit-btn-bay">
                      <button class="wed-submit-btn">Submit</button>
                    </div>
                </ul>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- FIND -->

    <div class="wed-find-bay">
      <div class="container container-custom">
        <div class="wed-filter-bay">
          <div class="wed-filter-left">
            <div class="wed-custom2">
                <input id="male1" type="radio" name="gender" value="male">
                <label for="male1"><p>Bride</p></label>
                <input id="female1" type="radio" name="gender" value="female">
                <label for="female1"><p>Groom</p></label>
            </div>
            <div class="wed-age-div">
              <span>Age</span>
              <span><input class="wed-age-input" type="text"></span>
              <span>to</span>
              <span><input class="wed-age-input" type="text"></span>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="wed-filter-right">
            <span>Religion</span>
            <span><select class="wed-age-select"></select></span>
            <span>Caste</span>
            <span><select class="wed-age-select"></select></span>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="wed-search-option">
          <span>Search by ID</span>
          <span>|</span>
          <span>More Search Options</span>
        </div>
        <div class="wed-find-btn-bay">
          <button class="wed-find-btn">Find</button>
        </div>
      </div>
    </div>

    <!-- CONTENT -->

    <div class="wed-content">
      <div class="container container-custom">

    <!-- HIGHLIGHTED-PROFILES -->

        <div class="wed-highlight-profile">
          <h2>Highlighted Profiles</h2>
          <ul>
            <li>
              <div class="wed-high-profile">
                <img src="img/pic1.png">
              </div>
              <h5>Alan Flem</h5>
              <p>BCA, MCA ( 27 )</p>
            </li>
            <li>
              <div class="wed-high-profile">
                <img src="img/pic2.png">
              </div>
              <h5>Ronald Mcray</h5>
              <p>B-Tech, MCA ( 26 )</p>
            </li>
            <li>
              <div class="wed-high-profile">
                <img src="img/pic3.png">
              </div>
              <h5>Johny Dep</h5>
              <p>MCA ( 28 )</p>
            </li>
            <li>
              <div class="wed-high-profile">
                <img src="img/pic4.png">
              </div>
              <h5>Alan Flem</h5>
              <p>BCA ( 25 )</p>
            </li>
            <li>
              <div class="wed-high-profile">
                <img src="img/pic5.png">
              </div>
              <h5>Peter Hughes</h5>
              <p>MBA ( 29 )</p>
            </li>
            <li>
              <div class="wed-high-profile">
                <img src="img/pic6.png">
              </div>
              <h5>Harold Schewenger</h5>
              <p>BBA, MSW ( 26 )</p>
            </li>
            <li>
              <div class="wed-high-profile">
                <img src="img/pic1.png">
              </div>
              <h5>Abraham Lopez</h5>
              <p>BBA ( 25 )</p>
            </li>
            <li>
              <div class="wed-high-profile">
                <img src="img/pic2.png">
              </div>
              <h5>Mathew Carman</h5>
              <p>B-Tech</p>
            </li>
            <li>
              <div class="wed-high-profile">
                <img src="img/pic3.png">
              </div>
              <h5>Franklin George</h5>
              <p>B-Tech ( 28 )</p>
            </li>
            <li>
              <div class="wed-high-profile">
                <img src="img/pic4.png">
              </div>
              <h5>Philipe Roges</h5>
              <p>BBA, MBA ( 26 )</p>
            </li>

          </ul>
        </div>
        <div class="wed-space">
        </div>

        <!-- SUCCESS-STORIES -->

        <div class="wed-succes-stories">
          <h2>Success Stories</h2>
          <ul>
            <li class="animated flipInY">
              <div class="wed-succes-story">
                <img src="img/pic7.png">
              </div>
              <h6>Peter & Lora</h6>
              <p>"Your wide profile base helped<br>
                us to find each other."</p>
            </li>
            <li class="animated flipInY">
              <div class="wed-succes-story">
                <img src="img/pic8.png">
              </div>
              <h6>Lewis & Helen</h6>
              <p>"Thank You for helping us<br>
                  find each other."</p>
            </li>
            <li class="animated flipInY">
              <div class="wed-succes-story">
                <img src="img/pic9.png">
              </div>
              <h6>Joe & Mariya</h6>
              <p>"Your wide profile base helped<br>
                us to find each other."</p>
            </li>
          </ul>
          <div class="wed-find-btn-bay">
            <button class="wed-find-btn1">See more Success Stories</button>
          </div>
        </div>
      </div>

      <!-- ABOUT -->

      <div class="wed-about">
          <div class="container container-custom">
            <h2>About Catholic Matrimony</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam bibendum vitae purus vel blandit. Sed nec laoreet ipsum, et facilisis purus. Nulla eleifend nisl eget urna viverra tristique. Duis ullamcorper pharetra orci, eget fringilla ipsum pulvinar vehicula. Ut fermentum vel velit in finibus. Phasellus sit amet quam placerat, dictum augue ac, malesuada dolor. Donec rutrum interdum enim sed facilisis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas pharetra blandit mi, non aliquam leo rutrum sit amet. Donec pretium blandit eros, at interdum urna placerat consectetur. Duis sit amet dictum magna, sit amet euismod nisi.</p>
            <div class="wed-find-btn-bay">
              <button class="wed-find-btn1">Read more</button>
            </div>
          </div>
      </div>
    </div>

    <!-- FOOTER -->
 <?php include("footer.php");?>
</body></html>