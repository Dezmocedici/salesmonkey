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
          <div class="text-truncate">
            <h4 class="text-wrap m-0 pb-5"><?php printBusiness($conn); ?> | Audiences</h4>
          </div><!-- End: Title -->
        </div><!-- End: Header -->
        <!-- Start: Tabs & Tables -->
        <div>
          <ul class="nav nav-tabs" role="tablist">
            <li id="t4" class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-toggle="tab" href="#audience-tab">Audience</a></li>
            <li id="t5" class="nav-item" role="presentation"><a class="nav-link"        role="tab" data-toggle="tab" href="#tags-tab">Tag</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="audience-tab">
              <!-- Start: Audiences Table -->
              <div class="card border-top-0">
                <div class="card-body">
                  <div class="table-responsive table mt-2" role="grid">
                    <div class="d-flex justify-content-end">
                      <a class="editor-create-audience btn btn-dark mb-3">Create new record</a>
                    </div>
                    <table id="audience" class="table table-striped table-hover" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Address</th>
                          <th>Tags</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div><!-- End: Audiences Table -->
            </div>
            <div class="tab-pane" role="tabpanel" id="tags-tab">
              <!-- Start: Tags table -->
              <div class="card border-top-0">
                <div class="card-body">
                  <div class="table-responsive table mt-2" role="grid">
                      <div class="d-flex text-truncate text-left no-select justify-content-between">
                        <!-- Start: Colour -->
                        <span class="text-truncate tag-colours">
                          <span>
                            <span class="alert-primary rounded-circle">&nbsp; &nbsp; &nbsp;</span>&nbsp;<span class="text-primary">Blue</span>
                          </span>
                            &nbsp;|&nbsp;
                          <span>
                            <span class="alert-success rounded-circle">&nbsp; &nbsp; &nbsp;</span>&nbsp;<span class="text-success">Green</span>
                          </span>
                            &nbsp;|&nbsp;
                          <span><span class="alert-danger rounded-circle">&nbsp; &nbsp; &nbsp;</span>&nbsp;<span class="text-danger">Red</span>
                          </span>
                            &nbsp;|&nbsp;
                          <span><span class="alert-info rounded-circle">&nbsp; &nbsp; &nbsp;</span>&nbsp;<span class="text-info">Teal</span>
                          </span>
                            &nbsp;|&nbsp;
                          <span>
                            <span class="alert-warning rounded-circle">&nbsp; &nbsp; &nbsp;</span>&nbsp;<span class="text-warning">Yellow</span>
                          </span>
                        </span>
                        <!-- End: Colour -->
                        <a class="editor-create-tag btn btn-dark mb-3">Create new record</a>
                      </div>

                    <table id="tag" class="table table-striped table-hover order-column" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Description</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                    </table>
                    </div>
                  </div>
                </div>
              </div><!-- End: Tags table -->
            </div>
          </div>
        </div>
        <!-- End: Tabs & Tables -->
      </div>
    </div><!-- End: Content Card -->
  </div>
</div>
<?php
  include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/footer.inc.php");
?>
