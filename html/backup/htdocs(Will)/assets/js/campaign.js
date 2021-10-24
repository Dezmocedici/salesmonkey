var receipients;
var subject;
var campaign;
var body;
var type;
var schedule_cb = false;
Dropzone.options.myAwesomeDropzone = {
  maxFiles: 1,
  autoProcessQueue: false,
  acceptedFiles: "image/*",
  init: function () {
    this.on("success", function (file, responseText) {
      if (responseText["success"] && responseText["success"] == "true") {
        swal(
          "Success!",
          `Email ${
            scheduled_date == null ? "Sent" : "Schedules"
          } Successfully!`,
          "success"
        ).then(() => {
          window.location.reload();
        });
      } else {
        swal("Oh!", "We were not able to send the mails!", "error");
      }
      $.LoadingOverlay("hide");
    });
    this.on("sending", function (file, xhr, formData) {
      formData.append("receipents", receipients);
      formData.append("subject", subject);
      formData.append("campaign", campaign);
      formData.append("body", body);
      formData.append("type", type);
      formData.append("schedule", scheduled_date);
    });
  },
};

function openModal(emails) {
  $("#recipient-list").modal("show");
  $.post("get.recipients.php", { emails: `${emails}` })
    .done(function (response) {
      var $data = $("#data");
      $data.html("");
      response.data.forEach((value) => {
        var $div = $("<div>");
        $div.addClass("form-row");
        $div.html(
          `<p>${value.email} , ${value.first_name} ${value.last_name}</p>`
        );
        $div.appendTo($data);
      });
    })
    .fail(function (error) {
      console.log(error);
    });
}

function sendMail() {
  receipients = $("#receipients").val();
  subject = $("#subject").val();
  campaign = $("#campaign_name").val();
  body = $("#body").val();
  type = $("#type").val();
  if (receipients.length == 0 || !subject || !campaign || !body || !type) {
    swal("Oops!", "Please fill all the fields", "error");
    return;
  }

  if (schedule_cb && scheduled_date == null) {
    swal("Oops!", "Please select the scheduled date", "error");
    return;
  }
  var myDropzone = Dropzone.forElement("#my-awesome-dropzone");
  $.LoadingOverlay("show");
  if (type == "pamphlet" && myDropzone.getQueuedFiles().length > 0) {
    myDropzone.processQueue();
  } else {
    $.post("add.campaign.php", {
      receipents: receipients.join(),
      subject: subject,
      body: body,
      campaign: campaign,
      type: type,
      template: $("#template").val(),
      schedule: scheduled_date,
    })
      .done((response) => {
        if (response["success"] && response["success"] == "true") {
          swal(
            "Success!",
            `Email ${
              scheduled_date == null ? "Sent" : "Schedules"
            } Successfully!`,
            "success"
          ).then(() => {
            window.location.reload();
          });
        } else {
          swal("Oh!", "We were not able to send the mails!", "error");
        }
      })
      .fail((err) => {
        swal("Oh!", "We were not able to send the mails!", "error");
      })
      .always(() => {
        $.LoadingOverlay("hide");
      });
  }
}

$(function () {
  $("a.nav-link.sidebar-link").removeClass("nav-active");
  $("a[href*='campaigns.php']").addClass("nav-active");
  $("#template-div").hide();
  $("#schedule_date").daterangepicker({
    singleDatePicker: true,
    timePicker: true,
    autoUpdateInput: false,
    minDate: moment(),
    autoApply: true,
  });
  $("#schedule-div").hide();
});

let scheduled_date = null;
$("#schedule_date").on("apply.daterangepicker", function (ev, picker) {
  $(this).val(picker.startDate.format("MM/DD/YYYY HH:mm"));
  scheduled_date = picker.startDate.valueOf();
});
$("#schedule_cb").on("change", function (e) {
  schedule_cb = $("#schedule_cb").is(":checked");
  if (schedule_cb) {
    $("#schedule-div").show();
  } else {
    $("#schedule-div").hide();
  }
});
$("#type").on("change", function (e) {
  var type = $("#type").val();
  if (type == "pamphlet") {
    $("#template-div").hide();
    $("#pamphlet-div").show();
  } else {
    $("#template-div").show();
    $("#pamphlet-div").hide();
  }
});

function openTemplate() {
  var path = $("#template").find("option:selected").attr("id");
  window.open(`${path}/template.html`, "_blank");
}
