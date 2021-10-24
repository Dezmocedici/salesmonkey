<?php
  define("permit", TRUE);
  include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/header.inc.php");
?>
<div id="content-wrapper" class="d-flex flex-column">
  <div id="card-wrapper">
    <!-- Start: Content Card -->
    <div class="card shadow-lg mb-2 border-0 content-card" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true">
      <div class="card-body">
        <!-- Start: Header -->
        <div class="d-lg-flex justify-content-lg-between mb-2">
          <!-- Start: Title -->
          <div>
            <h4 class="text-wrap m-0"><?php printBusiness($conn); ?> | Campaigns</h4><small>You has 10 released campaigns. 10 of these are active<br></small>
          </div><!-- End: Title -->
          <!-- Start: Dropdown -->
          <div>
            <div class="dropdown mb-2"><button class="btn btn-dark dropdown-toggle btn-block" aria-expanded="false" data-toggle="dropdown" data-bss-hover-animate="pulse" type="button">Action</button>
              <div class="dropdown-menu dropdown-menu-right">
                <h6 class="dropdown-header no-select">Campaign</h6><a class="dropdown-item" data-toggle="modal" data-target="#create-campaign">Create New Campaign</a>
              </div>
            </div>
          </div><!-- End: Dropdown -->
        </div><!-- End: Header -->
        <!-- Start: Title & Table -->
        <div>
          <div>
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-toggle="tab" href="#contacts-tab">Campaigns</a></li>
              <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" href="#emailbuilder-tab">Email Builder</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" role="tabpanel" id="contacts-tab">
                <!-- Start: Customer table -->
                <div class="card border-top-0">
                  <div class="card-body">
                    <div class="table-responsive table mt-2" role="grid">
                      <table class="table my-0" id="campaigns">
                        <thead>
                          <tr>
                            <th>Campaign</th>
                            <th>Status</th>
                            <th> </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php fetchCampaigns($conn); ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th><strong>Campaign</strong></th>
                            <th><strong>Status</strong></th>
                            <th><strong> </strong></th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div><!-- End: Customer table -->
              </div>
              <div class="tab-pane" role="tabpanel" id="emailbuilder-tab">
                <!-- Start: Customer table -->
                <div class="card border-top-0">
                  <div class="card-body">

                    <div id="container">
                      <!--Email Builder-->
                    </div>

                  </div>
                </div><!-- End: Customer table -->
              </div>
            </div>
          </div>
        </div><!-- End: Title & Table -->
      </div>
    </div><!-- End: Content Card -->
  </div>
</div>
<?php
  include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/footer.inc.php");
?>
