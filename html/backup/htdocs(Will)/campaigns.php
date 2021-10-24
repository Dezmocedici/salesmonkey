<?php
  define("permit", TRUE);
  include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/header.inc.php");



$data = getAllCampaigns();
$customers = getAllCustomers();
$templates = getAllTemplates();
addcampaign($conn);
?>

<body>
    <div id="wrapper">

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="card-wrapper">
                <!-- Start: Content Card -->
                <div class="card shadow-lg mb-2 border-0 content-card" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true">
                    <div class="card-body">
                        <!-- Start: Header -->
                        <div class="d-lg-flex justify-content-lg-between mb-2">
                            <!-- Start: Title -->
                            <div>
                                <h4 class="text-wrap m-0"><?php printBusiness($conn); ?> Campaigns</h4>
                                <small>You has <b><?php printStats($conn, 1); ?> </b>campaigns<br /></small>
                            </div>
                        </div>
                        <div>
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" role="tab" data-toggle="tab" href="#contacts-tab">Campaigns</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" role="tab" data-toggle="tab" href="#emailbuilder-tab">Start Campaign</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" role="tabpanel" id="contacts-tab">
                                        <!-- Start: Customer table -->
                                        <div class="card border-top-0">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 text-nowrap">
                                                        <div id="dataTable_length-1" class="dataTables_length" aria-controls="dataTable">
                                                            <label>Show&nbsp;<select class="
                                      form-control form-control-sm
                                      custom-select custom-select-sm
                                    ">
                                                                    <option value="10" selected="">10</option>
                                                                    <option value="25">25</option>
                                                                    <option value="50">50</option>
                                                                    <option value="100">100</option>
                                                                </select>&nbsp;</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="text-md-right dataTables_filter" id="dataTable_filter-1">
                                                            <label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search" /></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="table-responsive table mt-2" id="dataTable-2" role="grid" aria-describedby="dataTable_info">
                                                    <table class="table my-0" id="dataTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Campaign</th>
                                                                <th>Receipents</th>
                                                                <th>Subject</th>
                                                                <th>Status</th>
                                                                <th>Type</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($data as $row) {
                                                            ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $row['name'] ?>
                                                                    </td>
                                                                    <td>
                                                                        <a href="#" onclick="openModal('<?php echo $row['recipient'] ?>')"><?php echo sizeof(explode(',', $row['recipient'])) ?></a>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $row['subject'] ?>
                                                                    </td>
                                                                    <?php if ($row['status'] == "success") {
                                                                        echo '<td class="text-success">Success</td>';
                                                                    } else if ($row['status'] == "pending") {
                                                                        echo '<td class="text-warning">Pending</td>';
                                                                    } else {
                                                                        echo '<td class="text-danger">Failed</td>';
                                                                    }
                                                                    ?>
                                                                    <td>
                                                                        <?php echo $row['type'] ?>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            } ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Campaign</th>
                                                                <th>Receipents</th>
                                                                <th>Subject</th>
                                                                <th>Status</th>
                                                                <th>Type</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                                <div class=" row">
                                                    <div class="col-md-6 align-self-center">
                                                        <p id="dataTable_info-1" class="dataTables_info" role="status" aria-live="polite">
                                                            Showing 1 to 10 of 10
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <nav class="
                                  d-lg-flex
                                  justify-content-lg-end
                                  dataTables_paginate
                                  paging_simple_numbers
                                ">
                                                            <ul class="pagination">
                                                                <li class="page-item disabled">
                                                                    <a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a>
                                                                </li>
                                                                <li class="page-item active">
                                                                    <a class="page-link" href="#">1</a>
                                                                </li>
                                                                <li class="page-item">
                                                                    <a class="page-link" href="#">2</a>
                                                                </li>
                                                                <li class="page-item">
                                                                    <a class="page-link" href="#">3</a>
                                                                </li>
                                                                <li class="page-item">
                                                                    <a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a>
                                                                </li>
                                                            </ul>
                                                        </nav>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End: Customer table -->
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="emailbuilder-tab">
                                        <!-- Start: Customer table -->
                                        <form method="POST" >
                                        <div class="card border-top-0">
                                            <div class="card-body">

                                                <div class="col">
                                                    <div class="form-row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Name</label><input class="form-control" type="text" placeholder="Campaign Name" name="campaign_name" id="campaign_name" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>To</label><select class="selectpicker form-control" name="receipients" id="receipients" multiple>
                                                                    <?php foreach ($customers as $row) {
                                                                        echo '<option value=' . $row['id'] . '>' . $row['email'] . '</option>';
                                                                    }
                                                                    ?>
                                                                </select><small>Select customers to send email<br /></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-12">
                                                            <div class="custom-control custom-switch py-1">
                                                                <input type="checkbox" class="custom-control-input" id="schedule_cb">
                                                                <label class="custom-control-label" for="schedule_cb">Schedule Email</label>
                                                            </div>
                                                            <div class="form-group py-1" id="schedule-div">
                                                                <label>Select Date/Time</label>
                                                                <input class="form-control" type="text" placeholder="Select Date" name="schedule" id="schedule_date" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label>Subject</label><input class="form-control" type="text" placeholder="Subject" name="subject" id="subject" /><small>A successful email starts with a subject line<br /></small>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="form-group">
                                                                <label>Body</label><input class="form-control" type="text" placeholder="Preview Text" name="preview_text" id="body" /><small>Body of the email</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Content</label>
                                                                <select class="form-control" id="type" name="type">
                                                                    <option value="pamphlet" selected>
                                                                        Pamphlet
                                                                    </option>
                                                                    <option value="template">
                                                                        Html Template
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="pamphlet-div">
                                                        <form method="post" action="./add.campaign.php" class="dropzone" id="my-awesome-dropzone"></form>
                                                    </div>
                                                    <div class="form-row" id="template-div">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Template</label>
                                                                <select class="selectpicker form-control" name="template" id="template">
                                                                    <?php foreach ($templates as $row) {
                                                                        echo '<option id=' . $row['path'] . ' value=' . $row['id'] . '>' . $row['name'] . '</option>';
                                                                    }
                                                                    ?>

                                                                </select>
                                                                <a href="#" onclick="openTemplate()">View</a>
                                                                <br>
                                                                <small>Select template to send email<br /></small>
                                                            </div>
                                                        </div>
                                                    </div>


                                                <div class="text-center mt-1">
<!--                                                    <button class="btn btn-dark" data-bss-hover-animate="pulse" type="button" name="add_campaign" id="add_campaign" onclick="sendMail()">Create</button>-->

                                                    <button class="btn btn-dark" data-bss-hover-animate="pulse" type="submit" name="add_campaign" id="add_campaign">Create</button>
                                                    </form>

                                                </div>

                                            </div>
                                        </div>
                                        <!-- End: Customer table -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End: Title & Table -->
                    </div>
                </div>
                <!-- End: Content Card -->
            </div>
        </div>
    </div>


    <form id="add-customer-form" method="POST">
        <div class="modal fade" role="dialog" tabindex="-1" id="recipient-list">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Recipients</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="col" id="data">

                        </div>
                    </div>
                    <div class="modal-footer"><button class="btn btn-danger" data-bss-hover-animate="pulse" type="button" data-dismiss="modal">Close</button></div>
                </div>
            </div>
        </div>
    </form>
    <?php
    include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/footer.inc.php");
    ?>
    <script src="assets/js/campaign.js"></script>
</body>

