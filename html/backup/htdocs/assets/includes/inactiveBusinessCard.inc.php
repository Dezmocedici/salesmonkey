<div id="content-wrapper" class="d-flex flex-column">
  <div id="card-wrapper">
    <!-- Start: Content Card -->
    <div class="card shadow-lg mt-2 mb-2 border-0 content-card" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true">
      <div class="card-body">
        <h4 class="mt-2 mb-4 text-wrap">Register Your Business</h4>
        <div class="container">
          <h5>Business Detail</h5>
          <hr><!-- Start: Business DetailForm -->
          <form method="post">
            <div class="form-row">
              <div class="col-sm-12 col-xl-6">
                <div class="form-group"><label>Business Name</label><input class="form-control" type="text" placeholder="Business Name" name="business_name" required></div>
              </div>
              <div class="col-sm-12 col-xl-6">
                <div class="form-group"><label>ABN Number</label><input class="form-control" type="text" placeholder="ABN Number" name="business_abn" minlength="11" maxlength="11" required></div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-sm-12 col-xl-6">
                <div class="form-group"><label>Email Address<br></label><input class="form-control" type="email" name="business_email" placeholder="Business Email Address" required></div>
              </div>
              <div class="col-sm-12 col-xl-6">
                <div class="form-group"><label>Phone Number</label><input class="form-control" type="tel" placeholder="Business Phone Number" name="business_phone" minlength="10" maxlength="10" required></div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-sm-12 col-xl-12">
                <div class="form-group"><label>Address (optional)</label><input class="form-control" type="text" placeholder="Address" name="business_address"></div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-sm-12 col-xl-12">
                <div class="form-group mb-0"><label>Business Link (optional)</label><input class="form-control" type="url" placeholder="URL Link" name="business_link">
                <!-- Start: Alert Box -->
                  <div class="alert alert-danger alert-box mt-4 d-none" role="alert"></div><!-- End: Alert Box -->
                  <small class="text-muted">By clicking Register, you agree to our Terms and Policy. You may receive email notifications from us and can opt out at any time.<br></small>
                  <small class="text-muted">** To fully access functionality of SalesMonkey please register business **<br></small>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-12 text-right"><button class="btn btn-dark update-btn" data-bss-hover-animate="pulse" type="submit" name="register_business_btn">Register</button></div>
            </div>
          </form><!-- End: Business DetailForm -->
        </div>
      </div>
    </div><!-- End: Content Card -->
  </div>
</div>
