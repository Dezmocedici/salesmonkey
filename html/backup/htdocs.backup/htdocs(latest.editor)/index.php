<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.3/css/select.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" type="text/css" href="assets/editor/css/editor.dataTables.css">

    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
  	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
  	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap5.min.js"></script>
  	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
  	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.bootstrap5.min.js"></script>
  	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>
  	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>
  	<script type="text/javascript" language="javascript" src="assets/editor/js/dataTables.editor.js"></script>

    <script type="text/javascript" language="javascript" class="Staff">
      var staffEditor; // use a global for the submit and return data rendering in the examples

      // Editor Modal
      $(document).ready(function() {
        staffEditor = new $.fn.dataTable.Editor( {
            "ajax": "/assets/editor/controllers/staff.php",
            "table": "#users",
            "fields":
            [
               {
                    "label": "First name:",
                    "name": "users.first_name"
                }, {
                    "label": "Last name:",
                    "name": "users.last_name"
                }, {
                    "label": "Position:",
                    "name": "users.user_type",
                    "type": "select",
                    "options":
                    [
                      {"label": "Staff", "value": "0"},
                      {"label": "Manager", "value": "1"},
                    ]
                }, {
                    "label": "Email:",
                    "name": "users.email"
                }, {
                    "label": "Phone:",
                    "name": "users.phone"
                }
            ]
        } );

        // New record
        $('a.editor-create-staff').on('click', function (e) {
            e.preventDefault();

            staffEditor.create( {
                title: 'Create new record',
                buttons: 'Add'
            } );
        } );

        // Edit record
        $('#users').on('click', 'td.editor-edit', function (e) {
            e.preventDefault();

            staffEditor.edit( $(this).closest('tr'), {
                title: 'Edit record',
                buttons: 'Update'
            } );
        } );

        // Delete a record
        $('#users').on('click', 'td.editor-delete', function (e) {
            e.preventDefault();

            staffEditor.remove( $(this).closest('tr'), {
                title: 'Delete record',
                message: 'Are you sure you wish to remove this record?',
                buttons: 'Delete'
            } );
        } );

        //DataTalbes
        $('#users').DataTable( {
            ajax: "/assets/editor/controllers/staff.php",
            columns: [
                { data: null, render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return data.users.first_name+' '+data.users.last_name[0];
                } },
                { data: "users.email" },
                { data: "users.phone" },
                { data: null, render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    if (data.users.user_type == 0)
                    {
                      return "Staff";
                    }
                    if (data.users.user_type == 1)
                    {
                      return "Manager";
                    }
                    if (data.users.user_type == 2)
                    {
                      return "Admin";
                    }
                } },
                {
                    data: null,
                    className: "dt-center editor-edit",
                    defaultContent: '<i class="fa fa-pencil"/>',
                    orderable: false
                },
                {
                    data: null,
                    className: "dt-center editor-delete",
                    defaultContent: '<i class="fa fa-trash"/>',
                    orderable: false
                }
            ]
        } );
      } );
    </script>

    <script type="text/javascript" language="javascript" class="Audience">
      var audienceEditor; // use a global for the submit and return data rendering in the examples

      // Editor Modal
      $(document).ready(function() {
        audienceEditor = new $.fn.dataTable.Editor( {
            "ajax": "/assets/editor/controllers/audience.php",
            "table": "#audience",
            "fields":
            [
               {
                    "label": "First name:",
                    "name": "first_name"
                }, {
                    "label": "Last name:",
                    "name": "last_name"
                }, {
                    "label": "Email:",
                    "name": "email"
                }, {
                    "label": "Phone:",
                    "name": "phone"
                }
            ]
        } );

        // New record
        $('a.editor-create-audience').on('click', function (e) {
            e.preventDefault();

            audienceEditor.create( {
                title: 'Create new record',
                buttons: 'Add'
            } );
        } );

        // Edit record
        $('#audience').on('click', 'td.editor-edit', function (e) {
            e.preventDefault();

            audienceEditor.edit( $(this).closest('tr'), {
                title: 'Edit record',
                buttons: 'Update'
            } );
        } );

        // Delete a record
        $('#audience').on('click', 'td.editor-delete', function (e) {
            e.preventDefault();

            audienceEditor.remove( $(this).closest('tr'), {
                title: 'Delete record',
                message: 'Are you sure you wish to remove this record?',
                buttons: 'Delete'
            } );
        } );

        //DataTalbes
        $('#audience').DataTable( {
            ajax: "/assets/editor/controllers/audience.php",
            columns:
            [
                { data: null, render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    return data.first_name+' '+data.last_name[0];
                } },
                { data: "email" },
                { data: "phone" },
                { data: null, render: function ( data, type, row ) {
                    // Combine the first and last names into a single table field
                    if (data.address == '')
                    {
                      return '-';
                    }
                } },
                {
                    data: null,
                    className: "dt-center editor-edit",
                    defaultContent: '<i class="fa fa-pencil"/>',
                    orderable: false
                },
                {
                    data: null,
                    className: "dt-center editor-delete",
                    defaultContent: '<i class="fa fa-trash"/>',
                    orderable: false
                }
            ]
        } );
      } );
    </script>

    <script type="text/javascript" language="javascript" class="Tag">
      var tagEditor; // use a global for the submit and return data rendering in the examples

      // Editor Modal
      $(document).ready(function() {
        tagEditor = new $.fn.dataTable.Editor( {
            "ajax": "/assets/editor/controllers/tag.php",
            "table": "#tag",
            "fields":
            [
               {
                    "label": "Name:",
                    "name": "tags.name"
                }, {
                    "label": "Description:",
                    "name": "tags.description"
                }, {
                    "label": "Colour:",
                    "name":  "tags.colour_id",
                    "type":  "radio"
                }
            ]
        } );

        // New record
        $('a.editor-create-tag').on('click', function (e) {
            e.preventDefault();

            tagEditor.create( {
                title: 'Create new record',
                buttons: 'Add'
            } );
        } );

        // Edit record
        $('#tag').on('click', 'td.editor-edit', function (e) {
            e.preventDefault();

            tagEditor.edit( $(this).closest('tr'), {
                title: 'Edit record',
                buttons: 'Update'
            } );
        } );

        // Delete a record
        $('#tag').on('click', 'td.editor-delete', function (e) {
            e.preventDefault();

            tagEditor.remove( $(this).closest('tr'), {
                title: 'Delete record',
                message: 'Are you sure you wish to remove this record?',
                buttons: 'Delete'
            } );
        } );

        //DataTalbes
        $('#tag').DataTable( {
            ajax: "/assets/editor/controllers/tag.php",
            columns:
            [
                { data: null, render: function ( data, type, row ) {
                    if (data.tags.colour_id == 1)
                    {
                      return '<span class="badge rounded-pill bg-primary">'+data.tags.name+'</span>';
                    }
                    else if (data.tags.colour_id == 2)
                    {
                      return '<span class="badge rounded-pill bg-success">'+data.tags.name+'</span>';
                    }
                    else if (data.tags.colour_id == 3)
                    {
                      return '<span class="badge rounded-pill bg-danger">'+data.tags.name+'</span>';
                    }
                    else if (data.tags.colour_id == 4)
                    {
                      return '<span class="badge rounded-pill bg-info">'+data.tags.name+'</span>';
                    }
                    else if (data.tags.colour_id == 5)
                    {
                      return '<span class="badge rounded-pill bg-warning">'+data.tags.name+'</span>';
                    }
                    else
                    {
                      return '<span class="badge rounded-pill bg-warning">Error</span>';
                    }
                } },
                { data: null, render: function ( data, type, row ) {
                    if (data.tags.description == '')
                    {
                      return '-';
                    }
                    else
                    {
                      return data.tags.description
                    }
                } },
                {
                    data: null,
                    className: "dt-center editor-edit",
                    defaultContent: '<i class="fa fa-pencil"/>',
                    orderable: false
                },
                {
                    data: null,
                    className: "dt-center editor-delete",
                    defaultContent: '<i class="fa fa-trash"/>',
                    orderable: false
                }
            ]
        } );
      } );
    </script>

    <script type="text/javascript" language="javascript" class="Log">
      $(document).ready(function() {
          //DataTalbes
          $('#log').DataTable( {
              ajax: "/assets/editor/controllers/log.php",
              columns:
              [
                  { data: null, render: function ( data, type, row ) {
                      // Combine the first and last names into a single table field
                      return data.users.first_name+' '+data.users.last_name[0];
                  } },
                  { data: "logs.activity" },
                  { data: "logs.time" }
              ]
          } );
        } );
    </script>

  </head>
  <body>

  <!-- Staff Table -->
  <div class="card">
    <div class="card-header">
      Staff Table
    </div>
    <div class="card-body">
      <a class="editor-create-staff">+ Create new record</a>
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
      <a class="editor-create-audience">+ Create new record</a>
      <table id="audience" class="table table-striped table-hover" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
      </table>
    </div>
  </div>

  <!-- Tag Table -->
  <div class="card pt-5">
    <div class="card-header">
      Tag Table
    </div>
    <div class="card-body">
      <a class="editor-create-tag">+ Create new record</a>
      <table id="tag" class="table table-striped table-hover" cellspacing="0" width="100%">
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
