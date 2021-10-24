$(document).ready(function () {
  $("#activity").DataTable({
    pagingType: "full",
    buttons: ["copy", "excel", "pdf"],
  });

  $("#staff").DataTable({
    pagingType: "full",
    buttons: ["copy", "excel", "pdf"],
  });

  $("#audience").DataTable({
    pagingType: "full",
    buttons: ["copy", "excel", "pdf"],
  });

  $("#tags").DataTable({
    pagingType: "full",
    buttons: ["copy", "excel", "pdf"],
  });

  $("#campaigns").DataTable({
    pagingType: "full",
    buttons: ["copy", "excel", "pdf"],
  });
});
