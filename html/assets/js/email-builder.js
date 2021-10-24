"use strict";

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Home = function (_React$Component) {
  _inherits(Home, _React$Component);

  function Home(props) {
    _classCallCheck(this, Home);

    return _possibleConstructorReturn(this, (Home.__proto__ || Object.getPrototypeOf(Home)).call(this, props));
  }

  _createClass(Home, [{
    key: "render",
    value: function render() {
      var myStyle = {
        // backgroundColor:'red'
      };

      var download = function download(text) {
        var f = new File([text], new Date().valueOf() + ".html", {
          type: "text/html"
        });
        var blobUrl = URL.createObjectURL(f);
        var link = document.createElement("a");
        link.href = blobUrl;
        link.setAttribute("download", "html_design_" + new Date().valueOf() + ".html");
        link.click();
      };

      var emailEditorRef = React.createRef();
      var exportHtml = function exportHtml() {
        emailEditorRef.current.editor.exportHtml(function (data) {
          var design = data.design,
              html = data.html;

          download(html);
        });
      };

      return React.createElement(
        "div",
        { className: "row m-2" },
        React.createElement(
          "button",
          {
            className: "btn btn-primary",
            style: myStyle,
            onClick: exportHtml
          },
          "Export"
        ),
        React.createElement(
          "div",
          { className: "col-12" },
          React.createElement(EmailEditor, {
            ref: emailEditorRef,
            onLoad: function onLoad() {
              return console.log("Editor Loaded");
            }
          })
        )
      );
    }
  }]);

  return Home;
}(React.Component);

var domContainer = document.querySelector("#container");
ReactDOM.render(React.createElement(Home, null), domContainer);