<?php
  if (!defined("PERMIT"))
  {
    header('LOCATION: ' . 'http://' . $_SERVER['SERVER_NAME']  . '/404.php' . '?alert=bad-request-direct-access-not-permitted');
    exit();
  }

  include ($_SERVER['DOCUMENT_ROOT'] . "/assets/editor/lib/DataTables.php");

    //loggedIn()
    login($conn);
    logout();
    register($conn, 1);
    registerBusiness($conn);
    updateUserProfile($conn);
    updatePassword($conn);
    updateBusinessProfile($conn);
    activateAccount($conn);
    sendLink($conn, "resetPassword");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- Dynamically print page title -->
    <title><?php printTitle(); ?></title>

    <!-- CSS Lib -->

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <!-- Bootstrap4 CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="assets/editor/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/editor/css/editor.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/editor/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/editor/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/editor/css/dataTables.dateTime.css">
    <!-- Animation CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">

    <!-- JS Lib -->
    <script type="text/javascript" language="javascript" src="assets/editor/js/papaparse.js"></script>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="assets/editor/js/dataTables.editor.js"></script>
  	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.js"></script>
  	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.bootstrap4.js"></script>
  	<script type="text/javascript" language="javascript" src="assets/editor/js/select.bootstrap4.js"></script>
  	<script type="text/javascript" language="javascript" src="assets/editor/js/dataTables.dateTime.js"></script>

    <script type="text/javascript" language="javascript" src="assets/editor/js/editor.bootstrap4.js"></script>

	  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="assets/editor/js/pdfmake.js"></script>
    <script type="text/javascript" language="javascript" src="assets/editor/js/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="assets/editor/js/buttons.print.js"></script>

    <script type="text/javascript" language="javascript" src="assets/js/sweetalert.js"></script>
    <script type="text/javascript" language="javascript" src="assets/js/bs-init.js"></script>
    <script type="text/javascript" language="javascript" src="assets/js/aos.js"></script>

    <!-- Copy to clipboard -->

    <!-- Tab State Saver -->
    <script type="text/javascript" language="javascript" class="Tab">
      $(function() {
          // for bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line
          $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
              // save the latest tab; use cookies if you like 'em better:
              localStorage.setItem('lastTab', $(this).attr('href'));
          });

          // go to the latest tab, if it exists:
          var lastTab = localStorage.getItem('lastTab');
          if (lastTab) {
              $('[href="' + lastTab + '"]').tab('show');
          }
      });
    </script>
    <!-- Email builder Initializer -->
    <script type="text/javascript" language="javascript" class="Unlayer">

      $(document).ready(function() {
        unlayer.init({
        id: 'editor-container',
        projectId: 40025,
        displayMode: 'email'
      })
      });

    </script>
    <!-- Staff Table Initializer -->
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
                      {"label": "Manager", "value": "1"}
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
        $('#users').on('click', 'i.editor-edit', function (e) {
            e.preventDefault();

            staffEditor.edit( $(this).closest('tr'), {
                title: 'Edit record',
                buttons: 'Update'
            } );
        } );

        // Delete a record
        $('#users').on('click', 'i.editor-delete', function (e) {
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
                { data: "users", render: function ( data ) {
                    // Combine the first and last names into a single table field
                    return data.first_name+' '+data.last_name[0];
                } },
                { data: "users.email" },
                { data: "users.phone", render: function ( data ) {
                     return '('+data[0]+data[1]+') '+data[2]+data[3]+data[4]+data[5]+' '+data[6]+data[7]+data[8]+data[9];
                } },
                { data: "users.user_type", render: function ( data ) {

                    if (data == 0)
                    {
                      return "Staff";
                    }
                    if (data == 1)
                    {
                      return "Manager";
                    }
                    if (data == 2)
                    {
                      return "Admin";
                    }
                } },
                {
                    data: "users.user_type",
                    className: "dt-center",
                    orderable: false,
                    render: function ( data )
                    {
                      return '<i class="btn p-0 m-0 fa fa-pencil editor-edit"/>'
                    }
                },
                {
                  data: "users.user_type",
                  className: "dt-center",
                  orderable: false,
                  render: function ( data )
                  {
                      return '<i class="btn p-0 m-0 fa fa-trash editor-delete"/>'
                  }
                }
            ]
            } );
        } );

    </script>
    <!-- Audience Table Initializer -->
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
                    "name": "customers.first_name"
                }, {
                    "label": "Last name:",
                    "name": "customers.last_name"
                }, {
                    "label": "Email:",
                    "name": "customers.email"
                }, {
                    "label": "Phone:",
                    "name": "customers.phone"
                }, {
                    "label": "Address:",
                    "name": "customers.address"
                },
                {
                    "label": "Tags:",
                    "name": "tags[].id",
                    "type": "checkbox"
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
          var audienceTable = $('#audience').DataTable( {
              ajax: "/assets/editor/controllers/audience.php",
              columns:
              [
                  { data: "customers", render: function ( data ) {
                      // Combine the first and last names into a single table field
                      return data.first_name+' '+data.last_name[0];
                  } },
                  { data: "customers.email" },
                  { data: "customers.phone", render: function ( data ) {
                       return '('+data[0]+data[1]+') '+data[2]+data[3]+data[4]+data[5]+' '+data[6]+data[7]+data[8]+data[9];
                  } },
                  { data: "customers.address", render: function ( data ) {

                      if ( data == '' )
                      {
                        return '-';
                      }
                      return data;
                  } },
                  { data: "tags", render: function ( data ) {

                      if ( data == '' )
                      {
                        return '-';
                      }

                      var tags = "";

                      for (var i = 0; i < data.length; i++)
                      {
                        if (data[i].colour_id == 1)
                        {
                          span = '<span class="badge rounded-pill alert-primary">';
                        }
                        if (data[i].colour_id == 2)
                        {
                          span = '<span class="badge rounded-pill alert-success">';
                        }
                        if (data[i].colour_id == 3)
                        {
                          span = '<span class="badge rounded-pill alert-danger">';
                        }
                        if (data[i].colour_id == 4)
                        {
                          span = '<span class="badge rounded-pill alert-info">';
                        }
                        if (data[i].colour_id == 5)
                        {
                          span = '<span class="badge rounded-pill alert-warning">';
                        }
                        tags = tags + span + data[i].name + '</span> ';
                      }
                      return tags;
                  } },
                  // { data: "tags", render:"[, ].name" },
                  {
                      data: null,
                      className: "dt-center editor-edit",
                      defaultContent: '<i class="btn p-0 m-0 fa fa-pencil"/>',
                      orderable: false
                  },
                  {
                      data: null,
                      className: "dt-center editor-delete",
                      defaultContent: '<i class="btn p-0 m-0 fa fa-trash"/>',
                      orderable: false
                  }
              ]
          } );
          setInterval( function () { audienceTable.ajax.reload( null, false ); }, 1000 );
      } );
    </script>
    <!-- Tag Table Initializer -->
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
                      return '<span class="badge rounded-pill alert-primary">'+data.tags.name+'</span>';
                    }
                    else if (data.tags.colour_id == 2)
                    {
                      return '<span class="badge rounded-pill alert-success">'+data.tags.name+'</span>';
                    }
                    else if (data.tags.colour_id == 3)
                    {
                      return '<span class="badge rounded-pill alert-danger">'+data.tags.name+'</span>';
                    }
                    else if (data.tags.colour_id == 4)
                    {
                      return '<span class="badge rounded-pill alert-info">'+data.tags.name+'</span>';
                    }
                    else if (data.tags.colour_id == 5)
                    {
                      return '<span class="badge rounded-pill alert-warning">'+data.tags.name+'</span>';
                    }
                    else
                    {
                      return '<span class="badge rounded-pill alert-warning">Error</span>';
                    }
                } },
                { data: null, render: function ( data ) {
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
                    defaultContent: '<i class="btn p-0 m-0 fa fa-pencil"/>',
                    orderable: false
                },
                {
                    data: null,
                    className: "dt-center editor-delete",
                    defaultContent: '<i class="btn p-0 m-0 fa fa-trash"/>',
                    orderable: false
                }
            ]
        } );
      } );
    </script>
    <!-- Log Table Initializer -->
    <script type="text/javascript" language="javascript" class="Log">
      var editor;
      $(document).ready(function() {

          //DataTalbes
          var logTable = $('#log').DataTable( {
              ajax: "/assets/editor/controllers/log.php",
              columnDefs: [ { orderSequence: [ "desc" ], "targets": [ 2 ] } ],
              order: [[ 2, 'decs' ]],
              columns:
              [
                { data: "users", render: function ( data )
                  {
                    if (data.first_name === null && data.last_name === null)
                    {
                      return '<p class="text-danger p-0 m-0">(Deleted account)</p>';
                    }
                    return data.first_name+' '+data.last_name[0];
                  }
                },
                { data: "logs.activity" },
                { orderSequence: [ "desc" ], data: "logs.time", render: function ( data )
                  {
                    const unixTimestamp = data;
                    const miliseconds = data * 1000;
                    const dataObject = new Date( miliseconds );
                    const dateFormat = dataObject.toLocaleString("en-AU", {dateStyle: "medium", timeStyle: "medium"});
                    return dateFormat;
                  }
                }
              ],
              buttons:
              [
              { extend: 'create', editor: editor },
              { extend: 'edit',   editor: editor },
              { extend: 'remove', editor: editor },
              {
                  extend: 'collection',
                  text: 'Export',
                  buttons:
                  [
                      'copy',
                      'excel',
                      'csv',
                      'pdf',
                      'print'
                  ]
              }
              ]
          } );
          setInterval( function () { logTable.ajax.reload( null, false ); }, 1000 );
          logTable.order( [2, 'desc'] ).draw();
        } );
    </script>
    <!-- Campaign Table Initializer -->
    <script type="text/javascript" language="javascript" class="Campaign">
      var campaignEditor; // use a global for the submit and return data rendering in the examples

      // Editor Modal
      $(document).ready(function() {
        campaignEditor = new $.fn.dataTable.Editor( {
            "ajax": "/assets/editor/controllers/campaign.php",
            "table": "#campaign",
            "fields":
            [
               {
                    "label": "Name:",
                    "name": "campaigns.name"
                }, {
                    "label": "Content:",
                    "name": "templates[].id",
                    "type": "select"
                }, {
                    "label": "Colour:",
                    "name":  "campaigns.content",
                    "type":  "radio"
                }
            ]
        } );

        // New record
        $('a.editor-create-campaign').on('click', function (e) {
            e.preventDefault();

            campaignEditor.create( {
                title: 'Create new record',
                buttons: 'Add'
            } );
        } );

        // Edit record
        $('#campaign').on('click', 'td.editor-edit', function (e) {
            e.preventDefault();

            campaignEditor.edit( $(this).closest('tr'), {
                title: 'Edit record',
                buttons: 'Update'
            } );
        } );

        // Delete a record
        $('#campaign').on('click', 'td.editor-delete', function (e) {
            e.preventDefault();

            campaignEditor.remove( $(this).closest('tr'), {
                title: 'Delete record',
                message: 'Are you sure you wish to remove this record?',
                buttons: 'Delete'
            } );
        } );

        //DataTalbes
        $('#campaign').DataTable( {
            ajax: "/assets/editor/controllers/campaign.php",
            columns:
            [
                { data: "campaigns.name" },
                { data: "campaigns.subject" },
                { data: "campaigns.content" },
                { data: "campaigns.status" },
                {
                    data: null,
                    className: "dt-center editor-edit",
                    defaultContent: '<i class="btn p-0 m-0 fa fa-pencil"/>',
                    orderable: false
                },
                {
                    data: null,
                    className: "dt-center editor-delete",
                    defaultContent: '<i class="btn p-0 m-0 fa fa-trash"/>',
                    orderable: false
                }
            ]
        } );
      } );
    </script>

    <script type="text/javascript" language="javascript" src="assets/js/bootstrap.bundle.js"></script>

</head>
<body>

  <div id="wrapper">

<!-- Dynamically generate sidebar -->
<?php
  getAlert();
  generateSidebar();
?>
