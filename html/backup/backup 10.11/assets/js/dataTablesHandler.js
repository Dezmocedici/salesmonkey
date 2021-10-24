$(document).ready(function () {
  // DataTable
  var userDataTable = $("#staff").DataTable({
    processing: true,
    serverSide: true,
    serverMethod: "post",
    ajax: {
      url: "ajaxfile.php",
    },
    columns: [{ data: "email" }, { data: "name" }, { data: "phone" }],
  });

  // Update record
  $("#staff").on("click", ".updateUser", function () {
    var id = $(this).data("id");

    $("#txt_userid").val(id);

    // AJAX request
    $.ajax({
      url: "ajaxfile.php",
      type: "post",
      data: { request: 2, id: id },
      dataType: "json",
      success: function (response) {
        if (response.status == 1) {
          $("#email").val(response.data.email);
          $("#fname").val(response.data.fname);
          $("#lname").val(response.data.lname);
          $("#phone").val(response.data.phone);
        } else {
          alert("Invalid ID.");
        }
      },
    });
  });

  // Save user
  $("#btn_save").click(function () {
    var id = $("#txt_userid").val();

    var email = $("#email").val().trim();
    var fname = $("#fname").val().trim();
    var lname = $("#lname").val().trim();
    var phone = $("#phone").val().trim();

    if (fname != "" && lname != "" && email != "") {
      // AJAX request
      $.ajax({
        url: "ajaxfile.php",
        type: "post",
        data: {
          request: 3,
          id: id,
          fname: fname,
          lname: lname,
          email: email,
          phone: phone,
        },
        dataType: "json",
        success: function (response) {
          if (response.status == 1) {
            alert(response.message);

            // Empty the fields
            $("#name", "#email", "#city").val("");
            $("#gender").val("male");
            $("#txt_userid").val(0);

            // Reload DataTable
            userDataTable.ajax.reload();

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
  $("#staff").on("click", ".deleteUser", function () {
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
            userDataTable.ajax.reload();
          } else {
            alert("Invalid ID.");
          }
        },
      });
    }
  });
});
