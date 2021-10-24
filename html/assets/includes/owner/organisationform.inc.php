<?php
  $fetch = fetchBusiness($conn);
?>
<h4 class="mt-2 mb-4">Business Detail</h4>
    <div class="container">
      <!-- Start: Business DetailForm -->
      <form method="post">
        <div class="form-row">
          <div class="col-sm-12 col-xl-6">
          <div class="form-group"><label>Business Name</label><input class="form-control" type="text" placeholder="Business Name" name="business_name" value="<?php echo $fetch['name']; ?>"></div>
        </div>
        <div class="col-sm-12 col-xl-6">
          <div class="form-group"><label>ABN Number</label><input class="form-control" type="text" placeholder="ABN Number" name="business_abn" minlength="11" maxlength="11" value="<?php echo $fetch['abn']; ?>"></div>
        </div>
      </div>
      <div class="form-row">
        <div class="col-sm-12 col-xl-6">
          <div class="form-group"><label>Email Address<br></label><input class="form-control" type="email" name="business_email" placeholder="Business Email Address" value="<?php echo $fetch['email']; ?>"></div>
        </div>
        <div class="col-sm-12 col-xl-6">
          <div class="form-group"><label>Phone Number</label><input class="form-control" type="tel" placeholder="Business Phone Number" name="business_phone" minlength="10" maxlength="10" value="<?php echo $fetch['phone']; ?>"></div>
        </div>
      </div>
      <div class="form-row">
        <div class="col-sm-12 col-xl-12">
          <div class="form-group"><label>Address (optional)</label><input class="form-control" type="text" placeholder="Address" name="business_address" value="<?php echo $fetch['address'];  ?>"></div>
        </div>
      </div>
      <div class="form-row">
        <div class="col-sm-12 col-xl-12">
          <div class="form-group"><label>Business Link (optional)</label><input class="form-control" type="text" placeholder="URL Link" name="business_link" value="<?php echo $fetch['url']; ?>"></div>
        </div>
      </div>
      <div class="form-row">
        <div class="col-12 text-right">
        <button class="btn btn-dark update-btn" data-bss-hover-animate="pulse" type="submit" name="update_business_btn">Update</button></div>
      </div>
    </form>
  </div>
