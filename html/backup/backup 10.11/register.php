<?php
  define("permit", TRUE);
  include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/header.inc.php");
  register($conn, 1)
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
            <p class="text-center text-white side-paragraph">Let SalesMonkey grown your <br>business<br></p><a class="btn btn-warning btn-outline-light" role="button" data-bss-hover-animate="pulse" href="<?php printLink("index") ?>">Sign In</a>
        </div>
    </div>
</div>
<div id="content-wrapper-guest" class="d-flex flex-column justify-content-center align-items-center">
    <div id="card-wrapper" class="d-flex flex-column justify-content-center align-items-center">
        <!-- Start: Content Card -->
        <div class="card shadow-lg border-0 content-card" data-aos="flip-left" data-aos-duration="1000" data-aos-delay="500" data-aos-once="true">
            <div class="card-body">
                <h2 class="mt-2 mb-4 text-left text-dark text-wrap">Registeration</h2>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <!-- Start: Registeration Form -->
                            <form method="post">
                                <!-- Start: First Name & Last Name -->
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group"><label>First Name</label><input class="form-control" type="text" placeholder="First Name" name="first_name" required></div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group"><label>Last Name</label><input class="form-control" type="text" placeholder="Last Name" name="last_name" required></div>
                                    </div>
                                </div><!-- End: First Name & Last Name -->
                                <!-- Start: Email & Phone -->
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group"><label>Email</label><input class="form-control" type="email" name="email" placeholder="Email Address" required></div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group"><label>Mobile Number</label><input class="form-control" type="tel" placeholder="Mobile Number" name="phone" minlength="10" maxlength="10" required></div>
                                    </div>
                                </div><!-- End: Email & Phone -->
                                <!-- Start: Password& Password Repeat -->
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="form-group"><label>Password</label><input class="form-control" id="password" type="password" placeholder="Password" name="password" required></div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group"><label>Password Repeat</label><input class="form-control" id="confirm-password" type="password" placeholder="Repeat Password" name="password_repeat" required></div>
                                    </div>
                                </div><!-- End: Password& Password Repeat -->
                                <!-- Start: Password Validator -->
                                <div class="form-row">
                                    <div class="col">
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
                                </div><!-- End: Password Validator -->
                                <!-- Start: Error Handler -->
                                <div class="form-row">
                                    <div class="col-12 text-center">
                                        <!-- Start: Alert Box -->
                                        <div class="alert alert-danger alert-box d-none" role="alert"></div><!-- End: Alert Box -->
                                    </div>
                                </div><!-- End: Error Handler -->
                                <!-- Start: Button & Link -->
                                <div class="form-row">
                                    <div class="col-12 text-center"><button class="btn btn-dark btn-block mb-3" data-bss-hover-animate="pulse" type="submit" name="register_btn">Register</button>
                                        <hr><a href="<?php printLink("index") ?>">Already have an account?</a>
                                    </div>
                                </div><!-- End: Button & Link -->
                            </form><!-- End: Registeration Form -->
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
