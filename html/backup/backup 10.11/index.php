<?php
  define("permit", TRUE);
  include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/header.inc.php");
?>

  <div data-aos="fade-left" data-aos-duration="1000" data-aos-once="true" id="sidebar-guest" class="shadow-lg">
      <div id="nav-wrapper">
          <div id="brand-container" class="justify-content-center">
            <img class="brand-logo d-none" src="assets/img/logo.png">
              <div class="brand-header-container" data-text="SalesMonkey">
                  <h1 class="text-center text-white brand-header-lg">SalesMonkey</h1>
              </div>
              <div>
                  <h5 class="text-left text-white brand-header-sm">Sales<br>Monkey</h5>
              </div>
          </div>
          <div id="nav-container" class="d-flex justify-content-center align-items-center mt-0">
              <p class="text-center text-white side-paragraph">Let SalesMonkey grown your <br>business<br></p><a class="btn btn-warning btn-outline-light" role="button" data-bss-hover-animate="pulse" href="<?php printLink("register") ?>">Sign Up</a>
          </div>
      </div>
  </div>
  <div id="content-wrapper-guest" class="d-flex flex-column justify-content-center align-items-center">
      <div id="card-wrapper" class="d-flex flex-column justify-content-center align-items-center">
          <!-- Start: Content Card -->
          <div data-aos="flip-left" data-aos-duration="1000" data-aos-delay="500" data-aos-once="true" class="card shadow-lg border-0 content-card">
              <div class="card-body">
                  <h2 class="mt-2 mb-4 text-left text-dark text-wrap">Sign In</h2>
                  <div class="container">
                      <div class="row justify-content-center">
                          <div class="col-12">
                              <!-- Start: Login Form -->
                              <form method="post">
                                  <!-- Start: Username & Password -->
                                  <div class="form-row">
                                      <div class="col-12">
                                          <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" type="text" placeholder="Email or phone number" name="username">
                                          </div>
                                      </div>
                                      <div class="col-12">
                                          <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type="password" placeholder="Password" name="password">
                                              <div class="form-check mt-2"><input class="form-check-input" type="checkbox" id="keep_login">
                                                <label class="form-check-label" for="keep_login">Keep me logged in</label>
                                              </div>
                                          </div>
                                      </div>
                                  </div><!-- End: Username & Password -->
                                  <!-- Start: Error Handler -->
                                  <div class="form-row">
                                      <div class="col-12 text-center">
                                          <!-- Start: Alert Box -->
                                          <div class="alert alert-danger d-none alert-box" role="alert"></div>
                                          <!-- End: Alert Box -->
                                      </div>
                                  </div><!-- End: Error Handler -->
                                  <!-- Start: Button & Link -->
                                  <div class="form-row">
                                      <div class="col-12 text-center">
                                        <button class="btn btn-dark btn-block mb-3" data-bss-hover-animate="pulse" type="submit" name="login_btn">Login</button>
                                          <hr>
                                          <div class="justify-content-between d-flex">
                                            <a href="<?php printLink("forgetPassword") ?>">Forgotten password?</a>
                                            <a href="<?php printLink("register") ?>">Create an Account</a>
                                          </div>
                                      </div>
                                  </div><!-- End: Button & Link -->
                              </form>
                              <!-- End: Login Form -->
                          </div>
                      </div>
                  </div>
              </div>
          </div><!-- End: Content Card -->
      </div>
  </div>
</div>

<?php
  include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/footer.inc.php");
?>
