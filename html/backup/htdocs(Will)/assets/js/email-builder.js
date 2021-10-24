"use strict";

var App = function App(props) {
  var emailEditorRef = React.useRef(null);
  var inputRef = React.useRef(null);
  var exportHtml = function exportHtml() {
    var name = inputRef.current.value;
    emailEditorRef.current.editor.exportHtml(function (data) {
      var design = data.design,
        html = data.html;

      var formData = new FormData();
      formData.append("design", JSON.stringify(design));
      formData.append("html", html);
      formData.append("name", name);
      fetch("http://localhost/marketing-campaign/src/save.template.php", {
        method: "POST",
        body: formData,
      })
        .then(function (res) {
          return res.json();
        })
        .then(
          function (result) {
            if (result && result["success"] == "true") {
              swal("Information!", "Template successfully saved!", "success");
            } else {
              swal(
                "Information!",
                "Unable to save the template. " + result["msg"],
                "error"
              );
            }
          },
          function (error) {
            swal("Information!", "Unable to save the template", "error");
          }
        );
    });
  };

  var onLoad = function onLoad() {
    var id = new URLSearchParams(window.location.search).get("id");
    if (id) {
      fetch(
        "http://localhost/marketing-campaign/src/templates/" +
          id +
          "/design.json"
      )
        .then(function (res) {
          return res.json();
        })
        .then(function (templateJson) {
          return emailEditorRef.current.editor.loadDesign(templateJson);
        })
        .catch(function (err) {
          console.log(err);
          swal("Information!", "Unable to load the template", "error").then(
            () => {}
          );
        });
    }
  };

  return React.createElement(
    "div",
    null,
    React.createElement(
      "form",
      { className: "form-inline text-right" },
      React.createElement(
        "div",
        { className: "form-group mx-sm-3 mb-2" },
        React.createElement("input", {
          type: "text",
          className: "form-control",
          id: "name",
          ref: inputRef,
          placeholder: "Enter Template Name",
        })
      ),
      React.createElement(
        "button",
        {
          type: "button",
          className: "btn btn-primary mb-2",
          onClick: exportHtml,
        },
        "Save"
      )
    ),
    React.createElement(EmailEditor, { ref: emailEditorRef, onLoad: onLoad })
  );
};

var domContainer = document.querySelector("#root");
ReactDOM.render(React.createElement(App, null), domContainer);
