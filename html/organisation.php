<?php
  define("PERMIT", TRUE);
  include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/header.inc.php");
?>

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
                    </div><!-- End: Title -->

                </div><!-- End: Header -->

                <!-- Start: Tabs -->
                <div>
                    <!-- Start: Tabs & Tables -->
                    <div>
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li id="t2" class="nav-item" role="presentation">
                                  <a class="nav-link active" role="tab" data-toggle="tab" href="#staff-tab">Staff</a>
                                </li>
                                <li id="t3" class="nav-item" role="presentation">
                                  <a class="nav-link" role="tab" data-toggle="tab" href="#business-detail">Business detail</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" role="tabpanel" id="staff-tab">
                                    <!-- Start: Audiences Table -->
                                    <div class="card border-top-0">
                                        <div class="card-body">
                                            <div class="table-responsive table mt-2" role="grid">
                                              <div class="d-flex justify-content-end">
                                                <a class="editor-create-staff btn btn-dark mb-3">Create new record</a>
                                              </div>
                                              <table id="users" class="table table-striped table-hover" cellspacing="0" width="100%">
                                                <thead>
                                                  <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Position</th>
                                                    <th></th>
                                                    <th></th>
                                                  </tr>
                                                </thead>
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
                                            include( $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/staff/organisationform.inc.php');
                                          }
                                          else if (isset($_SESSION['businessID']) && $_SESSION['user_type'] == 1 )
                                          {
                                            include( $_SERVER['DOCUMENT_ROOT'] . '/assets/includes/owner/organisationform.inc.php');
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
