$(document).ready(function () {
  // DataTable
  var tagsDataTable = $("#tags").DataTable({
    processing: true,
    serverSide: true,
    serverMethod: "post",
    ajax: {
      url: "ajaxfile.php",
    },
    columns: [{ data: "name" }, { data: "description" }, { data: "colour_id" }],
  });

  // Update record
  $("#tags").on("click", ".updateUser", function () {
    var id = $(this).data("id");

    $("#tag-id").val(id);

    // AJAX request
    $.ajax({
      url: "ajaxfile.php",
      type: "post",
      data: { request: 2, id: id },
      dataType: "json",
      success: function (response) {
        if (response.status == 1) {
          $("#name").val(response.data.name);
          $("#description").val(response.data.description);
          $("#colour").val(response.data.colour);
        } else {
          alert("Invalid ID.");
        }
      },
    });
  });

  // Save user
  $("#update").click(function () {
    var id = $("#tag-id").val();

    var name = $("#name").val().trim();
    var description = $("#description").val().trim();
    var colour = $("#colour").val().trim();

    if (name != "" && description != "" && colour != "") {
      // AJAX request
      $.ajax({
        url: "ajaxfile.php",
        type: "post",
        data: {
          request: 3,
          id: id,
          name: name,
          description: description,
          colour: colour,
        },
        dataType: "json",
        success: function (response) {
          if (response.status == 1) {
            alert(response.message);

            // Empty the fields
            $("#name", "#description").val("");
            $("#colour").val("Blue");
            $("#id").val(0);

            // Reload DataTable
            tagsDataTable.ajax.reload();

            // Close modal
            $("#updateModal").modal("toggle");
          } else {
            alert(response.message);
          }
        },
      });
    } else {
      alert("Please fill all fields.");
    }
  });

  // Delete record
  $("#tags").on("click", ".deleteTag", function () {
    var id = $(this).data("id");

    var deleteConfirm = confirm("Are you sure?");
    if (deleteConfirm == true) {
      // AJAX request
      $.ajax({
        url: "ajaxfile.php",
        type: "post",
        data: { request: 4, id: id },
        success: function (response) {
          if (response == 1) {
            alert("Record deleted.");

            // Reload DataTable
            tagsDataTable.ajax.reload();
          } else {
            alert("Invalid ID.");
          }
        },
      });
    }
  });
});
