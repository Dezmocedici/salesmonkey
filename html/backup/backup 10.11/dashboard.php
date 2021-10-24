<?php
  define("permit", TRUE);
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
                        <h4 class="text-wrap m-0"><?php printBusiness($conn); ?> | Dashboard</h4>
                    </div><!-- End: Title -->
                    <!-- Start: Dropdown -->
                </div><!-- End: Header -->
                <!-- Start: Subheading -->
                <div class="mb-4 border rounded-corner">
                    <div class="row mt-2 mb-2">
                        <!-- Start: Campaign -->
                        <div class="col-md-6 col-xl-3">
                            <div>
                                <p class="text-center mt-3">Campaign<br><i class="fas fa-bullhorn"></i>&nbsp;<?php printStats($conn, 1); ?><br></p>
                            </div>
                        </div><!-- End: Campaign -->
                        <div class="col-md-6 col-xl-3">
                            <p class="text-center mt-3">Staff<br><i class="fas fa-user-friends"></i>&nbsp;<?php printStats($conn, 2); ?><br></p>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <p class="text-center mt-3">Subscriber<br><i class="fas fa-users"></i>&nbsp;<?php printStats($conn, 3); ?><br></p>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <p class="text-center mt-3">Tag<br><i class="fas fa-tag"></i>&nbsp;<?php printStats($conn, 4); ?><br></p>
                        </div>
                    </div>
                </div><!-- End: Subheading -->
                <!-- Start: Tabs -->
                <div>
                    <!-- Start: Tabs & Tables -->
                    <div>
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                  <a class="nav-link active" role="tab" data-toggle="tab" href="#activity-tab">Activity</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" role="tabpanel" id="activity-tab">
                                    <!-- Start: Audiences Table -->
                                    <div class="card border-top-0">
                                        <div class="card-body">
                                            <div class="table-responsive table mt-2" role="grid">
                                                <table class="table my-0" id="activity">
                                                    <thead>
                                                        <tr>
                                                            <th>Activity</th>
                                                            <th>Source</th>
                                                            <th>Date Added</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      <?php fetchActivity($conn) ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td><strong>Activity</strong></td>
                                                            <td><strong>Source</strong></td>
                                                            <td><strong>Date Added</strong></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div><!-- End: Audiences Table -->
                                </div>
                            </div>
                        </div>
                    </div><!-- End: Tabs & Tables -->
                </div><!-- End: Tabs -->
            </div>
        </div><!-- End: Content Card -->
    </div>
</div>
</div>

<?php
  include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/footer.inc.php");
?>
