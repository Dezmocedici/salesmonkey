<?php
  if (!defined("PERMIT"))
  {
    header('LOCATION: ' . 'http://' . $_SERVER['SERVER_NAME']  . '/404.php' . '?alert=bad-request-direct-access-not-permitted');
    exit();
  }
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
                        <h4 class="text-wrap m-0"><?php printBusiness($conn); ?> | Dashboard</h4><small>Your audiences has 10 contacts. 10 of these are subscribers.<br></small>
                    </div><!-- End: Title -->
                    <!-- Start: Dropdown -->
                    <div>
                        <div class="dropdown mb-2"><button class="btn btn-dark dropdown-toggle btn-block" aria-expanded="false" data-toggle="dropdown" data-bss-hover-animate="pulse" type="button">Action</button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <h6 class="dropdown-header no-select">Staff</h6>
                                <a class="dropdown-item" data-toggle="modal" data-target="#add-staff">Add a Staff</a>
                            </div>
                        </div>
                    </div><!-- End: Dropdown -->
                </div><!-- End: Header -->
                <!-- Start: Subheading -->
                <div class="mb-4 border rounded-corner">
                    <div class="row mt-2 mb-2">
                        <!-- Start: Campaign -->
                        <div class="col-md-6 col-xl-3">
                            <div>
                                <p class="text-center mt-3">Campaign<br><i class="fas fa-bullhorn"></i>&nbsp;0<br></p>
                            </div>
                        </div><!-- End: Campaign -->
                        <div class="col-md-6 col-xl-3">
                            <p class="text-center mt-3">Staff<br><i class="fas fa-user-friends"></i>&nbsp;0<br></p>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <p class="text-center mt-3">Subscriber<br><i class="fas fa-users"></i>&nbsp;0<br></p>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <p class="text-center mt-3">Tag<br><i class="fas fa-tag"></i>&nbsp;0<br></p>
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
                                  <a class="nav-link active" role="tab" data-toggle="tab" href="#activity-tab">Activity</a></li>
                                <li class="nav-item" role="presentation">
                                  <a class="nav-link" role="tab" data-toggle="tab" href="#staff-tab">Staff</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane" role="tabpanel" id="activity-tab">
                                    <!-- Start: Audiences Table -->
                                    <div class="card border-top-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 text-nowrap">
                                                    <div id="dataTable_length-3" class="dataTables_length" aria-controls="dataTable"><label>Show&nbsp;<select class="form-control form-control-sm custom-select custom-select-sm">
                                                                <option value="10" selected="">10</option>
                                                                <option value="25">25</option>
                                                                <option value="50">50</option>
                                                                <option value="100">100</option>
                                                            </select>&nbsp;</label></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="text-md-right dataTables_filter" id="dataTable_filter-3"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                                                </div>
                                            </div>
                                            <div class="table-responsive table mt-2" id="dataTable-4" role="grid" aria-describedby="dataTable_info">
                                                <table class="table my-0" id="dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Activity</th>
                                                            <th>Source</th>
                                                            <th>Date Added<br></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Sam.H@gmail.com</td>
                                                            <td>Sam H | Admin</td>
                                                            <td>05/05/2020<br></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sam.H@gmail.com</td>
                                                            <td>Sam H | Admin<br></td>
                                                            <td>05/05/2020<br></td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td><strong>Activity</strong><br></td>
                                                            <td><strong>Source</strong></td>
                                                            <td><strong>Date Added</strong><br></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 align-self-center">
                                                    <p id="dataTable_info-3" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 10</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                                        <ul class="pagination">
                                                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                                        </ul>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End: Audiences Table -->
                                </div>
                                <div class="tab-pane active" role="tabpanel" id="staff-tab">
                                    <!-- Start: Staffs Table -->
                                    <div class="card border-top-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 text-nowrap">
                                                    <div id="dataTable_length-2" class="dataTables_length" aria-controls="dataTable"><label>Show&nbsp;<select class="form-control form-control-sm custom-select custom-select-sm">
                                                                <option value="10" selected="">10</option>
                                                                <option value="25">25</option>
                                                                <option value="50">50</option>
                                                                <option value="100">100</option>
                                                            </select>&nbsp;</label></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="text-md-right dataTables_filter" id="dataTable_filter-2"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                                                </div>
                                            </div>
                                            <div class="table-responsive table mt-2" id="dataTable-3" role="grid" aria-describedby="dataTable_info">
                                                <table class="table my-0" id="dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Email</th>
                                                            <th>Name</th>
                                                            <th>Phone</th>
                                                            <th>Status</th>
                                                            <th>Source</th>
                                                            <th>Date Added<br></th>
                                                            <th>Last Changed</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Sam.H@gmail.com</td>
                                                            <td>Sam H</td>
                                                            <td>0400000000</td>
                                                            <td class="text-success">Active<br></td>
                                                            <td>Admin</td>
                                                            <td>05/05/2020</td>
                                                            <td>05/05/2020<br></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sam.H@gmail.com</td>
                                                            <td>Sam H</td>
                                                            <td>0400000000</td>
                                                            <td class="text-success">Active</td>
                                                            <td>Admin</td>
                                                            <td>05/05/2020</td>
                                                            <td>05/05/2020<br></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sam.H@gmail.com</td>
                                                            <td>Sam H</td>
                                                            <td>0400000000</td>
                                                            <td class="text-success">Active<br></td>
                                                            <td>Admin</td>
                                                            <td>05/05/2020</td>
                                                            <td>05/05/2020<br></td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td><strong>Email</strong><br></td>
                                                            <td><strong>Name</strong></td>
                                                            <td><strong>Phone</strong><br></td>
                                                            <td><strong>Status</strong></td>
                                                            <td><strong>Source</strong></td>
                                                            <td><strong>Date Added</strong></td>
                                                            <td><strong>Last Changed</strong></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 align-self-center">
                                                    <p id="dataTable_info-2" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 10</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                                        <ul class="pagination">
                                                            <li class="page-item disabled">
                                                              <a class="page-link" href="#" aria-label="Previous">
                                                                <span aria-hidden="true">«</span>
                                                              </a>
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
                                                              <a class="page-link" href="#" aria-label="Next">
                                                                <span aria-hidden="true">»</span>
                                                              </a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End: Staffs Table -->
                                </div>
                            </div>
                        </div>
                    </div><!-- End: Tabs & Tables -->
                </div><!-- End: Tabs -->
            </div>
        </div><!-- End: Content Card -->
    </div>
</div>
