var unlayer;
(() => {
  var e = {
      51: function(e, t) {
        var r, i;
        void 0 === (i = "function" == typeof(r = function() {
          var e = /^v?(?:\d+)(\.(?:[x*]|\d+)(\.(?:[x*]|\d+)(\.(?:[x*]|\d+))?(?:-[\da-z\-]+(?:\.[\da-z\-]+)*)?(?:\+[\da-z\-]+(?:\.[\da-z\-]+)*)?)?)?$/i;

          function t(e) {
            var t, r, i = e.replace(/^v/, "").replace(/\+.*$/, ""),
              n = (r = "-", -1 === (t = i).indexOf(r) ? t.length : t.indexOf(r)),
              s = i.substring(0, n).split(".");
            return s.push(i.substring(n + 1)), s
          }

          function r(e) {
            return isNaN(Number(e)) ? e : Number(e)
          }

          function i(t) {
            if ("string" != typeof t) throw new TypeError("Invalid argument expected string");
            if (!e.test(t)) throw new Error("Invalid argument not valid semver ('" + t + "' received)")
          }

          function n(e, n) {
            [e, n].forEach(i);
            for (var s = t(e), a = t(n), o = 0; o < Math.max(s.length - 1, a.length - 1); o++) {
              var l = parseInt(s[o] || 0, 10),
                c = parseInt(a[o] || 0, 10);
              if (l > c) return 1;
              if (c > l) return -1
            }
            var u = s[s.length - 1],
              h = a[a.length - 1];
            if (u && h) {
              var f = u.split(".").map(r),
                p = h.split(".").map(r);
              for (o = 0; o < Math.max(f.length, p.length); o++) {
                if (void 0 === f[o] || "string" == typeof p[o] && "number" == typeof f[o]) return -1;
                if (void 0 === p[o] || "string" == typeof f[o] && "number" == typeof p[o]) return 1;
                if (f[o] > p[o]) return 1;
                if (p[o] > f[o]) return -1
              }
            } else if (u || h) return u ? -1 : 1;
            return 0
          }
          var s = [">", ">=", "=", "<", "<="],
            a = {
              ">": [1],
              ">=": [0, 1],
              "=": [0],
              "<=": [-1, 0],
              "<": [-1]
            };
          return n.validate = function(t) {
            return "string" == typeof t && e.test(t)
          }, n.compare = function(e, t, r) {
            ! function(e) {
              if ("string" != typeof e) throw new TypeError("Invalid operator type, expected string but got " + typeof e);
              if (-1 === s.indexOf(e)) throw new TypeError("Invalid operator, expected one of " + s.join("|"))
            }(r);
            var i = n(e, t);
            return a[r].indexOf(i) > -1
          }, n
        }) ? r.apply(t, []) : r) || (e.exports = i)
      }
    },
    t = {};

  function r(i) {
    if (t[i]) return t[i].exports;
    var n = t[i] = {
      exports: {}
    };
    return e[i].call(n.exports, n, n.exports, r), n.exports
  }
  r.d = (e, t) => {
    for (var i in t) r.o(t, i) && !r.o(e, i) && Object.defineProperty(e, i, {
      enumerable: !0,
      get: t[i]
    })
  }, r.o = (e, t) => Object.prototype.hasOwnProperty.call(e, t), r.p = "/";
  var i, n, s = {};
  Window.prototype.forceJURL = !1,
    function(e) {
      "use strict";
      var t = !1;
      if (!e.forceJURL) try {
        var r = new URL("b", "http://a");
        r.pathname = "c%20d", t = "http://a/c%20d" === r.href
      } catch (e) {}
      if (!t) {
        var i = Object.create(null);
        i.ftp = 21, i.file = 0, i.gopher = 70, i.http = 80, i.https = 443, i.ws = 80, i.wss = 443;
        var n = Object.create(null);
        n["%2e"] = ".", n[".%2e"] = "..", n["%2e."] = "..", n["%2e%2e"] = "..";
        var s = void 0,
          a = /[a-zA-Z]/,
          o = /[a-zA-Z0-9\+\-\.]/;
        y.prototype = {
          toString: function() {
            return this.href
          },
          get href() {
            if (this._isInvalid) return this._url;
            var e = "";
            return "" == this._username && null == this._password || (e = this._username + (null != this._password ? ":" + this._password : "") + "@"), this.protocol + (this._isRelative ? "//" + e + this.host : "") + this.pathname + this._query + this._fragment
          },
          set href(e) {
            v.call(this), d.call(this, e)
          },
          get protocol() {
            return this._scheme + ":"
          },
          set protocol(e) {
            this._isInvalid || d.call(this, e + ":", "scheme start")
          },
          get host() {
            return this._isInvalid ? "" : this._port ? this._host + ":" + this._port : this._host
          },
          set host(e) {
            !this._isInvalid && this._isRelative && d.call(this, e, "host")
          },
          get hostname() {
            return this._host
          },
          set hostname(e) {
            !this._isInvalid && this._isRelative && d.call(this, e, "hostname")
          },
          get port() {
            return this._port
          },
          set port(e) {
            !this._isInvalid && this._isRelative && d.call(this, e, "port")
          },
          get pathname() {
            return this._isInvalid ? "" : this._isRelative ? "/" + this._path.join("/") : this._schemeData
          },
          set pathname(e) {
            !this._isInvalid && this._isRelative && (this._path = [], d.call(this, e, "relative path start"))
          },
          get search() {
            return this._isInvalid || !this._query || "?" == this._query ? "" : this._query
          },
          set search(e) {
            !this._isInvalid && this._isRelative && (this._query = "?", "?" == e[0] && (e = e.slice(1)), d.call(this, e, "query"))
          },
          get hash() {
            return this._isInvalid || !this._fragment || "#" == this._fragment ? "" : this._fragment
          },
          set hash(e) {
            this._isInvalid || (e ? (this._fragment = "#", "#" == e[0] && (e = e.slice(1)), d.call(this, e, "fragment")) : this._fragment = "")
          },
          get origin() {
            var e;
            if (this._isInvalid || !this._scheme) return "";
            switch (this._scheme) {
              case "data":
              case "file":
              case "javascript":
              case "mailto":
                return "null"
            }
            return (e = this.host) ? this._scheme + "://" + e : ""
          }
        };
        var l = e.URL;
        l && (y.createObjectURL = function(e) {
          return l.createObjectURL.apply(l, arguments)
        }, y.revokeObjectURL = function(e) {
          l.revokeObjectURL(e)
        }), e.URL = y
      }

      function c(e) {
        return void 0 !== i[e]
      }

      function u() {
        v.call(this), this._isInvalid = !0
      }

      function h(e) {
        return "" == e && u.call(this), e.toLowerCase()
      }

      function f(e) {
        var t = e.charCodeAt(0);
        return t > 32 && t < 127 && -1 == [34, 35, 60, 62, 63, 96].indexOf(t) ? e : encodeURIComponent(e)
      }

      function p(e) {
        var t = e.charCodeAt(0);
        return t > 32 && t < 127 && -1 == [34, 35, 60, 62, 96].indexOf(t) ? e : encodeURIComponent(e)
      }

      function d(e, t, r) {
        function l(e) {
          b.push(e)
        }
        var d = t || "scheme start",
          v = 0,
          y = "",
          g = !1,
          m = !1,
          b = [];
        e: for (;
          (e[v - 1] != s || 0 == v) && !this._isInvalid;) {
          var _ = e[v];
          switch (d) {
            case "scheme start":
              if (!_ || !a.test(_)) {
                if (t) {
                  l("Invalid scheme.");
                  break e
                }
                y = "", d = "no scheme";
                continue
              }
              y += _.toLowerCase(), d = "scheme";
              break;
            case "scheme":
              if (_ && o.test(_)) y += _.toLowerCase();
              else {
                if (":" != _) {
                  if (t) {
                    if (s == _) break e;
                    l("Code point not allowed in scheme: " + _);
                    break e
                  }
                  y = "", v = 0, d = "no scheme";
                  continue
                }
                if (this._scheme = y, y = "", t) break e;
                c(this._scheme) && (this._isRelative = !0), d = "file" == this._scheme ? "relative" : this._isRelative && r && r._scheme == this._scheme ? "relative or authority" : this._isRelative ? "authority first slash" : "scheme data"
              }
              break;
            case "scheme data":
              "?" == _ ? (this._query = "?", d = "query") : "#" == _ ? (this._fragment = "#", d = "fragment") : s != _ && "\t" != _ && "\n" != _ && "\r" != _ && (this._schemeData += f(_));
              break;
            case "no scheme":
              if (r && c(r._scheme)) {
                d = "relative";
                continue
              }
              l("Missing scheme."), u.call(this);
              break;
            case "relative or authority":
              if ("/" != _ || "/" != e[v + 1]) {
                l("Expected /, got: " + _), d = "relative";
                continue
              }
              d = "authority ignore slashes";
              break;
            case "relative":
              if (this._isRelative = !0, "file" != this._scheme && (this._scheme = r._scheme), s == _) {
                this._host = r._host, this._port = r._port, this._path = r._path.slice(), this._query = r._query, this._username = r._username, this._password = r._password;
                break e
              }
              if ("/" == _ || "\\" == _) "\\" == _ && l("\\ is an invalid code point."), d = "relative slash";
              else if ("?" == _) this._host = r._host, this._port = r._port, this._path = r._path.slice(), this._query = "?", this._username = r._username, this._password = r._password, d = "query";
              else {
                if ("#" != _) {
                  var w = e[v + 1],
                    k = e[v + 2];
                  ("file" != this._scheme || !a.test(_) || ":" != w && "|" != w || s != k && "/" != k && "\\" != k && "?" != k && "#" != k) && (this._host = r._host, this._port = r._port, this._username = r._username, this._password = r._password, this._path = r._path.slice(), this._path.pop()), d = "relative path";
                  continue
                }
                this._host = r._host, this._port = r._port, this._path = r._path.slice(), this._query = r._query, this._fragment = "#", this._username = r._username, this._password = r._password, d = "fragment"
              }
              break;
            case "relative slash":
              if ("/" != _ && "\\" != _) {
                "file" != this._scheme && (this._host = r._host, this._port = r._port, this._username = r._username, this._password = r._password), d = "relative path";
                continue
              }
              "\\" == _ && l("\\ is an invalid code point."), d = "file" == this._scheme ? "file host" : "authority ignore slashes";
              break;
            case "authority first slash":
              if ("/" != _) {
                l("Expected '/', got: " + _), d = "authority ignore slashes";
                continue
              }
              d = "authority second slash";
              break;
            case "authority second slash":
              if (d = "authority ignore slashes", "/" != _) {
                l("Expected '/', got: " + _);
                continue
              }
              break;
            case "authority ignore slashes":
              if ("/" != _ && "\\" != _) {
                d = "authority";
                continue
              }
              l("Expected authority, got: " + _);
              break;
            case "authority":
              if ("@" == _) {
                g && (l("@ already seen."), y += "%40"), g = !0;
                for (var O = 0; O < y.length; O++) {
                  var M = y[O];
                  if ("\t" != M && "\n" != M && "\r" != M)
                    if (":" != M || null !== this._password) {
                      var j = f(M);
                      null !== this._password ? this._password += j : this._username += j
                    } else this._password = "";
                  else l("Invalid whitespace in authority.")
                }
                y = ""
              } else {
                if (s == _ || "/" == _ || "\\" == _ || "?" == _ || "#" == _) {
                  v -= y.length, y = "", d = "host";
                  continue
                }
                y += _
              }
              break;
            case "file host":
              if (s == _ || "/" == _ || "\\" == _ || "?" == _ || "#" == _) {
                2 != y.length || !a.test(y[0]) || ":" != y[1] && "|" != y[1] ? (0 == y.length || (this._host = h.call(this, y), y = ""), d = "relative path start") : d = "relative path";
                continue
              }
              "\t" == _ || "\n" == _ || "\r" == _ ? l("Invalid whitespace in file host.") : y += _;
              break;
            case "host":
            case "hostname":
              if (":" != _ || m) {
                if (s == _ || "/" == _ || "\\" == _ || "?" == _ || "#" == _) {
                  if (this._host = h.call(this, y), y = "", d = "relative path start", t) break e;
                  continue
                }
                "\t" != _ && "\n" != _ && "\r" != _ ? ("[" == _ ? m = !0 : "]" == _ && (m = !1), y += _) : l("Invalid code point in host/hostname: " + _)
              } else if (this._host = h.call(this, y), y = "", d = "port", "hostname" == t) break e;
              break;
            case "port":
              if (/[0-9]/.test(_)) y += _;
              else {
                if (s == _ || "/" == _ || "\\" == _ || "?" == _ || "#" == _ || t) {
                  if ("" != y) {
                    var T = parseInt(y, 10);
                    T != i[this._scheme] && (this._port = T + ""), y = ""
                  }
                  if (t) break e;
                  d = "relative path start";
                  continue
                }
                "\t" == _ || "\n" == _ || "\r" == _ ? l("Invalid code point in port: " + _) : u.call(this)
              }
              break;
            case "relative path start":
              if ("\\" == _ && l("'\\' not allowed in path."), d = "relative path", "/" != _ && "\\" != _) continue;
              break;
            case "relative path":
              var I;
              s != _ && "/" != _ && "\\" != _ && (t || "?" != _ && "#" != _) ? "\t" != _ && "\n" != _ && "\r" != _ && (y += f(_)) : ("\\" == _ && l("\\ not allowed in relative path."), (I = n[y.toLowerCase()]) && (y = I), ".." == y ? (this._path.pop(), "/" != _ && "\\" != _ && this._path.push("")) : "." == y && "/" != _ && "\\" != _ ? this._path.push("") : "." != y && ("file" == this._scheme && 0 == this._path.length && 2 == y.length && a.test(y[0]) && "|" == y[1] && (y = y[0] + ":"), this._path.push(y)), y = "", "?" == _ ? (this._query = "?", d = "query") : "#" == _ && (this._fragment = "#", d = "fragment"));
              break;
            case "query":
              t || "#" != _ ? s != _ && "\t" != _ && "\n" != _ && "\r" != _ && (this._query += p(_)) : (this._fragment = "#", d = "fragment");
              break;
            case "fragment":
              s != _ && "\t" != _ && "\n" != _ && "\r" != _ && (this._fragment += _)
          }
          v++
        }
      }

      function v() {
        this._scheme = "", this._schemeData = "", this._username = "", this._password = null, this._host = "", this._port = "", this._path = [], this._query = "", this._fragment = "", this._isInvalid = !1, this._isRelative = !1
      }

      function y(e, t) {
        void 0 === t || t instanceof y || (t = new y(String(t))), this._url = "" + e, v.call(this);
        var r = this._url.replace(/^[ \t\r\n\f]+|[ \t\r\n\f]+$/g, "");
        d.call(this, r, null, t)
      }
    }(window),
    function(e) {
      var t = "currentScript",
        r = e.getElementsByTagName("script");
      t in e || Object.defineProperty(e, t, {
        get: function() {
          try {
            throw new Error
          } catch (i) {
            var e, t = (/.*at [^\(]*\((.*):.+:.+\)$/gi.exec(i.stack) || [!1])[1];
            for (e in r)
              if (r[e].src == t || "interactive" == r[e].readyState) return r[e];
            return null
          }
        }
      })
    }(document), n = (i = new URL(document.currentScript.src)).href.substring(0, i.href.lastIndexOf("/") + 1), r.p = n, (() => {
      "use strict";

      function e(e, t) {
        var r = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
          var i = Object.getOwnPropertySymbols(e);
          t && (i = i.filter((function(t) {
            return Object.getOwnPropertyDescriptor(e, t).enumerable
          }))), r.push.apply(r, i)
        }
        return r
      }

      function t(t) {
        for (var r = 1; r < arguments.length; r++) {
          var i = null != arguments[r] ? arguments[r] : {};
          r % 2 ? e(Object(i), !0).forEach((function(e) {
            n(t, e, i[e])
          })) : Object.getOwnPropertyDescriptors ? Object.defineProperties(t, Object.getOwnPropertyDescriptors(i)) : e(Object(i)).forEach((function(e) {
            Object.defineProperty(t, e, Object.getOwnPropertyDescriptor(i, e))
          }))
        }
        return t
      }

      function i(e, t) {
        for (var r = 0; r < t.length; r++) {
          var i = t[r];
          i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(e, i.key, i)
        }
      }

      function n(e, t, r) {
        return t in e ? Object.defineProperty(e, t, {
          value: r,
          enumerable: !0,
          configurable: !0,
          writable: !0
        }) : e[t] = r, e
      }
      r.d(s, {
        default: () => x
      });
      var a = 0,
        o = !0,
        l = {},
        c = function() {
          function e(t) {
            var r = this;
            ! function(e, t) {
              if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
            }(this, e), n(this, "id", void 0), n(this, "ready", void 0), n(this, "iframe", void 0), n(this, "messages", void 0), n(this, "callbackId", void 0), n(this, "callbacks", void 0), this.id = ++a, l[this.id] = this, this.ready = !1, this.iframe = this.createIframe(t), this.messages = [], this.iframe.onload = function() {
              r.ready = !0, r.flushMessages()
            }, this.callbackId = 0, this.callbacks = {}
          }
          var r, s;
          return r = e, (s = [{
            key: "createIframe",
            value: function(e) {
              var t = document.createElement("iframe");
              return t.src = e, t.frameBorder = "0", t.width = "100%", t.height = "100%", t.style.minWidth = "1024px", t.style.minHeight = "100%", t.style.height = "100%", t.style.width = "100%", t.style.border = "0px", t
            }
          }, {
            key: "appendTo",
            value: function(e) {
              e.appendChild(this.iframe)
            }
          }, {
            key: "postMessage",
            value: function(e, r) {
              this.scheduleMessage(t({
                action: e
              }, r)), this.flushMessages()
            }
          }, {
            key: "withMessage",
            value: function(e, r, i) {
              var n = this.callbackId++;
              this.callbacks[n] = i, this.postMessage(e, t({
                frameId: this.id,
                callbackId: n
              }, r))
            }
          }, {
            key: "scheduleMessage",
            value: function(e) {
              this.messages.push(e)
            }
          }, {
            key: "flushMessages",
            value: function() {
              var e = this;
              this.ready && (this.messages.forEach((function(t) {
                e.iframe && e.iframe.contentWindow && e.iframe.contentWindow.postMessage(t, "*")
              })), this.messages = [])
            }
          }, {
            key: "handleMessage",
            value: function(e) {
              var t = this,
                r = e.action,
                i = e.callbackId,
                n = e.doneId,
                s = e.result,
                a = this.callbacks[i];
              switch (r) {
                case "response":
                  a && (a(s), delete this.callbacks[i]);
                  break;
                case "callback":
                  s.attachments && (s.attachments = s.attachments.map((function(e) {
                    return new File([e.content], e.name, {
                      type: e.type
                    })
                  }))), a && a(s, (function(e, r) {
                    t.postMessage("done", {
                      doneId: n,
                      result: e,
                      meta: r
                    })
                  }))
              }
            }
          }, {
            key: "receiveMessage",
            value: function(e) {
              e.data && this.handleMessage(e.data)
            }
          }]) && i(r.prototype, s), e
        }();

      function u(e, t) {
        (null == t || t > e.length) && (t = e.length);
        for (var r = 0, i = new Array(t); r < t; r++) i[r] = e[r];
        return i
      }

      function h(e, t) {
        var r = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
          var i = Object.getOwnPropertySymbols(e);
          t && (i = i.filter((function(t) {
            return Object.getOwnPropertyDescriptor(e, t).enumerable
          }))), r.push.apply(r, i)
        }
        return r
      }

      function f(e) {
        for (var t = 1; t < arguments.length; t++) {
          var r = null != arguments[t] ? arguments[t] : {};
          t % 2 ? h(Object(r), !0).forEach((function(t) {
            p(e, t, r[t])
          })) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(r)) : h(Object(r)).forEach((function(t) {
            Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(r, t))
          }))
        }
        return e
      }

      function p(e, t, r) {
        return t in e ? Object.defineProperty(e, t, {
          value: r,
          enumerable: !0,
          configurable: !0,
          writable: !0
        }) : e[t] = r, e
      }

      function d(e) {
        return e && Array.isArray(e) ? e.map((function(e) {
          return f(f({}, e), {}, {
            attrs: e.attrs && Object.entries(e.attrs).reduce((function(e, t) {
              var r, i, n = (i = 2, function(e) {
                  if (Array.isArray(e)) return e
                }(r = t) || function(e, t) {
                  var r = e && ("undefined" != typeof Symbol && e[Symbol.iterator] || e["@@iterator"]);
                  if (null != r) {
                    var i, n, s = [],
                      a = !0,
                      o = !1;
                    try {
                      for (r = r.call(e); !(a = (i = r.next()).done) && (s.push(i.value), !t || s.length !== t); a = !0);
                    } catch (e) {
                      o = !0, n = e
                    } finally {
                      try {
                        a || null == r.return || r.return()
                      } finally {
                        if (o) throw n
                      }
                    }
                    return s
                  }
                }(r, i) || function(e, t) {
                  if (e) {
                    if ("string" == typeof e) return u(e, t);
                    var r = Object.prototype.toString.call(e).slice(8, -1);
                    return "Object" === r && e.constructor && (r = e.constructor.name), "Map" === r || "Set" === r ? Array.from(e) : "Arguments" === r || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r) ? u(e, t) : void 0
                  }
                }(r, i) || function() {
                  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
                }()),
                s = n[0],
                a = n[1];
              return f(f({}, e), {}, p({}, s, "function" == typeof a ? "".concat(a) : a))
            }), {})
          })
        })) : []
      }

      function v(e, t) {
        var r = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
          var i = Object.getOwnPropertySymbols(e);
          t && (i = i.filter((function(t) {
            return Object.getOwnPropertyDescriptor(e, t).enumerable
          }))), r.push.apply(r, i)
        }
        return r
      }

      function y(e) {
        for (var t = 1; t < arguments.length; t++) {
          var r = null != arguments[t] ? arguments[t] : {};
          t % 2 ? v(Object(r), !0).forEach((function(t) {
            _(e, t, r[t])
          })) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(r)) : v(Object(r)).forEach((function(t) {
            Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(r, t))
          }))
        }
        return e
      }

      function g(e, t) {
        return function(e) {
          if (Array.isArray(e)) return e
        }(e) || function(e, t) {
          var r = e && ("undefined" != typeof Symbol && e[Symbol.iterator] || e["@@iterator"]);
          if (null != r) {
            var i, n, s = [],
              a = !0,
              o = !1;
            try {
              for (r = r.call(e); !(a = (i = r.next()).done) && (s.push(i.value), !t || s.length !== t); a = !0);
            } catch (e) {
              o = !0, n = e
            } finally {
              try {
                a || null == r.return || r.return()
              } finally {
                if (o) throw n
              }
            }
            return s
          }
        }(e, t) || function(e, t) {
          if (e) {
            if ("string" == typeof e) return m(e, t);
            var r = Object.prototype.toString.call(e).slice(8, -1);
            return "Object" === r && e.constructor && (r = e.constructor.name), "Map" === r || "Set" === r ? Array.from(e) : "Arguments" === r || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r) ? m(e, t) : void 0
          }
        }(e, t) || function() {
          throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
        }()
      }

      function m(e, t) {
        (null == t || t > e.length) && (t = e.length);
        for (var r = 0, i = new Array(t); r < t; r++) i[r] = e[r];
        return i
      }

      function b(e, t) {
        for (var r = 0; r < t.length; r++) {
          var i = t[r];
          i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(e, i.key, i)
        }
      }

      function _(e, t, r) {
        return t in e ? Object.defineProperty(e, t, {
          value: r,
          enumerable: !0,
          configurable: !0,
          writable: !0
        }) : e[t] = r, e
      }
      window.addEventListener("message", (function(e) {
        var t, r, i = o ? null == e || null === (t = e.data) || void 0 === t ? void 0 : t.frameId : 1;
        i && (null === (r = l[i]) || void 0 === r || r.receiveMessage(e))
      }), !1);
      var w = function(e) {
          return "".concat(e, " method is not available here. It must be passed as customJS. More info at https://docs.unlayer.com/docs/custom-js-css")
        },
        k = function() {
          function e(t) {
            ! function(e, t) {
              if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
            }(this, e), _(this, "frame", null), t && this.init(t)
          }
          var t, i;
          return t = e, (i = [{
            key: "init",
            value: function() {
              var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
              this.loadEditor(e), this.renderEditor(e), this.initEditor(e)
            }
          }, {
            key: "loadEditor",
            value: function(e) {
              var t;
              (e.offline || null !== (t = e.appearance) && void 0 !== t && t.loader) && (e.render = !1);
              var i, n = e.version || "1.2.98",
                s = "".concat(r.p).concat(n, "/editor.html"),
                a = !1 === e.render ? "".concat(s, "?norender=true") : s;
              ("dev" === (i = n) ? 1 : r(51)(i, "1.0.57")) <= 0 && (o = !1), this.frame = new c(a)
            }
          }, {
            key: "renderEditor",
            value: function(e) {
              var t, r = null;
              if (e.id ? r = document.getElementById(e.id) : e.className && (r = document.getElementsByClassName(e.className)[0]), !e.id && !e.className) throw new Error("id or className must be provided.");
              if (!r) throw new Error("Could not find a valid element for given id or className.");
              null === (t = this.frame) || void 0 === t || t.appendTo(r)
            }
          }, {
            key: "initEditor",
            value: function(e) {
              var t, i = {};
              if (e.offline && (i.licenseUrl = "".concat(r.p, "license.json"), i.offline = e.offline), i.referrer = window.location.href, e.source && (i.source = e.source), e.amp && (i.amp = e.amp), e.designMode && (i.designMode = e.designMode), e.displayMode && (i.displayMode = e.displayMode), e.projectId && (i.projectId = e.projectId), e.user && (i.user = e.user), e.templateId && (i.templateId = e.templateId), e.stockTemplateId && (i.stockTemplateId = e.stockTemplateId), e.loadTimeout && (i.loadTimeout = e.loadTimeout), (e.safeHtml || e.safeHTML) && (i.safeHtml = e.safeHtml || e.safeHTML || !0), e.options && (i.options = e.options), e.validator && (i.validator = e.validator.toString()), e.tools) {
                var n = Object.entries(e.tools).reduce((function(e, t) {
                  var r = g(t, 2),
                    i = r[0],
                    n = r[1];
                  return y(y({}, e), {}, _({}, i, Object.entries(n).reduce((function(e, t) {
                    var r = g(t, 2),
                      i = r[0],
                      n = r[1];
                    return y(y({}, e), {}, _({}, i, "function" == typeof n ? n.toString() : n))
                  }), {})))
                }), {});
                i.tools = n
              }
              e.excludeTools && (i.excludeTools = e.excludeTools), e.blocks && (i.blocks = e.blocks), e.editor && (i.editor = e.editor), e.fonts && (i.fonts = e.fonts), e.linkTypes && (i.linkTypes = d(e.linkTypes)), e.mergeTags && (i.mergeTags = e.mergeTags), e.displayConditions && (i.displayConditions = e.displayConditions), e.specialLinks && (i.specialLinks = e.specialLinks), e.designTags && (i.designTags = e.designTags), e.customCSS && (i.customCSS = e.customCSS), e.customJS && (i.customJS = e.customJS), e.locale && (i.locale = e.locale), e.translations && (i.translations = e.translations), e.appearance && (i.appearance = e.appearance), e.features && (i.features = e.features), e.designTagsConfig && (i.designTagsConfig = e.designTagsConfig), e.mergeTagsConfig && (i.mergeTagsConfig = e.mergeTagsConfig), null === (t = this.frame) || void 0 === t || t.postMessage("config", i)
            }
          }, {
            key: "registerColumns",
            value: function(e) {
              var t;
              null === (t = this.frame) || void 0 === t || t.withMessage("registerColumns", {
                cells: e
              })
            }
          }, {
            key: "registerCallback",
            value: function(e, t) {
              var r;
              null === (r = this.frame) || void 0 === r || r.withMessage("registerCallback", {
                type: e
              }, t)
            }
          }, {
            key: "unregisterCallback",
            value: function(e) {
              var t;
              null === (t = this.frame) || void 0 === t || t.withMessage("unregisterCallback", {
                type: e
              })
            }
          }, {
            key: "registerProvider",
            value: function(e, t) {
              var r;
              null === (r = this.frame) || void 0 === r || r.withMessage("registerProvider", {
                type: e
              }, t)
            }
          }, {
            key: "unregisterProvider",
            value: function(e) {
              var t;
              null === (t = this.frame) || void 0 === t || t.withMessage("unregisterProvider", {
                type: e
              })
            }
          }, {
            key: "reloadProvider",
            value: function(e) {
              var t;
              null === (t = this.frame) || void 0 === t || t.withMessage("reloadProvider", {
                type: e
              })
            }
          }, {
            key: "addEventListener",
            value: function(e, t) {
              var r;
              null === (r = this.frame) || void 0 === r || r.withMessage("registerCallback", {
                type: e
              }, t)
            }
          }, {
            key: "removeEventListener",
            value: function(e) {
              var t;
              null === (t = this.frame) || void 0 === t || t.withMessage("unregisterCallback", {
                type: e
              })
            }
          }, {
            key: "setDesignMode",
            value: function(e) {
              var t;
              null === (t = this.frame) || void 0 === t || t.withMessage("setDesignMode", {
                designMode: e
              })
            }
          }, {
            key: "setDisplayMode",
            value: function(e) {
              var t;
              null === (t = this.frame) || void 0 === t || t.withMessage("setDisplayMode", {
                displayMode: e
              })
            }
          }, {
            key: "loadProject",
            value: function(e) {
              var t;
              null === (t = this.frame) || void 0 === t || t.postMessage("loadProject", {
                projectId: e
              })
            }
          }, {
            key: "loadUser",
            value: function(e) {
              var t;
              null === (t = this.frame) || void 0 === t || t.postMessage("loadUser", {
                user: e
              })
            }
          }, {
            key: "loadTemplate",
            value: function(e) {
              var t;
              null === (t = this.frame) || void 0 === t || t.postMessage("loadTemplate", {
                templateId: e
              })
            }
          }, {
            key: "loadStockTemplate",
            value: function(e) {
              var t;
              null === (t = this.frame) || void 0 === t || t.postMessage("loadStockTemplate", {
                stockTemplateId: e
              })
            }
          }, {
            key: "setLinkTypes",
            value: function(e) {
              var t;
              null === (t = this.frame) || void 0 === t || t.postMessage("setLinkTypes", {
                linkTypes: d(e)
              })
            }
          }, {
            key: "setMergeTags",
            value: function(e) {
              var t;
              null === (t = this.frame) || void 0 === t || t.postMessage("setMergeTags", {
                mergeTags: e
              })
            }
          }, {
            key: "setSpecialLinks",
            value: function(e) {
              var t;
              null === (t = this.frame) || void 0 === t || t.postMessage("setSpecialLinks", {
                specialLinks: e
              })
            }
          }, {
            key: "setDisplayConditions",
            value: function(e) {
              var t;
              null === (t = this.frame) || void 0 === t || t.postMessage("setDisplayConditions", {
                displayConditions: e
              })
            }
          }, {
            key: "setLocale",
            value: function(e) {
              var t;
              null === (t = this.frame) || void 0 === t || t.postMessage("setLocale", {
                locale: e
              })
            }
          }, {
            key: "setTranslations",
            value: function(e) {
              var t;
              null === (t = this.frame) || void 0 === t || t.postMessage("setTranslations", {
                translations: e
              })
            }
          }, {
            key: "loadBlank",
            value: function() {
              var e, t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {};
              null === (e = this.frame) || void 0 === e || e.postMessage("loadBlank", {
                bodyValues: t
              })
            }
          }, {
            key: "loadDesign",
            value: function(e) {
              var t;
              null === (t = this.frame) || void 0 === t || t.postMessage("loadDesign", {
                design: e
              })
            }
          }, {
            key: "saveDesign",
            value: function(e) {
              var t, r = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
              null === (t = this.frame) || void 0 === t || t.withMessage("saveDesign", r, e)
            }
          }, {
            key: "exportHtml",
            value: function(e, t) {
              var r;
              null === (r = this.frame) || void 0 === r || r.withMessage("exportHtml", t, e)
            }
          }, {
            key: "exportLiveHtml",
            value: function(e) {
              var t, r = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
              null === (t = this.frame) || void 0 === t || t.withMessage("exportLiveHtml", r, e)
            }
          }, {
            key: "exportPlainText",
            value: function(e) {
              var t, r = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
              null === (t = this.frame) || void 0 === t || t.withMessage("exportPlainText", r, e)
            }
          }, {
            key: "exportImage",
            value: function(e, t) {
              var r;
              null === (r = this.frame) || void 0 === r || r.withMessage("exportImage", t, e)
            }
          }, {
            key: "exportPdf",
            value: function(e, t) {
              var r;
              null === (r = this.frame) || void 0 === r || r.withMessage("exportPdf", t, e)
            }
          }, {
            key: "exportZip",
            value: function(e, t) {
              var r;
              null === (r = this.frame) || void 0 === r || r.withMessage("exportZip", t, e)
            }
          }, {
            key: "setAppearance",
            value: function(e) {
              var t;
              null === (t = this.frame) || void 0 === t || t.postMessage("setAppearance", {
                appearance: e
              })
            }
          }, {
            key: "setBodyValues",
            value: function(e, t) {
              var r;
              null === (r = this.frame) || void 0 === r || r.postMessage("setBodyValues", {
                bodyId: t,
                bodyValues: e
              })
            }
          }, {
            key: "setDesignTagsConfig",
            value: function(e) {
              var t;
              null === (t = this.frame) || void 0 === t || t.postMessage("setDesignTagsConfig", {
                designTagsConfig: e
              })
            }
          }, {
            key: "setMergeTagsConfig",
            value: function(e) {
              var t;
              null === (t = this.frame) || void 0 === t || t.postMessage("setMergeTagsConfig", {
                mergeTagsConfig: e
              })
            }
          }, {
            key: "showPreview",
            value: function(e) {
              var t;
              null === (t = this.frame) || void 0 === t || t.postMessage("showPreview", {
                device: e
              })
            }
          }, {
            key: "hidePreview",
            value: function() {
              var e;
              null === (e = this.frame) || void 0 === e || e.postMessage("hidePreview", {})
            }
          }, {
            key: "audit",
            value: function(e) {
              var t;
              null === (t = this.frame) || void 0 === t || t.withMessage("audit", {}, e)
            }
          }, {
            key: "setValidator",
            value: function(e) {
              var t;
              "function" == typeof e || null === e ? null === (t = this.frame) || void 0 === t || t.withMessage("setValidator", {
                validator: null === e ? null : e.toString()
              }) : console.error("Validator must be a function or null")
            }
          }, {
            key: "setToolValidator",
            value: function(e, t) {
              var r;
              e && "string" == typeof e ? "function" == typeof t || null === t ? null === (r = this.frame) || void 0 === r || r.withMessage("setToolValidator", {
                tool: e,
                validator: null === t ? null : t.toString()
              }) : console.error("Validator must be a function") : console.error("Tool name must be a string")
            }
          }, {
            key: "clearValidators",
            value: function() {
              var e;
              null === (e = this.frame) || void 0 === e || e.withMessage("clearValidators", {})
            }
          }, {
            key: "registerTool",
            value: function() {
              throw new Error(w("registerTool"))
            }
          }, {
            key: "registerPropertyEditor",
            value: function() {
              throw new Error(w("registerPropertyEditor"))
            }
          }, {
            key: "registerTab",
            value: function() {
              throw new Error(w("registerTab"))
            }
          }, {
            key: "createPanel",
            value: function() {
              throw new Error(w("createPanel"))
            }
          }, {
            key: "createViewer",
            value: function() {
              throw new Error(w("createViewer"))
            }
          }, {
            key: "createWidget",
            value: function() {
              throw new Error(w("createWidget"))
            }
          }]) && b(t.prototype, i), e
        }();

      function O(e) {
        return (O = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
          return typeof e
        } : function(e) {
          return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        })(e)
      }

      function M(e, t) {
        if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
      }

      function j(e, t) {
        for (var r = 0; r < t.length; r++) {
          var i = t[r];
          i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(e, i.key, i)
        }
      }

      function T(e, t) {
        return (T = Object.setPrototypeOf || function(e, t) {
          return e.__proto__ = t, e
        })(e, t)
      }

      function I(e, t) {
        return !t || "object" !== O(t) && "function" != typeof t ? function(e) {
          if (void 0 === e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
          return e
        }(e) : t
      }

      function P(e) {
        return (P = Object.setPrototypeOf ? Object.getPrototypeOf : function(e) {
          return e.__proto__ || Object.getPrototypeOf(e)
        })(e)
      }
      const x = new(function(e) {
        ! function(e, t) {
          if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function");
          e.prototype = Object.create(t && t.prototype, {
            constructor: {
              value: e,
              writable: !0,
              configurable: !0
            }
          }), t && T(e, t)
        }(a, e);
        var t, r, i, n, s = (i = a, n = function() {
          if ("undefined" == typeof Reflect || !Reflect.construct) return !1;
          if (Reflect.construct.sham) return !1;
          if ("function" == typeof Proxy) return !0;
          try {
            return Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], (function() {}))), !0
          } catch (e) {
            return !1
          }
        }(), function() {
          var e, t = P(i);
          if (n) {
            var r = P(this).constructor;
            e = Reflect.construct(t, arguments, r)
          } else e = t.apply(this, arguments);
          return I(this, e)
        });

        function a() {
          return M(this, a), s.apply(this, arguments)
        }
        return t = a, (r = [{
          key: "createEditor",
          value: function(e) {
            return new k(e)
          }
        }]) && j(t.prototype, r), a
      }(k))
    })(), unlayer = s.default
})();
