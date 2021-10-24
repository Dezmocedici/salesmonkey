<?php
  define("PERMIT", TRUE);
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
            <h4 class="text-wrap m-0"><?php printBusiness($conn); ?> | Campaigns</h4>
          </div><!-- End: Title -->
        </div><!-- End: Header -->
        <!-- Start: Title & Table -->
        <div>
          <div>
            <ul class="nav nav-tabs" role="tablist">
              <li id="t6" class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-toggle="tab" href="#contacts-tab">Campaigns</a></li>
              <li id="t7" class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" href="#emailbuilder-tab">Email Builder</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" role="tabpanel" id="contacts-tab">
                <!-- Start: Customer table -->
                <div class="card border-top-0">
                  <div class="card-body">
                    <div class="table-responsive table mt-2" role="grid">
                      <div class="d-flex justify-content-end">
                        <a class="editor-create-campaign btn btn-dark mb-3">Create new record</a>
                      </div>
                      <table id="campaign" class="table table-striped table-hover" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Content</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
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
