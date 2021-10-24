<?php
  define("permit", TRUE);
  include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/header.inc.php");
  activateAccount($conn);
?>

</div>
<div id="content-wrapper" class="d-flex flex-column">
<div id="card-wrapper">
  <!-- Start: Content Card -->
  <div class="card shadow-lg mt-2 mb-2 border-0 content-card" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true">
    <div class="card-body">
      <h4 class="mt-2 mb-4 text-wrap">Account | Activation (Pending)</h4>
      <div class="container">
        <!-- Start: Activate Account -->
        <form method="post">
          <div class="form-row">
            <div class="col-sm-12 col-xl-12">
              <div class="alert alert-success mb-0 text-center d-flex flex-column rounded-corner">
                <p class="mb-1">Activation link has been sent to your email please check in your mail box.<br></p>
                <small class="m-0">To gain full functionality of SalesMonkey please click verify link in your mail box and refresh thispage.<br></small>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-12 text-right"><button class="btn btn-dark update-btn mt-4" data-bss-hover-animate="pulse" type="submit" name="refresh_btn">Refresh</button></div>
          </div>
        </form><!-- End: Activate Account -->
      </div>
    </div>
  </div><!-- End: Content Card -->
</div>
<?php
  include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/footer.inc.php");
?>
