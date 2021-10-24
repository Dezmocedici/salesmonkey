<?php
  define("permit", TRUE);
  include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/header.inc.php");
  resetPassword($conn);
?>
<div data-aos="fade-left" data-aos-duration="1000" data-aos-once="true" id="sidebar-guest" class="shadow-lg">
    <div id="nav-wrapper">
        <div id="brand-container" class="justify-content-center"><img class="brand-logo d-none" src="assets/img/logo.png">
            <div class="brand-header-container" data-text="SalesMonkey">
                <h1 class="text-center text-white brand-header-lg">SalesMonkey</h1>
            </div>
            <div>
                <h5 class="text-left text-white brand-header-sm">Sales<br>Monkey</h5>
            </div>
        </div>
        <div id="nav-container" class="d-flex justify-content-center align-items-center mt-0">
            <div class="fa-2x text-white mb-0"><i class="fas fa-mail-bulk"></i></div>
            <p class="text-center text-white side-paragraph">Let SalesMonkey grown your <br>business<br></p><a class="btn btn-warning btn-outline-light" role="button" data-bss-hover-animate="pulse" href="<?php printLink("register") ?>">Sign Up</a>
        </div>
    </div>
</div>
<div id="content-wrapper-guest" class="d-flex flex-column justify-content-center align-items-center">
    <div id="card-wrapper" class="d-flex flex-column justify-content-center align-items-center">
        <!-- Start: Content Card -->
        <div class="card shadow-lg border-0 content-card" data-aos="fade" data-aos-duration="1000" data-aos-delay="500" data-aos-once="true">
            <div class="card-body">
                <h2 class="mt-2 mb-4 text-left text-dark text-wrap"><strong>Reset Password</strong><br></h2>
                <p class="text-muted">Please enter your email address and click on reset password.<br></p>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <!-- Start: Login Form -->
                            <form method="post">
                                <!-- Start: Email Address -->
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group"><label>Email</label>
                                          <input class="form-control" type="text" placeholder="Email" name="email" required></div>
                                    </div>
                                </div><!-- End: Email Address -->
                                <!-- Start: Error Handler -->
                                <div class="form-row">
                                    <div class="col-12 text-center">
                                        <!-- Start: Alert Box -->
                                        <div class="alert alert-danger alert-box d-none" role="alert"></div><!-- End: Alert Box -->
                                    </div>
                                </div><!-- End: Error Handler -->
                                <!-- Start: Button & Links -->
                                <div class="form-row">
                                    <div class="col-12 text-center"><button class="btn btn-dark btn-block mb-3" data-bss-hover-animate="pulse" type="submit" name="reset_password_btn">Reset Password</button>
                                        <hr>
                                        <div class="justify-content-between d-flex"><a href="<?php printLink("register") ?>">Create an account</a>
                                          <a href="<?php printLink("index") ?>">Sign in</a></div>
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
