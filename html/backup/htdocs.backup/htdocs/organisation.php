<?php
  define("permit", TRUE);
  include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/header.inc.php");

  updateBusinessProfile($conn);
?>

<div id="addModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add a Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
        <div class="modal-body">
            <div class="col">
                <div class="form-row">
                    <div class="col-12 col-md-6">
                        <div class="form-group"><label>First Name</label><input type="text" class="form-control" placeholder="First Name" name="first_name" /></div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group"><label>Last Name</label><input type="text" class="form-control" placeholder="Last Name" name="last_name" /></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-12 col-md-6">
                        <div class="form-group"><label>Email Address</label><input type="email" class="form-control" name="email" placeholder="Email Address" /></div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group"><label>Phone Number</label><input type="tel" class="form-control" placeholder="Phone Number" name="phone" /></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                          <label>User Type</label>
                          <select type="text" class="form-control">
                            <option selected disabled>Choose...</option>
                            <?php buildUserTypeSelector(); ?>
                          </select>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="updateModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Staff Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
        <div class="modal-body">
            <div class="col">
                <div class="form-row">
                    <div class="col-12 col-md-6">
                        <div class="form-group"><label>First Name</label><input type="text" class="form-control" placeholder="First Name" name="first_name" /></div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group"><label>Last Name</label><input type="text" class="form-control" placeholder="Last Name" name="last_name" /></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-12 col-md-6">
                        <div class="form-group"><label>Email Address</label><input type="email" class="form-control" name="email" placeholder="Email Address" /></div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group"><label>Phone Number</label><input type="tel" class="form-control" placeholder="Phone Number" name="phone" /></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                          <label>User Type</label>
                          <select type="text" class="form-control">
                            <option selected disabled>Choose...</option>
                            <?php buildUserTypeSelector(); ?>
                          </select>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="card-wrapper">
        <!-- Start: Content Card -->
        <div class="card shadow-lg mt-2 mb-2 border-0 content-card" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true">
            <div class="card-body">
                <!-- Start: Header -->
                <div class="mb-4 d-lg-flex justify-content-lg-between">
                    <!-- Start: Title -->
                    <div>
                        <h4 class="text-wrap m-0"><?php printBusiness($conn); ?> | Organisation</h4>
                        <small>Your organisation has 10 users. <?php printStats($conn, 2) ?> of these are staff and .. of these are manager<br></small>
                    </div><!-- End: Title -->
                    <!-- Start: Dropdown -->
                    <div>
                        <div class="dropdown mb-2">
                          <button class="btn btn-dark dropdown-toggle btn-block" aria-expanded="false" data-toggle="dropdown" data-bss-hover-animate="pulse" type="button">Action</button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <h6 class="dropdown-header no-select">Staff</h6>
                                <button class="dropdown-item" data-toggle="modal" data-target="#addModal">Add a Staff</button>
                            </div>
                        </div>
                    </div>
                    <!-- End: Dropdown -->
                </div><!-- End: Header -->

                <!-- Start: Tabs -->
                <div>
                    <!-- Start: Tabs & Tables -->
                    <div>
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <a class="nav-link active" role="tab" data-toggle="tab" href="#staff-tab">Staff</a></li>
                                <li class="nav-item" role="presentation">
                                  <a class="nav-link" role="tab" data-toggle="tab" href="#business-detail">Business detail</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" role="tabpanel" id="staff-tab">
                                    <!-- Start: Audiences Table -->
                                    <div class="card border-top-0">
                                        <div class="card-body">
                                            <div class="table-responsive table mt-2" role="grid">
                                              <table id="staff" class="table table-striped" cellspacing="0" style="width:100%">
                                              <thead>
                                                <tr>
                                                  <th>Email</th>
                                                  <th>Name</th>
                                                  <th>Phone</th>
                                                  <th>Date Added</th>
                                                  <th>Last Changed</th>
                                                  <th></th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?php fetchStaff($conn); ?>
                                              </tbody>
                                              <tfoot>
                                                <tr>
                                                  <th>Email</th>
                                                  <th>Name</th>
                                                  <th>Phone</th>
                                                  <th>Date Added</th>
                                                  <th>Last Changed</th>
                                                  <th></th>
                                                </tr>
                                              </tfoot>
                                            </table>
                                            </div>
                                        </div>
                                    </div><!-- End: Audiences Table -->
                                </div>
                                <div class="tab-pane" role="tabpanel" id="business-detail">
                                    <!-- Start: Staffs Table -->
                                    <div class="card border-top-0">
                                        <div class="card-body">
                                          <!-- Start: Business Detail Content Card -->
                                    <?php if (isset($_SESSION['businessID']) && $_SESSION['user_type'] == 0)
                                          {
                                            $sql = "SELECT
                                                    users.first_name,
                                                    businesses.name,
                                                    businesses.abn,
                                                    businesses.phone,
                                                    businesses.address,
                                                    businesses.email,
                                                    businesses.url
                                                    FROM ((relationships
                                                    JOIN businesses
                                                    ON (relationships.business_id = businesses.id))
                                                    JOIN users
                                                    ON (relationships.user_id = users.id))
                                                    WHERE businesses.id = $_SESSION[businessID];";

                                            $result = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_array($result);
                                            $bName = $row['name'];
                                            $bABN = $row['abn'];
                                            $bPhone = $row['phone'];
                                            $bEmail = $row['email'];
                                            $bAddress = $row['address'];
                                            $bLink = $row['url'];

                                            echo '<h4 class="mt-2 mb-4">Business Detail</h4>
                                                <div class="container">
                                                  <!-- Start: Business DetailForm -->

                                                    <div class="form-row">
                                                      <div class="col-sm-12 col-xl-6">
                                                        <label>Business Name</label>
                                                        <div class="form-group input-group">
                                                          <input class="form-control" type="text" placeholder="Business Name" name="business_name" value="' . $bName . '" disabled>
                                                          <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary" type="button">Copy</button>
                                                          </div>
                                                        </div>
                                                        </div>
                                                    <div class="col-sm-12 col-xl-6">
                                                      <label>ABN Number</label>
                                                      <div class="form-group input-group">
                                                        <input class="form-control" type="text" placeholder="ABN Number" name="business_abn" minlength="11" maxlength="11" value="' . $bABN . '" disabled>
                                                        <div class="input-group-append">
                                                          <button class="btn btn-outline-secondary" type="button">Copy</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>

                                                  <div class="form-row">
                                                    <div class="col-sm-12 col-xl-6">
                                                      <label>Email Address<br></label>
                                                      <div class="form-group input-group">
                                                        <input class="form-control" type="email" name="business_email" placeholder="Business Email Address" value="' . $bEmail . '" disabled>
                                                        <div class="input-group-append">
                                                          <button class="btn btn-outline-secondary" type="button">Copy</button>
                                                        </div>
                                                      </div>
                                                    </div>

                                                    <div class="col-sm-12 col-xl-6">
                                                      <label>Phone Number</label>
                                                      <div class="form-group input-group">
                                                        <input class="form-control" type="tel" placeholder="Business Phone Number" name="business_phone" minlength="10" maxlength="10" value="' . $bPhone . '" disabled>
                                                        <div class="input-group-append">
                                                          <button class="btn btn-outline-secondary" type="button">Copy</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>

                                                  <div class="form-row">
                                                    <div class="col-sm-12 col-xl-12">
                                                      <label>Address (optional)</label>
                                                      <div class="form-group input-group">
                                                        <input class="form-control" type="text" placeholder="Address" name="business_address" value="' . $bAddress . '" disabled>
                                                        <div class="input-group-append">
                                                          <button class="btn btn-outline-secondary" type="button">Copy</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>

                                                  <div class="form-row">
                                                    <div class="col-sm-12 col-xl-12">
                                                      <label>Business Link (optional)</label>
                                                      <div class="form-group input-group">
                                                        <input class="form-control" type="text" placeholder="URL Link" name="business_link" value="' . $bLink . '" disabled>
                                                        <div class="input-group-append">
                                                          <button class="btn btn-outline-secondary" type="button">Copy</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                              </div>';
                                          }
                                          else if (isset($_SESSION['businessID']) && $_SESSION['user_type'] == 1 )
                                          {
                                            $sql = "SELECT
                                                    users.first_name,
                                                    businesses.name,
                                                    businesses.abn,
                                                    businesses.phone,
                                                    businesses.address,
                                                    businesses.email,
                                                    businesses.url
                                                    FROM ((relationships
                                                    JOIN businesses
                                                    ON (relationships.business_id = businesses.id))
                                                    JOIN users
                                                    ON (relationships.user_id = users.id))
                                                    WHERE businesses.id = $_SESSION[businessID];";

                                            $result = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_array($result);
                                            $bName = $row['name'];
                                            $bABN = $row['abn'];
                                            $bPhone = $row['phone'];
                                            $bEmail = $row['email'];
                                            $bAddress = $row['address'];
                                            $bLink = $row['url'];

                                            echo '<h4 class="mt-2 mb-4">Business Detail</h4>
                                                <div class="container">
                                                  <!-- Start: Business DetailForm -->
                                                  <form method="post">
                                                    <div class="form-row">
                                                      <div class="col-sm-12 col-xl-6">

                                                      <div class="form-group"><label>Business Name</label><input class="form-control" type="text" placeholder="Business Name" name="business_name" value="' . $bName . '"></div>
                                                    </div>
                                                    <div class="col-sm-12 col-xl-6">
                                                      <div class="form-group"><label>ABN Number</label><input class="form-control" type="text" placeholder="ABN Number" name="business_abn" minlength="11" maxlength="11" value="' . $bABN . '"></div>
                                                    </div>
                                                  </div>
                                                  <div class="form-row">
                                                    <div class="col-sm-12 col-xl-6">
                                                      <div class="form-group"><label>Email Address<br></label><input class="form-control" type="email" name="business_email" placeholder="Business Email Address" value="' . $bEmail . '"></div>
                                                    </div>
                                                    <div class="col-sm-12 col-xl-6">
                                                      <div class="form-group"><label>Phone Number</label><input class="form-control" type="tel" placeholder="Business Phone Number" name="business_phone" minlength="10" maxlength="10" value="' . $bPhone . '"></div>
                                                    </div>
                                                  </div>
                                                  <div class="form-row">
                                                    <div class="col-sm-12 col-xl-12">
                                                      <div class="form-group"><label>Address (optional)</label><input class="form-control" type="text" placeholder="Address" name="business_address" value="' . $bAddress . '"></div>
                                                    </div>
                                                  </div>
                                                  <div class="form-row">
                                                    <div class="col-sm-12 col-xl-12">
                                                      <div class="form-group"><label>Business Link (optional)</label><input class="form-control" type="text" placeholder="URL Link" name="business_link" value="' . $bLink . '"></div>
                                                    </div>
                                                  </div>
                                                  <div class="form-row">
                                                    <div class="col-12 text-right">
                                                    <button class="btn btn-dark update-btn" data-bss-hover-animate="pulse" type="submit" name="update_business_btn">Update</button></div>
                                                  </div>
                                                </form>
                                              </div>';
                                          }
                                          ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
  include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/footer.inc.php");
?>
