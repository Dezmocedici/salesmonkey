<?php
  define("PERMIT", TRUE);
  include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/header.inc.php");
?>

<div id="content-wrapper" class="d-flex flex-column">
  <div id="card-wrapper">
    <!-- Start: Content Card -->
    <?php

    $sql = "SELECT * FROM users WHERE id= $_SESSION[id];";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $fName = $row['first_name'];
    $lName = $row['last_name'];
    $email = $row['email'];
    $phone = $row['phone'];
    ?>
    <div class="card shadow-lg mb-5 border-0 content-card" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true" id="user-card">
      <div class="card-body">
        <!-- Start: Header -->
        <div class="mt-2 mb-4">
          <div class="text-truncate">
            <h4 class="text-wrap m-0"><?php echo $fName ?> | Profile</h4>
          </div>
        </div><!-- End: Header -->
        <div class="container">
          <div class="row justify-content-between">
            <div class="col-12 col-sm-5">
              <!-- Start: Change Detail Form -->
              <form method="post">
                <div class="form-row">
                  <div class="col-12">
                    <h5>User Info</h5>
                    <hr>
                    <!-- Need to be convert to a function-->
                    <div class="form-group"><label>First Name</label>
                      <input class="form-control" type="text" placeholder="First Name" name="first_name" value="<?php echo $fName; ?>"></div>
                  </div>
                  <div class="col-12">
                    <div class="form-group"><label>Last Name</label>
                      <input class="form-control" type="text" placeholder="Last Name" name="last_name" value="<?php echo $lName; ?>"></div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-12">
                    <div class="form-group"><label>Email Address<br></label>
                      <input class="form-control" type="email" name="email" placeholder="Email Address" value="<?php echo $email; ?>"></div>
                  </div>
                  <div class="col-12">
                    <div class="form-group"><label>Phone Number</label>
                      <input class="form-control" type="tel" placeholder="Phone Number" name="phone" minlength="10" maxlength="10" value="<?php echo $phone; ?>"></div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-12 text-right"><button class="btn btn-dark update-btn mb-4" data-bss-hover-animate="pulse" type="submit" name="update_profile_btn">Update</button></div>
                </div>
              </form><!-- End: Change Detail Form -->
            </div>
            <div class="col-12 col-sm-5">
              <!-- Start: Change Password Form -->
              <form method="post">
                <div class="form-row">
                  <div class="col-12">
                    <h5>Password Change</h5>
                    <hr>
                    <div class="form-group"><label>Current Password</label><input class="form-control" type="password" placeholder="Current Password" name="old_password" required></div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="col-12">
                    <div class="form-group"><label>New Password<br></label><input class="form-control" id="password" type="password" placeholder="New Password" name="password"></div>
                  </div>
                  <div class="col-12">
                    <div class="form-group"><label>Password Repeat</label><input class="form-control" id="confirm-password" type="password" placeholder="Repeat Password" name="password_repeat"></div>
                  </div>
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
                </div>
                <div class="form-row">
                  <div class="col-12 text-right"><button class="btn btn-dark update-btn" data-bss-hover-animate="pulse" type="submit" name="update_password_btn">Update</button></div>
                </div>
              </form><!-- End: Change Password Form -->
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
