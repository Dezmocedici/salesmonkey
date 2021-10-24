<?php
  define("PERMIT", TRUE);
  include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/header.inc.php");


?>

<div id="content-wrapper-special" class="d-flex flex-column justify-content-center align-items-center">
    <div id="card-wrapper" class="d-flex flex-column justify-content-center align-items-center">
        <!-- Start: Content Card -->
        <div class="card shadow-lg border-0 content-card" data-aos="fade" data-aos-duration="1000" data-aos-delay="500" data-aos-once="true">
            <div class="card-body">
                <h2 class="mt-2 mb-4 text-left text-dark text-wrap"><strong>Reset Password</strong><br></h2>
                <p class="text-muted">Please enter new password and click on reset password.<br></p>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <!-- Start: Login Form -->
                            <form method="post">
                                <!-- Start: Email Address -->
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group"><label>New Password</label>
                                          <input class="form-control" type="password" id="password" placeholder="Password" name="password" required></div>
                                    </div>
                                </div><!-- End: Email Address -->
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group"><label>Password Repeat</label>
                                          <input class="form-control" type="password"  id="confirm-password" placeholder="Password Repeat" name="password_repeat" required></div>
                                    </div>
                                </div><!-- End: Email Address -->
                                <!-- Start: Error Handler -->
                                <div class="form-row">
                                    <div class="col-12 text-center">
                                        <!-- Start: Alert Box -->
                                        <div class="alert alert-danger alert-box d-none" role="alert"></div><!-- End: Alert Box -->
                                    </div>
                                </div><!-- End: Error Handler -->
                                <div class="col-12">
                                  <div class="form-group">
                                    <div class="form-text low-upper-case"><i class="fa fa-times"></i><small class="text-muted">&nbsp;1 Lowercase &amp; 1 uppercase</small></div>
                                    <div class="form-text one-number"><i class="fa fa-times"></i><small class="text-muted">&nbsp;1 Number (0-9)</small></div>
                                    <div class="form-text one-special-char"><i class="fa fa-times"></i><small id="password-check" class="text-muted">&nbsp;1 Special Character (!@#$%^&amp;*)</small></div>
                                    <div class="form-text eight-char"><i class="fa fa-times"></i><small class="text-muted">&nbsp;At least 8 Character</small></div>
                                    <div class="form-text password-match"><i class="fa fa-times"></i><small class="text-muted">&nbsp;Password match</small></div>
                                    <div class="form-text"><small class="text-muted">Password Strength:&nbsp;</small><small id="result"></small></div>
                                    <div class="progress">
                                      <!-- Start: Progress bar -->
                                      <div id="password-strength" class="progress-bar bg-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div><!-- End: Progress bar -->
                                    </div>
                                  </div>
                                </div>
                                <!-- Start: Button & Links -->
                                <div class="form-row">
                                    <div class="col-12 text-center">
                                      <button class="btn btn-dark btn-block mb-3" data-bss-hover-animate="pulse" type="submit" name="reset_password_btn">Reset Password</button>
                                    </div>
                                </div><!-- End: Button & Links -->
                            </form><!-- End: Login Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End: Content Card -->
    </div>
</div>
<?php
  include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/footer.inc.php");
?>
