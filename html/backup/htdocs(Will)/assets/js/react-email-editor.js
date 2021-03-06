!(function (e, t) {
  "object" == typeof exports && "object" == typeof module
    ? (module.exports = t(require("react")))
    : "function" == typeof define && define.amd
    ? define(["react"], t)
    : "object" == typeof exports
    ? (exports.EmailEditor = t(require("react")))
    : (e.EmailEditor = t(e.React));
})(window, function (e) {
  return (function (e) {
    var t = {};
    function r(o) {
      if (t[o]) return t[o].exports;
      var n = (t[o] = { i: o, l: !1, exports: {} });
      return e[o].call(n.exports, n, n.exports, r), (n.l = !0), n.exports;
    }
    return (
      (r.m = e),
      (r.c = t),
      (r.d = function (e, t, o) {
        r.o(e, t) ||
          Object.defineProperty(e, t, {
            configurable: !1,
            enumerable: !0,
            get: o,
          });
      }),
      (r.r = function (e) {
        Object.defineProperty(e, "__esModule", { value: !0 });
      }),
      (r.n = function (e) {
        var t =
          e && e.__esModule
            ? function () {
                return e.default;
              }
            : function () {
                return e;
              };
        return r.d(t, "a", t), t;
      }),
      (r.o = function (e, t) {
        return Object.prototype.hasOwnProperty.call(e, t);
      }),
      (r.p = ""),
      r((r.s = 3))
    );
  })([
    function (t, r) {
      t.exports = e;
    },
    function (e) {
      e.exports = {
        name: "react-email-editor",
        version: "1.3.0",
        description: "Unlayer's Email Editor Component for React.js",
        main: "lib/index.js",
        module: "es/index.js",
        files: ["css", "es", "lib", "umd"],
        scripts: {
          build: "nwb build-react-component",
          clean: "nwb clean-module && nwb clean-demo",
          start: "nwb serve-react-demo",
          test: "nwb test-react",
          "test:coverage": "nwb test-react --coverage",
          "test:watch": "nwb test-react --server",
          release: "npm run build && npm publish",
        },
        dependencies: {},
        peerDependencies: { react: "15.x || 16.x" },
        devDependencies: {
          nwb: "^0.22.0",
          react: "^16.13.1",
          "react-dom": "^16.13.1",
          "react-router-dom": "^5.2.0",
          "styled-components": "^4.2.0",
        },
        author: "",
        homepage: "https://github.com/unlayer/react-email-editor#readme",
        license: "MIT",
        repository: "https://github.com/unlayer/react-email-editor.git",
        keywords: ["react-component"],
      };
    },
    function (e, t, r) {
      "use strict";
      r.r(t);
      var o = r(0),
        n = r.n(o),
        i = "//editor.unlayer.com/embed.js?2",
        a = [],
        c = !1,
        s = function () {
          if (c) for (var e = void 0; (e = a.shift()); ) e();
        },
        p = function (e) {
          if (
            ((function (e) {
              a.push(e);
            })(e),
            (r = !1),
            document.querySelectorAll("script").forEach(function (e) {
              e.src.includes(i) && (r = !0);
            }),
            r)
          )
            s();
          else {
            var t = document.createElement("script");
            t.setAttribute("src", i),
              (t.onload = function () {
                (c = !0), s();
              }),
              document.head.appendChild(t);
          }
          var r;
        },
        d = r(1);
      r.d(t, "default", function () {
        return f;
      });
      var l =
        Object.assign ||
        function (e) {
          for (var t = 1; t < arguments.length; t++) {
            var r = arguments[t];
            for (var o in r)
              Object.prototype.hasOwnProperty.call(r, o) && (e[o] = r[o]);
          }
          return e;
        };
      var u = 0,
        f = (function (e) {
          function t(r) {
            !(function (e, t) {
              if (!(e instanceof t))
                throw new TypeError("Cannot call a class as a function");
            })(this, t);
            var o = (function (e, t) {
              if (!e)
                throw new ReferenceError(
                  "this hasn't been initialised - super() hasn't been called"
                );
              return !t || ("object" != typeof t && "function" != typeof t)
                ? e
                : t;
            })(this, e.call(this, r));
            return (
              (o.loadEditor = function () {
                var e = o.props.options || {};
                o.props.projectId && (e.projectId = o.props.projectId),
                  o.props.tools && (e.tools = o.props.tools),
                  o.props.appearance && (e.appearance = o.props.appearance),
                  o.props.locale && (e.locale = o.props.locale),
                  (o.editor = unlayer.createEditor(
                    l({}, e, {
                      id: o.editorId,
                      displayMode: "email",
                      source: { name: d.name, version: d.version },
                    })
                  ));
                var t = Object.entries(o.props),
                  r = Array.isArray(t),
                  n = 0;
                for (t = r ? t : t[Symbol.iterator](); ; ) {
                  var i;
                  if (r) {
                    if (n >= t.length) break;
                    i = t[n++];
                  } else {
                    if ((n = t.next()).done) break;
                    i = n.value;
                  }
                  var a = i,
                    c = a[0],
                    s = a[1];
                  /^on/.test(c) && "onLoad" != c && o.addEventListener(c, s);
                }
                var p = o.props.onLoad;
                p && p();
              }),
              (o.registerCallback = function (e, t) {
                o.editor.registerCallback(e, t);
              }),
              (o.addEventListener = function (e, t) {
                o.editor.addEventListener(e, t);
              }),
              (o.loadDesign = function (e) {
                o.editor.loadDesign(e);
              }),
              (o.saveDesign = function (e) {
                o.editor.saveDesign(e);
              }),
              (o.exportHtml = function (e) {
                o.editor.exportHtml(e);
              }),
              (o.setMergeTags = function (e) {
                o.editor.setMergeTags(e);
              }),
              (o.editorId = r.editorId || "editor-" + ++u),
              o
            );
          }
          return (
            (function (e, t) {
              if ("function" != typeof t && null !== t)
                throw new TypeError(
                  "Super expression must either be null or a function, not " +
                    typeof t
                );
              (e.prototype = Object.create(t && t.prototype, {
                constructor: {
                  value: e,
                  enumerable: !1,
                  writable: !0,
                  configurable: !0,
                },
              })),
                t &&
                  (Object.setPrototypeOf
                    ? Object.setPrototypeOf(e, t)
                    : (e.__proto__ = t));
            })(t, e),
            (t.prototype.componentDidMount = function () {
              p(this.loadEditor);
            }),
            (t.prototype.render = function () {
              var e = this.props,
                t = e.minHeight,
                r = void 0 === t ? 500 : t,
                o = e.style,
                i = void 0 === o ? {} : o;
              return n.a.createElement(
                "div",
                { style: { flex: 1, display: "flex", minHeight: r } },
                n.a.createElement("div", {
                  id: this.editorId,
                  style: l({}, i, { flex: 1 }),
                })
              );
            }),
            t
          );
        })(o.Component);
    },
    function (e, t, r) {
      e.exports = r(2);
    },
  ]).default;
});
//# sourceMappingURL=react-email-editor.min.js.map
