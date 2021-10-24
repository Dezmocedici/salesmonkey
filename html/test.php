<?php
define("permit", TRUE);
include('assets/includes/header.inc.php');
?>
  <body>

  <!-- Staff Table -->
  <div class="card">
    <div class="card-header">
      Staff Table
    </div>
    <div class="card-body">
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

  <!-- Audience Table -->
  <div class="card pt-5">
    <div class="card-header">
      Audience Table
    </div>
    <div class="card-body">
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
  </div>

  <!-- Tag Table -->
  <div class="card pt-5">
    <div class="card-header">
      Tag Table
    </div>
    <div class="card-body">
      <div class="d-flex justify-content-end">
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

  <!-- Log Table -->
  <div class="card pt-5">
    <div class="card-header">
      Log Table
    </div>
    <div class="card-body">
      <table id="log" class="table table-striped table-hover" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>User</th>
            <th>Activity</th>
            <th>Time</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>


  </body>
</html>
