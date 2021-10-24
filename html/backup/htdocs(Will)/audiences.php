<?php
  define("permit", TRUE);
  include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/header.inc.php");
?>


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.3/css/select.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.0/css/dataTables.dateTime.min.css">
<link rel="stylesheet" type="text/css" href="assets/editor/css/editor.bootstrap4.min.css">
<link rel="stylesheet" href="assets/css/styles.css">

<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Modal -->
<div class="modal fade" id="add-audience" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add a Subscriber</h5>
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
                        <div class="form-group"><label>Email Address<br /></label><input type="email" class="form-control" name="email" placeholder="Email Address" /></div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group"><label>Phone Number</label><input type="tel" class="form-control" placeholder="Phone Number" name="phone" /></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-12 col-md-12">
                        <div class="form-group"><label>Address<br /></label><input type="text" class="form-control" placeholder="Address" name="address" /></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-12 col-md-12">
                        <div class="form-group"><label>Tags<br /></label>
                          <div id="checkbox-container">
                          <ul class="cboxtags">
                                <?php generateTags($conn); ?>
                          </ul>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="import-contacts" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Import Contacts</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="add-tag" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add a Tag</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
        <div class="modal-body">
            <div class="col">
                <div class="form-row">
                    <div class="col-12 col-md-6">
                        <div class="form-group"><label>Tag Name</label><input type="text" class="form-control" placeholder="Tag Name" name="tag_name"/></div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group"><label>Choose Colour</label>
                          <select type="text" class="form-control">
                          <option selected disabled>Choose...</option>
                          <?php fetchTagColour($conn); ?>
                          </select>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                          <label>Description<br/></label>
                            <input type="text" class="form-control" placeholder="Description" name="description"/>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="content-wrapper" class="d-flex flex-column">
  <div id="card-wrapper">
    <!-- Start: Content Card -->
    <div class="card shadow-lg mb-2 border-0 content-card" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true">
      <div class="card-body">
        <!-- Start: Header -->
        <div class="d-lg-flex justify-content-lg-between mb-2">
          <!-- Start: Title -->
          <div class="text-truncate">
            <h4 class="text-wrap m-0"><?php printBusiness($conn); ?> | Audiences</h4>
            <small><?php printAudiences($conn); printSubscriber($conn); ?><br></small>
          </div><!-- End: Title -->
          <!-- Start: Dropdown -->
          <div>
            <div class="dropdown mb-2"><button class="btn btn-dark dropdown-toggle btn-block" aria-expanded="false" data-toggle="dropdown" data-bss-hover-animate="pulse" type="button">Action</button>
              <div class="dropdown-menu dropdown-menu-right">
                <h6 class="dropdown-header no-select">Audience</h6>
                  <a class="dropdown-item" data-toggle="modal" data-target="#add-audience">Add a Subscriber</a>
                  <a class="dropdown-item" data-toggle="modal" data-target="#import-contacts">Import Contacts</a>
                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header no-select">Tag</h6>
                  <a class="dropdown-item" data-toggle="modal" data-target="#add-tag">Add a Tag</a>
              </div>
            </div>
          </div><!-- End: Dropdown -->
        </div><!-- End: Header -->
        <!-- Start: Tabs & Tables -->
        <div>
          <div>
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-toggle="tab" href="#contacts-tab">Contacts</a></li>
              <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" href="#tags-tab">Tags</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" role="tabpanel" id="contacts-tab">
                <!-- Start: Audiences Table -->
                <div class="card border-top-0">
                  <div class="card-body">
                    <div class="table-responsive table mt-2" role="grid">
                      <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Extn.</th>
                            <th>Start date</th>
                            <th>Salary</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Name</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Extn.</th>
                            <th>Start date</th>
                            <th>Salary</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div><!-- End: Audiences Table -->
              </div>
              <div class="tab-pane" role="tabpanel" id="tags-tab">
                <!-- Start: Tags table -->
                <div class="card border-top-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <div class="text-truncate text-left mb-2 no-select">
                          <!-- Start: Colour --><span class="text-truncate tag-colours"><span><span class="alert-primary rounded-circle">&nbsp; &nbsp; &nbsp;</span>&nbsp;<span class="text-primary">Blue</span></span>&nbsp;|&nbsp;<span><span
                                class="alert-success rounded-circle">&nbsp; &nbsp; &nbsp;</span>&nbsp;<span class="text-success">Green</span></span>&nbsp;|&nbsp;<span><span class="alert-danger rounded-circle">&nbsp; &nbsp;
                                &nbsp;</span>&nbsp;<span class="text-danger">Red</span></span>&nbsp;|&nbsp;<span><span class="alert-info rounded-circle">&nbsp; &nbsp; &nbsp;</span>&nbsp;<span
                                class="text-info">Teal</span></span>&nbsp;|&nbsp;<span><span class="alert-warning rounded-circle">&nbsp; &nbsp; &nbsp;</span>&nbsp;<span class="text-warning">Yellow</span></span></span><!-- End: Colour -->
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive table mt-2" role="grid">
                      <table class="table my-0" id="tags">
                        <thead>
                          <tr>
                            <th>Tag</th>
                            <th>Description</th>
                            <th>Colour</th>
                            <th></th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php fetchTagInfo($conn); ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th><strong>Tag</strong></th>
                            <th><strong>Description</strong></th>
                            <th><strong>Colour</strong></th>
                            <th></th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div><!-- End: Tags table -->
              </div>
            </div>
          </div>
        </div><!-- End: Tabs & Tables -->
      </div>
    </div><!-- End: Content Card -->
  </div>
</div>
<?php
  include_once ($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/footer.inc.php");
?>
