<!DOCTYPE html>
<html lang="en">
<?php
define("permit", TRUE);
include_once($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/header.inc.php");
$data = getAllTemplates();
?>

<body>
<div id="wrapper">

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="card-wrapper">
            <div class="card shadow-lg mb-2 border-0 content-card" data-aos="fade-left" data-aos-duration="1000"
                 data-aos-once="true">
                <div class="card-body">


                    <div>
                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" role="tab" data-toggle="tab" href="#contacts-tab">Templates</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" role="tab" data-toggle="tab" href="#emailbuilder-tab">Create
                                        Template</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" role="tabpanel" id="contacts-tab">
                                    <!-- Start: Customer table -->
                                    <div class="card border-top-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 text-nowrap">
                                                    <div id="dataTable_length-1" class="dataTables_length"
                                                         aria-controls="dataTable">
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
                                                    <div class="text-md-right dataTables_filter"
                                                         id="dataTable_filter-1">
                                                        <label><input type="search" class="form-control form-control-sm"
                                                                      aria-controls="dataTable"
                                                                      placeholder="Search"/></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive table mt-2" id="dataTable-2" role="grid"
                                                 aria-describedby="dataTable_info">
                                                <table class="table my-0" id="dataTable">
                                                    <thead>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Name</th>
                                                        <th>View</th>
                                                        <th>Edit</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($data as $row) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $row['id'] ?>
                                                            </td>

                                                            <td>
                                                                <?php echo $row['name'] ?>
                                                            </td>
                                                            <td>
                                                                <a target="_blank"
                                                                   href="<?php echo $row['path'] ?>/template.html">View</a>
                                                            </td>
                                                            <td>
                                                                <a onclick="edit('<?php echo $row['path'] ?>')">Edit</a>
                                                            </td>

                                                            <!--<td>-->
                                                            <?php //echo $row['type'] ?>
                                                            <!--</td>-->
                                                        </tr>
                                                        <?php
                                                    } ?>
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Id</th>
                                                        <th>Name</th>
                                                        <th>View</th>
                                                        <th>Edit</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <div class=" row">
                                                <div class="col-md-6 align-self-center">
                                                    <p id="dataTable_info-1" class="dataTables_info" role="status"
                                                       aria-live="polite">
                                                        Showing 1 to 10 of 10
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <nav class="d-lg-flexjustify-content-lg-end dataTables_paginate paging_simple_numbers">
                                                        <ul class="pagination">
                                                            <li class="page-item disabled">
                                                                <a class="page-link" href="#"
                                                                   aria-label="Previous"><span
                                                                            aria-hidden="true">«</span></a>
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
                                                                <a class="page-link" href="#" aria-label="Next"><span
                                                                            aria-hidden="true">»</span></a>
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
                                    <div class="card border-top-0">
                                        <div class="card-body">
                                            <div id="root">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End: Customer table -->
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
include_once($_SERVER['DOCUMENT_ROOT'] . "/assets/includes/footer.inc.php");
?>
<script src="assets/js/react-email-editor.js"></script>
<script src="assets/js/email-builder.js"></script>
<script>
    $(function () {
        $("a.nav-link.sidebar-link").removeClass("nav-active");
        $("a[href*='builder.php']").addClass("nav-active");
    });

    function edit(path) {
        let index = path.lastIndexOf("/");
        let id = path.substring(index + 1);
        window.location.href = "editor.php?id=" + id;
    }
</script>
</body>

</html>