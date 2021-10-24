function addCustomer() {
  //   $("#add-customer-form").submit(function (e) {
  var fname = $("#first_name").val().trim();
  var lname = $("#last_name").val().trim();
  var email = $("#email").val().trim();
  var phone = $("#phone_number").val().trim();

  if (!fname || !lname || !email || !phone) {
    swal("Oops!", "Please fill all the fields", "error");
    return false;
  }
  // return true;
  $.ajax({
    url: "add.customer.php",
    type: "POST",
    data: {
      first_name: fname,
      last_name: lname,
      email: email,
      phone: phone,
    },
    success: function (response) {
      console.log(response.success);
      if (response["success"] && response["success"] == "true") {
        swal("Success!", "Customer Added Successfully!", "success").then(() => {
          location.reload();
        });
      } else {
        swal("Oh!", "We were not able to add the customer!", "error");
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      swal("Oh!", "We were not able to add the customer!", "error");
    },
  });
  //   });
}

$(function () {
  $("a.nav-link.sidebar-link").removeClass("nav-active");
  $("a[href*='customers.php']").addClass("nav-active");
});
