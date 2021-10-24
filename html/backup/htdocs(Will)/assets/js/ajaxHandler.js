$(document).ready(function () {
  //Add-book
  $(".add-book-btn").click(function () {
    // AJAX request
    $.ajax({
      url: "assets/php/addbook.php",
      type: "POST",
      success: function (response) {
        // Add response in Modal body
        $(".modal-body").html(response);
        // Display Modal
        $("#add-staff").modal("show");
      },
    });
  });

  //Edit-book
  $(".edit-book-btn").click(function () {
    var editbookid = $(this).data("id");
    // AJAX request
    $.ajax({
      url: "assets/php/editbook.php",
      type: "post",
      data: { editbookid: editbookid },
      success: function (response) {
        // Add response in Modal body
        $(".modal-body").html(response);
        // Display Modal
        $("#edit-book-modal").modal("show");
      },
    });
  });

  //Delete-book
  $(".delete-book-btn").click(function () {
    var deleteid = $(this).data("id");
    // AJAX request
    $.ajax({
      url: "assets/php/deletebook.php",
      type: "POST",
      data: { deleteid: deleteid },
      success: function (response) {
        // Add response in Modal body
        $(".modal-body").html(response);
        // Display Modal
        $("#delete-book-modal").modal("show");
      },
    });
  });
});
