
/*! WOW - v1.0.1 - 2014-08-15
* Copyright (c) 2014 Matthieu Aussaguel; Licensed MIT */(function () { var a, b, c, d = function (a, b) { return function () { return a.apply(b, arguments) } }, e = [].indexOf || function (a) { for (var b = 0, c = this.length; c > b; b++) if (b in this && this[b] === a) return b; return -1 }; b = function () { function a() { } return a.prototype.extend = function (a, b) { var c, d; for (c in b) d = b[c], null == a[c] && (a[c] = d); return a }, a.prototype.isMobile = function (a) { return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(a) }, a }(), c = this.WeakMap || this.MozWeakMap || (c = function () { function a() { this.keys = [], this.values = [] } return a.prototype.get = function (a) { var b, c, d, e, f; for (f = this.keys, b = d = 0, e = f.length; e > d; b = ++d) if (c = f[b], c === a) return this.values[b] }, a.prototype.set = function (a, b) { var c, d, e, f, g; for (g = this.keys, c = e = 0, f = g.length; f > e; c = ++e) if (d = g[c], d === a) return void (this.values[c] = b); return this.keys.push(a), this.values.push(b) }, a }()), a = this.MutationObserver || this.WebkitMutationObserver || this.MozMutationObserver || (a = function () { function a() { console.warn("MutationObserver is not supported by your browser."), console.warn("WOW.js cannot detect dom mutations, please call .sync() after loading new content.") } return a.notSupported = !0, a.prototype.observe = function () { }, a }()), this.WOW = function () { function f(a) { null == a && (a = {}), this.scrollCallback = d(this.scrollCallback, this), this.scrollHandler = d(this.scrollHandler, this), this.start = d(this.start, this), this.scrolled = !0, this.config = this.util().extend(a, this.defaults), this.animationNameCache = new c } return f.prototype.defaults = { boxClass: "wow", animateClass: "animated", offset: 0, mobile: !0, live: !0 }, f.prototype.init = function () { var a; return this.element = window.document.documentElement, "interactive" === (a = document.readyState) || "complete" === a ? this.start() : document.addEventListener("DOMContentLoaded", this.start), this.finished = [] }, f.prototype.start = function () { var b, c, d, e; if (this.stopped = !1, this.boxes = function () { var a, c, d, e; for (d = this.element.querySelectorAll("." + this.config.boxClass), e = [], a = 0, c = d.length; c > a; a++) b = d[a], e.push(b); return e }.call(this), this.all = function () { var a, c, d, e; for (d = this.boxes, e = [], a = 0, c = d.length; c > a; a++) b = d[a], e.push(b); return e }.call(this), this.boxes.length) if (this.disabled()) this.resetStyle(); else { for (e = this.boxes, c = 0, d = e.length; d > c; c++) b = e[c], this.applyStyle(b, !0); window.addEventListener("scroll", this.scrollHandler, !1), window.addEventListener("resize", this.scrollHandler, !1), this.interval = setInterval(this.scrollCallback, 50) } return this.config.live ? new a(function (a) { return function (b) { var c, d, e, f, g; for (g = [], e = 0, f = b.length; f > e; e++) d = b[e], g.push(function () { var a, b, e, f; for (e = d.addedNodes || [], f = [], a = 0, b = e.length; b > a; a++) c = e[a], f.push(this.doSync(c)); return f }.call(a)); return g } }(this)).observe(document.body, { childList: !0, subtree: !0 }) : void 0 }, f.prototype.stop = function () { return this.stopped = !0, window.removeEventListener("scroll", this.scrollHandler, !1), window.removeEventListener("resize", this.scrollHandler, !1), null != this.interval ? clearInterval(this.interval) : void 0 }, f.prototype.sync = function () { return a.notSupported ? this.doSync(this.element) : void 0 }, f.prototype.doSync = function (a) { var b, c, d, f, g; if (!this.stopped) { if (null == a && (a = this.element), 1 !== a.nodeType) return; for (a = a.parentNode || a, f = a.querySelectorAll("." + this.config.boxClass), g = [], c = 0, d = f.length; d > c; c++) b = f[c], e.call(this.all, b) < 0 ? (this.applyStyle(b, !0), this.boxes.push(b), this.all.push(b), g.push(this.scrolled = !0)) : g.push(void 0); return g } }, f.prototype.show = function (a) { return this.applyStyle(a), a.className = "" + a.className + " " + this.config.animateClass }, f.prototype.applyStyle = function (a, b) { var c, d, e; return d = a.getAttribute("data-wow-duration"), c = a.getAttribute("data-wow-delay"), e = a.getAttribute("data-wow-iteration"), this.animate(function (f) { return function () { return f.customStyle(a, b, d, c, e) } }(this)) }, f.prototype.animate = function () { return "requestAnimationFrame" in window ? function (a) { return window.requestAnimationFrame(a) } : function (a) { return a() } }(), f.prototype.resetStyle = function () { var a, b, c, d, e; for (d = this.boxes, e = [], b = 0, c = d.length; c > b; b++) a = d[b], e.push(a.setAttribute("style", "visibility: visible;")); return e }, f.prototype.customStyle = function (a, b, c, d, e) { return b && this.cacheAnimationName(a), a.style.visibility = b ? "hidden" : "visible", c && this.vendorSet(a.style, { animationDuration: c }), d && this.vendorSet(a.style, { animationDelay: d }), e && this.vendorSet(a.style, { animationIterationCount: e }), this.vendorSet(a.style, { animationName: b ? "none" : this.cachedAnimationName(a) }), a }, f.prototype.vendors = ["moz", "webkit"], f.prototype.vendorSet = function (a, b) { var c, d, e, f; f = []; for (c in b) d = b[c], a["" + c] = d, f.push(function () { var b, f, g, h; for (g = this.vendors, h = [], b = 0, f = g.length; f > b; b++) e = g[b], h.push(a["" + e + c.charAt(0).toUpperCase() + c.substr(1)] = d); return h }.call(this)); return f }, f.prototype.vendorCSS = function (a, b) { var c, d, e, f, g, h; for (d = window.getComputedStyle(a), c = d.getPropertyCSSValue(b), h = this.vendors, f = 0, g = h.length; g > f; f++) e = h[f], c = c || d.getPropertyCSSValue("-" + e + "-" + b); return c }, f.prototype.animationName = function (a) { var b; try { b = this.vendorCSS(a, "animation-name").cssText } catch (c) { b = window.getComputedStyle(a).getPropertyValue("animation-name") } return "none" === b ? "" : b }, f.prototype.cacheAnimationName = function (a) { return this.animationNameCache.set(a, this.animationName(a)) }, f.prototype.cachedAnimationName = function (a) { return this.animationNameCache.get(a) }, f.prototype.scrollHandler = function () { return this.scrolled = !0 }, f.prototype.scrollCallback = function () { var a; return !this.scrolled || (this.scrolled = !1, this.boxes = function () { var b, c, d, e; for (d = this.boxes, e = [], b = 0, c = d.length; c > b; b++) a = d[b], a && (this.isVisible(a) ? this.show(a) : e.push(a)); return e }.call(this), this.boxes.length || this.config.live) ? void 0 : this.stop() }, f.prototype.offsetTop = function (a) { for (var b; void 0 === a.offsetTop;) a = a.parentNode; for (b = a.offsetTop; a = a.offsetParent;) b += a.offsetTop; return b }, f.prototype.isVisible = function (a) { var b, c, d, e, f; return c = a.getAttribute("data-wow-offset") || this.config.offset, f = window.pageYOffset, e = f + Math.min(this.element.clientHeight, innerHeight) - c, d = this.offsetTop(a), b = d + a.clientHeight, e >= d && b >= f }, f.prototype.util = function () { return null != this._util ? this._util : this._util = new b }, f.prototype.disabled = function () { return !this.config.mobile && this.util().isMobile(navigator.userAgent) }, f }() }).call(this);

/**!
 * MixItUp v2.1.8  
 *  http://creativecommons.org/licenses/by-nc/3.0/
 */
!function (a, b) { a.MixItUp = function () { var b = this; b._execAction("_constructor", 0), a.extend(b, { selectors: { target: ".mix", filter: ".filter", sort: ".sort" }, animation: { enable: !0, effects: "fade scale", duration: 600, easing: "ease", perspectiveDistance: "3000", perspectiveOrigin: "50% 50%", queue: !0, queueLimit: 1, animateChangeLayout: !1, animateResizeContainer: !0, animateResizeTargets: !1, staggerSequence: !1, reverseOut: !1 }, callbacks: { onMixLoad: !1, onMixStart: !1, onMixBusy: !1, onMixEnd: !1, onMixFail: !1, _user: !1 }, controls: { enable: !0, live: !1, toggleFilterButtons: !1, toggleLogic: "or", activeClass: "active" }, layout: { display: "inline-block", containerClass: "", containerClassFail: "fail" }, load: { filter: "all", sort: !1 }, _$body: null, _$container: null, _$targets: null, _$parent: null, _$sortButtons: null, _$filterButtons: null, _suckMode: !1, _mixing: !1, _sorting: !1, _clicking: !1, _loading: !0, _changingLayout: !1, _changingClass: !1, _changingDisplay: !1, _origOrder: [], _startOrder: [], _newOrder: [], _activeFilter: null, _toggleArray: [], _toggleString: "", _activeSort: "default:asc", _newSort: null, _startHeight: null, _newHeight: null, _incPadding: !0, _newDisplay: null, _newClass: null, _targetsBound: 0, _targetsDone: 0, _queue: [], _$show: a(), _$hide: a() }), b._execAction("_constructor", 1) }, a.MixItUp.prototype = { constructor: a.MixItUp, _instances: {}, _handled: { _filter: {}, _sort: {} }, _bound: { _filter: {}, _sort: {} }, _actions: {}, _filters: {}, extend: function (b) { for (var c in b) a.MixItUp.prototype[c] = b[c] }, addAction: function (b, c, d, e) { a.MixItUp.prototype._addHook("_actions", b, c, d, e) }, addFilter: function (b, c, d, e) { a.MixItUp.prototype._addHook("_filters", b, c, d, e) }, _addHook: function (b, c, d, e, f) { var g = a.MixItUp.prototype[b], h = {}; f = 1 === f || "post" === f ? "post" : "pre", h[c] = {}, h[c][f] = {}, h[c][f][d] = e, a.extend(!0, g, h) }, _init: function (b, c) { var d = this; if (d._execAction("_init", 0, arguments), c && a.extend(!0, d, c), d._$body = a("body"), d._domNode = b, d._$container = a(b), d._$container.addClass(d.layout.containerClass), d._id = b.id, d._platformDetect(), d._brake = d._getPrefixedCSS("transition", "none"), d._refresh(!0), d._$parent = d._$targets.parent().length ? d._$targets.parent() : d._$container, d.load.sort && (d._newSort = d._parseSort(d.load.sort), d._newSortString = d.load.sort, d._activeSort = d.load.sort, d._sort(), d._printSort()), d._activeFilter = "all" === d.load.filter ? d.selectors.target : "none" === d.load.filter ? "" : d.load.filter, d.controls.enable && d._bindHandlers(), d.controls.toggleFilterButtons) { d._buildToggleArray(); for (var e = 0; e < d._toggleArray.length; e++) d._updateControls({ filter: d._toggleArray[e], sort: d._activeSort }, !0) } else d.controls.enable && d._updateControls({ filter: d._activeFilter, sort: d._activeSort }); d._filter(), d._init = !0, d._$container.data("mixItUp", d), d._execAction("_init", 1, arguments), d._buildState(), d._$targets.css(d._brake), d._goMix(d.animation.enable) }, _platformDetect: function () { var a = this, c = ["Webkit", "Moz", "O", "ms"], d = ["webkit", "moz"], e = window.navigator.appVersion.match(/Chrome\/(\d+)\./) || !1, f = "undefined" != typeof InstallTrigger, g = function (a) { for (var b = 0; b < c.length; b++) if (c[b] + "Transition" in a.style) return { prefix: "-" + c[b].toLowerCase() + "-", vendor: c[b] }; return "transition" in a.style ? "" : !1 }, h = g(a._domNode); a._execAction("_platformDetect", 0), a._chrome = e ? parseInt(e[1], 10) : !1, a._ff = f ? parseInt(window.navigator.userAgent.match(/rv:([^)]+)\)/)[1]) : !1, a._prefix = h.prefix, a._vendor = h.vendor, a._suckMode = window.atob && a._prefix ? !1 : !0, a._suckMode && (a.animation.enable = !1), a._ff && a._ff <= 4 && (a.animation.enable = !1); for (var i = 0; i < d.length && !window.requestAnimationFrame; i++) window.requestAnimationFrame = window[d[i] + "RequestAnimationFrame"]; "function" != typeof Object.getPrototypeOf && ("object" == typeof "test".__proto__ ? Object.getPrototypeOf = function (a) { return a.__proto__ } : Object.getPrototypeOf = function (a) { return a.constructor.prototype }), a._domNode.nextElementSibling === b && Object.defineProperty(Element.prototype, "nextElementSibling", { get: function () { for (var a = this.nextSibling; a;) { if (1 === a.nodeType) return a; a = a.nextSibling } return null } }), a._execAction("_platformDetect", 1) }, _refresh: function (a, c) { var d = this; d._execAction("_refresh", 0, arguments), d._$targets = d._$container.find(d.selectors.target); for (var e = 0; e < d._$targets.length; e++) { var f = d._$targets[e]; if (f.dataset === b || c) { f.dataset = {}; for (var g = 0; g < f.attributes.length; g++) { var h = f.attributes[g], i = h.name, j = h.value; if (i.indexOf("data-") > -1) { var k = d._helpers._camelCase(i.substring(5, i.length)); f.dataset[k] = j } } } f.mixParent === b && (f.mixParent = d._id) } if (d._$targets.length && a || !d._origOrder.length && d._$targets.length) { d._origOrder = []; for (var e = 0; e < d._$targets.length; e++) { var f = d._$targets[e]; d._origOrder.push(f) } } d._execAction("_refresh", 1, arguments) }, _bindHandlers: function () { var c = this, d = a.MixItUp.prototype._bound._filter, e = a.MixItUp.prototype._bound._sort; c._execAction("_bindHandlers", 0), c.controls.live ? c._$body.on("click.mixItUp." + c._id, c.selectors.sort, function () { c._processClick(a(this), "sort") }).on("click.mixItUp." + c._id, c.selectors.filter, function () { c._processClick(a(this), "filter") }) : (c._$sortButtons = a(c.selectors.sort), c._$filterButtons = a(c.selectors.filter), c._$sortButtons.on("click.mixItUp." + c._id, function () { c._processClick(a(this), "sort") }), c._$filterButtons.on("click.mixItUp." + c._id, function () { c._processClick(a(this), "filter") })), d[c.selectors.filter] = d[c.selectors.filter] === b ? 1 : d[c.selectors.filter] + 1, e[c.selectors.sort] = e[c.selectors.sort] === b ? 1 : e[c.selectors.sort] + 1, c._execAction("_bindHandlers", 1) }, _processClick: function (c, d) { var e = this, f = function (c, d, f) { var g = a.MixItUp.prototype; g._handled["_" + d][e.selectors[d]] = g._handled["_" + d][e.selectors[d]] === b ? 1 : g._handled["_" + d][e.selectors[d]] + 1, g._handled["_" + d][e.selectors[d]] === g._bound["_" + d][e.selectors[d]] && (c[(f ? "remove" : "add") + "Class"](e.controls.activeClass), delete g._handled["_" + d][e.selectors[d]]) }; if (e._execAction("_processClick", 0, arguments), !e._mixing || e.animation.queue && e._queue.length < e.animation.queueLimit) { if (e._clicking = !0, "sort" === d) { var g = c.attr("data-sort"); (!c.hasClass(e.controls.activeClass) || g.indexOf("random") > -1) && (a(e.selectors.sort).removeClass(e.controls.activeClass), f(c, d), e.sort(g)) } if ("filter" === d) { var h, i = c.attr("data-filter"), j = "or" === e.controls.toggleLogic ? "," : ""; e.controls.toggleFilterButtons ? (e._buildToggleArray(), c.hasClass(e.controls.activeClass) ? (f(c, d, !0), h = e._toggleArray.indexOf(i), e._toggleArray.splice(h, 1)) : (f(c, d), e._toggleArray.push(i)), e._toggleArray = a.grep(e._toggleArray, function (a) { return a }), e._toggleString = e._toggleArray.join(j), e.filter(e._toggleString)) : c.hasClass(e.controls.activeClass) || (a(e.selectors.filter).removeClass(e.controls.activeClass), f(c, d), e.filter(i)) } e._execAction("_processClick", 1, arguments) } else "function" == typeof e.callbacks.onMixBusy && e.callbacks.onMixBusy.call(e._domNode, e._state, e), e._execAction("_processClickBusy", 1, arguments) }, _buildToggleArray: function () { var a = this, b = a._activeFilter.replace(/\s/g, ""); if (a._execAction("_buildToggleArray", 0, arguments), "or" === a.controls.toggleLogic) a._toggleArray = b.split(","); else { a._toggleArray = b.split("."), !a._toggleArray[0] && a._toggleArray.shift(); for (var c, d = 0; c = a._toggleArray[d]; d++) a._toggleArray[d] = "." + c } a._execAction("_buildToggleArray", 1, arguments) }, _updateControls: function (c, d) { var e = this, f = { filter: c.filter, sort: c.sort }, g = function (a, b) { try { d && "filter" === h && "none" !== f.filter && "" !== f.filter ? a.filter(b).addClass(e.controls.activeClass) : a.removeClass(e.controls.activeClass).filter(b).addClass(e.controls.activeClass) } catch (c) { } }, h = "filter", i = null; e._execAction("_updateControls", 0, arguments), c.filter === b && (f.filter = e._activeFilter), c.sort === b && (f.sort = e._activeSort), f.filter === e.selectors.target && (f.filter = "all"); for (var j = 0; 2 > j; j++) i = e.controls.live ? a(e.selectors[h]) : e["_$" + h + "Buttons"], i && g(i, "[data-" + h + '="' + f[h] + '"]'), h = "sort"; e._execAction("_updateControls", 1, arguments) }, _filter: function () { var b = this; b._execAction("_filter", 0); for (var c = 0; c < b._$targets.length; c++) { var d = a(b._$targets[c]); d.is(b._activeFilter) ? b._$show = b._$show.add(d) : b._$hide = b._$hide.add(d) } b._execAction("_filter", 1) }, _sort: function () { var a = this, b = function (a) { for (var b = a.slice(), c = b.length, d = c; d--;) { var e = parseInt(Math.random() * c), f = b[d]; b[d] = b[e], b[e] = f } return b }; a._execAction("_sort", 0), a._startOrder = []; for (var c = 0; c < a._$targets.length; c++) { var d = a._$targets[c]; a._startOrder.push(d) } switch (a._newSort[0].sortBy) { case "default": a._newOrder = a._origOrder; break; case "random": a._newOrder = b(a._startOrder); break; case "custom": a._newOrder = a._newSort[0].order; break; default: a._newOrder = a._startOrder.concat().sort(function (b, c) { return a._compare(b, c) }) } a._execAction("_sort", 1) }, _compare: function (a, b, c) { c = c ? c : 0; var d = this, e = d._newSort[c].order, f = function (a) { return a.dataset[d._newSort[c].sortBy] || 0 }, g = isNaN(1 * f(a)) ? f(a).toLowerCase() : 1 * f(a), h = isNaN(1 * f(b)) ? f(b).toLowerCase() : 1 * f(b); return h > g ? "asc" === e ? -1 : 1 : g > h ? "asc" === e ? 1 : -1 : g === h && d._newSort.length > c + 1 ? d._compare(a, b, c + 1) : 0 }, _printSort: function (a) { var b = this, c = a ? b._startOrder : b._newOrder, d = b._$parent[0].querySelectorAll(b.selectors.target), e = d.length ? d[d.length - 1].nextElementSibling : null, f = document.createDocumentFragment(); b._execAction("_printSort", 0, arguments); for (var g = 0; g < d.length; g++) { var h = d[g], i = h.nextSibling; "absolute" !== h.style.position && (i && "#text" === i.nodeName && b._$parent[0].removeChild(i), b._$parent[0].removeChild(h)) } for (var g = 0; g < c.length; g++) { var j = c[g]; if ("default" !== b._newSort[0].sortBy || "desc" !== b._newSort[0].order || a) f.appendChild(j), f.appendChild(document.createTextNode(" ")); else { var k = f.firstChild; f.insertBefore(j, k), f.insertBefore(document.createTextNode(" "), j) } } e ? b._$parent[0].insertBefore(f, e) : b._$parent[0].appendChild(f), b._execAction("_printSort", 1, arguments) }, _parseSort: function (a) { for (var b = this, c = "string" == typeof a ? a.split(" ") : [a], d = [], e = 0; e < c.length; e++) { var f = "string" == typeof a ? c[e].split(":") : ["custom", c[e]], g = { sortBy: b._helpers._camelCase(f[0]), order: f[1] || "asc" }; if (d.push(g), "default" === g.sortBy || "random" === g.sortBy) break } return b._execFilter("_parseSort", d, arguments) }, _parseEffects: function () { var a = this, b = { opacity: "", transformIn: "", transformOut: "", filter: "" }, c = function (b, c, d) { if (a.animation.effects.indexOf(b) > -1) { if (c) { var e = a.animation.effects.indexOf(b + "("); if (e > -1) { var f = a.animation.effects.substring(e), g = /\(([^)]+)\)/.exec(f), h = g[1]; return { val: h } } } return !0 } return !1 }, d = function (a, b) { return b ? "-" === a.charAt(0) ? a.substr(1, a.length) : "-" + a : a }, e = function (a, e) { for (var f = [["scale", ".01"], ["translateX", "20px"], ["translateY", "20px"], ["translateZ", "20px"], ["rotateX", "90deg"], ["rotateY", "90deg"], ["rotateZ", "180deg"]], g = 0; g < f.length; g++) { var h = f[g][0], i = f[g][1], j = e && "scale" !== h; b[a] += c(h) ? h + "(" + d(c(h, !0).val || i, j) + ") " : "" } }; return b.opacity = c("fade") ? c("fade", !0).val || "0" : "1", e("transformIn"), a.animation.reverseOut ? e("transformOut", !0) : b.transformOut = b.transformIn, b.transition = {}, b.transition = a._getPrefixedCSS("transition", "all " + a.animation.duration + "ms " + a.animation.easing + ", opacity " + a.animation.duration + "ms linear"), a.animation.stagger = c("stagger") ? !0 : !1, a.animation.staggerDuration = parseInt(c("stagger") && c("stagger", !0).val ? c("stagger", !0).val : 100), a._execFilter("_parseEffects", b) }, _buildState: function (a) { var b = this, c = {}; return b._execAction("_buildState", 0), c = { activeFilter: "" === b._activeFilter ? "none" : b._activeFilter, activeSort: a && b._newSortString ? b._newSortString : b._activeSort, fail: !b._$show.length && "" !== b._activeFilter, $targets: b._$targets, $show: b._$show, $hide: b._$hide, totalTargets: b._$targets.length, totalShow: b._$show.length, totalHide: b._$hide.length, display: a && b._newDisplay ? b._newDisplay : b.layout.display }, a ? b._execFilter("_buildState", c) : (b._state = c, void b._execAction("_buildState", 1)) }, _goMix: function (a) { var b = this, c = function () { b._chrome && 31 === b._chrome && f(b._$parent[0]), b._setInter(), d() }, d = function () { var a = window.pageYOffset, c = window.pageXOffset; document.documentElement.scrollHeight; b._getInterMixData(), b._setFinal(), b._getFinalMixData(), window.pageYOffset !== a && window.scrollTo(c, a), b._prepTargets(), window.requestAnimationFrame ? requestAnimationFrame(e) : setTimeout(function () { e() }, 20) }, e = function () { b._animateTargets(), 0 === b._targetsBound && b._cleanUp() }, f = function (a) { var b = a.parentElement, c = document.createElement("div"), d = document.createDocumentFragment(); b.insertBefore(c, a), d.appendChild(a), b.replaceChild(a, c) }, g = b._buildState(!0); b._execAction("_goMix", 0, arguments), !b.animation.duration && (a = !1), b._mixing = !0, b._$container.removeClass(b.layout.containerClassFail), "function" == typeof b.callbacks.onMixStart && b.callbacks.onMixStart.call(b._domNode, b._state, g, b), b._$container.trigger("mixStart", [b._state, g, b]), b._getOrigMixData(), a && !b._suckMode ? window.requestAnimationFrame ? requestAnimationFrame(c) : c() : b._cleanUp(), b._execAction("_goMix", 1, arguments) }, _getTargetData: function (a, b) { var c, d = this; a.dataset[b + "PosX"] = a.offsetLeft, a.dataset[b + "PosY"] = a.offsetTop, d.animation.animateResizeTargets && (c = d._suckMode ? { marginBottom: "", marginRight: "" } : window.getComputedStyle(a), a.dataset[b + "MarginBottom"] = parseInt(c.marginBottom), a.dataset[b + "MarginRight"] = parseInt(c.marginRight), a.dataset[b + "Width"] = a.offsetWidth, a.dataset[b + "Height"] = a.offsetHeight) }, _getOrigMixData: function () { var a = this, b = a._suckMode ? { boxSizing: "" } : window.getComputedStyle(a._$parent[0]), c = b.boxSizing || b[a._vendor + "BoxSizing"]; a._incPadding = "border-box" === c, a._execAction("_getOrigMixData", 0), !a._suckMode && (a.effects = a._parseEffects()), a._$toHide = a._$hide.filter(":visible"), a._$toShow = a._$show.filter(":hidden"), a._$pre = a._$targets.filter(":visible"), a._startHeight = a._incPadding ? a._$parent.outerHeight() : a._$parent.height(); for (var d = 0; d < a._$pre.length; d++) { var e = a._$pre[d]; a._getTargetData(e, "orig") } a._execAction("_getOrigMixData", 1) }, _setInter: function () { var a = this; a._execAction("_setInter", 0), a._changingLayout && a.animation.animateChangeLayout ? (a._$toShow.css("display", a._newDisplay), a._changingClass && a._$container.removeClass(a.layout.containerClass).addClass(a._newClass)) : a._$toShow.css("display", a.layout.display), a._execAction("_setInter", 1) }, _getInterMixData: function () { var a = this; a._execAction("_getInterMixData", 0); for (var b = 0; b < a._$toShow.length; b++) { var c = a._$toShow[b]; a._getTargetData(c, "inter") } for (var b = 0; b < a._$pre.length; b++) { var c = a._$pre[b]; a._getTargetData(c, "inter") } a._execAction("_getInterMixData", 1) }, _setFinal: function () { var a = this; a._execAction("_setFinal", 0), a._sorting && a._printSort(), a._$toHide.removeStyle("display"), a._changingLayout && a.animation.animateChangeLayout && a._$pre.css("display", a._newDisplay), a._execAction("_setFinal", 1) }, _getFinalMixData: function () { var a = this; a._execAction("_getFinalMixData", 0); for (var b = 0; b < a._$toShow.length; b++) { var c = a._$toShow[b]; a._getTargetData(c, "final") } for (var b = 0; b < a._$pre.length; b++) { var c = a._$pre[b]; a._getTargetData(c, "final") } a._newHeight = a._incPadding ? a._$parent.outerHeight() : a._$parent.height(), a._sorting && a._printSort(!0), a._$toShow.removeStyle("display"), a._$pre.css("display", a.layout.display), a._changingClass && a.animation.animateChangeLayout && a._$container.removeClass(a._newClass).addClass(a.layout.containerClass), a._execAction("_getFinalMixData", 1) }, _prepTargets: function () { var b = this, c = { _in: b._getPrefixedCSS("transform", b.effects.transformIn), _out: b._getPrefixedCSS("transform", b.effects.transformOut) }; b._execAction("_prepTargets", 0), b.animation.animateResizeContainer && b._$parent.css("height", b._startHeight + "px"); for (var d = 0; d < b._$toShow.length; d++) { var e = b._$toShow[d], f = a(e); e.style.opacity = b.effects.opacity, e.style.display = b._changingLayout && b.animation.animateChangeLayout ? b._newDisplay : b.layout.display, f.css(c._in), b.animation.animateResizeTargets && (e.style.width = e.dataset.finalWidth + "px", e.style.height = e.dataset.finalHeight + "px", e.style.marginRight = -(e.dataset.finalWidth - e.dataset.interWidth) + 1 * e.dataset.finalMarginRight + "px", e.style.marginBottom = -(e.dataset.finalHeight - e.dataset.interHeight) + 1 * e.dataset.finalMarginBottom + "px") } for (var d = 0; d < b._$pre.length; d++) { var e = b._$pre[d], f = a(e), g = { x: e.dataset.origPosX - e.dataset.interPosX, y: e.dataset.origPosY - e.dataset.interPosY }, c = b._getPrefixedCSS("transform", "translate(" + g.x + "px," + g.y + "px)"); f.css(c), b.animation.animateResizeTargets && (e.style.width = e.dataset.origWidth + "px", e.style.height = e.dataset.origHeight + "px", e.dataset.origWidth - e.dataset.finalWidth && (e.style.marginRight = -(e.dataset.origWidth - e.dataset.interWidth) + 1 * e.dataset.origMarginRight + "px"), e.dataset.origHeight - e.dataset.finalHeight && (e.style.marginBottom = -(e.dataset.origHeight - e.dataset.interHeight) + 1 * e.dataset.origMarginBottom + "px")) } b._execAction("_prepTargets", 1) }, _animateTargets: function () { var b = this; b._execAction("_animateTargets", 0), b._targetsDone = 0, b._targetsBound = 0, b._$parent.css(b._getPrefixedCSS("perspective", b.animation.perspectiveDistance + "px")).css(b._getPrefixedCSS("perspective-origin", b.animation.perspectiveOrigin)), b.animation.animateResizeContainer && b._$parent.css(b._getPrefixedCSS("transition", "height " + b.animation.duration + "ms ease")).css("height", b._newHeight + "px"); for (var c = 0; c < b._$toShow.length; c++) { var d = b._$toShow[c], e = a(d), f = { x: d.dataset.finalPosX - d.dataset.interPosX, y: d.dataset.finalPosY - d.dataset.interPosY }, g = b._getDelay(c), h = {}; d.style.opacity = ""; for (var i = 0; 2 > i; i++) { var j = 0 === i ? j = b._prefix : ""; b._ff && b._ff <= 20 && (h[j + "transition-property"] = "all", h[j + "transition-timing-function"] = b.animation.easing + "ms", h[j + "transition-duration"] = b.animation.duration + "ms"), h[j + "transition-delay"] = g + "ms", h[j + "transform"] = "translate(" + f.x + "px," + f.y + "px)" } (b.effects.transform || b.effects.opacity) && b._bindTargetDone(e), b._ff && b._ff <= 20 ? e.css(h) : e.css(b.effects.transition).css(h) } for (var c = 0; c < b._$pre.length; c++) { var d = b._$pre[c], e = a(d), f = { x: d.dataset.finalPosX - d.dataset.interPosX, y: d.dataset.finalPosY - d.dataset.interPosY }, g = b._getDelay(c); (d.dataset.finalPosX !== d.dataset.origPosX || d.dataset.finalPosY !== d.dataset.origPosY) && b._bindTargetDone(e), e.css(b._getPrefixedCSS("transition", "all " + b.animation.duration + "ms " + b.animation.easing + " " + g + "ms")), e.css(b._getPrefixedCSS("transform", "translate(" + f.x + "px," + f.y + "px)")), b.animation.animateResizeTargets && (d.dataset.origWidth - d.dataset.finalWidth && 1 * d.dataset.finalWidth && (d.style.width = d.dataset.finalWidth + "px", d.style.marginRight = -(d.dataset.finalWidth - d.dataset.interWidth) + 1 * d.dataset.finalMarginRight + "px"), d.dataset.origHeight - d.dataset.finalHeight && 1 * d.dataset.finalHeight && (d.style.height = d.dataset.finalHeight + "px", d.style.marginBottom = -(d.dataset.finalHeight - d.dataset.interHeight) + 1 * d.dataset.finalMarginBottom + "px")) } b._changingClass && b._$container.removeClass(b.layout.containerClass).addClass(b._newClass); for (var c = 0; c < b._$toHide.length; c++) { for (var d = b._$toHide[c], e = a(d), g = b._getDelay(c), k = {}, i = 0; 2 > i; i++) { var j = 0 === i ? j = b._prefix : ""; k[j + "transition-delay"] = g + "ms", k[j + "transform"] = b.effects.transformOut, k.opacity = b.effects.opacity } e.css(b.effects.transition).css(k), (b.effects.transform || b.effects.opacity) && b._bindTargetDone(e) } b._execAction("_animateTargets", 1) }, _bindTargetDone: function (b) { var c = this, d = b[0]; c._execAction("_bindTargetDone", 0, arguments), d.dataset.bound || (d.dataset.bound = !0, c._targetsBound++, b.on("webkitTransitionEnd.mixItUp transitionend.mixItUp", function (e) { (e.originalEvent.propertyName.indexOf("transform") > -1 || e.originalEvent.propertyName.indexOf("opacity") > -1) && a(e.originalEvent.target).is(c.selectors.target) && (b.off(".mixItUp"), delete d.dataset.bound, c._targetDone()) })), c._execAction("_bindTargetDone", 1, arguments) }, _targetDone: function () { var a = this; a._execAction("_targetDone", 0), a._targetsDone++, a._targetsDone === a._targetsBound && a._cleanUp(), a._execAction("_targetDone", 1) }, _cleanUp: function () { var b = this, c = b.animation.animateResizeTargets ? "transform opacity width height margin-bottom margin-right" : "transform opacity"; unBrake = function () { b._$targets.removeStyle("transition", b._prefix) }, b._execAction("_cleanUp", 0), b._changingLayout ? b._$show.css("display", b._newDisplay) : b._$show.css("display", b.layout.display), b._$targets.css(b._brake), b._$targets.removeStyle(c, b._prefix).removeAttr("data-inter-pos-x data-inter-pos-y data-final-pos-x data-final-pos-y data-orig-pos-x data-orig-pos-y data-orig-height data-orig-width data-final-height data-final-width data-inter-width data-inter-height data-orig-margin-right data-orig-margin-bottom data-inter-margin-right data-inter-margin-bottom data-final-margin-right data-final-margin-bottom"), b._$hide.removeStyle("display"), b._$parent.removeStyle("height transition perspective-distance perspective perspective-origin-x perspective-origin-y perspective-origin perspectiveOrigin", b._prefix), b._sorting && (b._printSort(), b._activeSort = b._newSortString, b._sorting = !1), b._changingLayout && (b._changingDisplay && (b.layout.display = b._newDisplay, b._changingDisplay = !1), b._changingClass && (b._$parent.removeClass(b.layout.containerClass).addClass(b._newClass), b.layout.containerClass = b._newClass, b._changingClass = !1), b._changingLayout = !1), b._refresh(), b._buildState(), b._state.fail && b._$container.addClass(b.layout.containerClassFail), b._$show = a(), b._$hide = a(), window.requestAnimationFrame && requestAnimationFrame(unBrake), b._mixing = !1, "function" == typeof b.callbacks._user && b.callbacks._user.call(b._domNode, b._state, b), "function" == typeof b.callbacks.onMixEnd && b.callbacks.onMixEnd.call(b._domNode, b._state, b), b._$container.trigger("mixEnd", [b._state, b]), b._state.fail && ("function" == typeof b.callbacks.onMixFail && b.callbacks.onMixFail.call(b._domNode, b._state, b), b._$container.trigger("mixFail", [b._state, b])), b._loading && ("function" == typeof b.callbacks.onMixLoad && b.callbacks.onMixLoad.call(b._domNode, b._state, b), b._$container.trigger("mixLoad", [b._state, b])), b._queue.length && (b._execAction("_queue", 0), b.multiMix(b._queue[0][0], b._queue[0][1], b._queue[0][2]), b._queue.splice(0, 1)), b._execAction("_cleanUp", 1), b._loading = !1 }, _getPrefixedCSS: function (a, b, c) { var d = this, e = {}; for (i = 0; i < 2; i++) { var f = 0 === i ? d._prefix : ""; c ? e[f + a] = f + b : e[f + a] = b } return d._execFilter("_getPrefixedCSS", e, arguments) }, _getDelay: function (a) { var b = this, c = "function" == typeof b.animation.staggerSequence ? b.animation.staggerSequence.call(b._domNode, a, b._state) : a, d = b.animation.stagger ? c * b.animation.staggerDuration : 0; return b._execFilter("_getDelay", d, arguments) }, _parseMultiMixArgs: function (a) { for (var b = this, c = { command: null, animate: b.animation.enable, callback: null }, d = 0; d < a.length; d++) { var e = a[d]; null !== e && ("object" == typeof e || "string" == typeof e ? c.command = e : "boolean" == typeof e ? c.animate = e : "function" == typeof e && (c.callback = e)) } return b._execFilter("_parseMultiMixArgs", c, arguments) }, _parseInsertArgs: function (b) { for (var c = this, d = { index: 0, $object: a(), multiMix: { filter: c._state.activeFilter }, callback: null }, e = 0; e < b.length; e++) { var f = b[e]; "number" == typeof f ? d.index = f : "object" == typeof f && f instanceof a ? d.$object = f : "object" == typeof f && c._helpers._isElement(f) ? d.$object = a(f) : "object" == typeof f && null !== f ? d.multiMix = f : "boolean" != typeof f || f ? "function" == typeof f && (d.callback = f) : d.multiMix = !1 } return c._execFilter("_parseInsertArgs", d, arguments) }, _execAction: function (a, b, c) { var d = this, e = b ? "post" : "pre"; if (!d._actions.isEmptyObject && d._actions.hasOwnProperty(a)) for (var f in d._actions[a][e]) d._actions[a][e][f].call(d, c) }, _execFilter: function (a, b, c) { var d = this; if (d._filters.isEmptyObject || !d._filters.hasOwnProperty(a)) return b; for (var e in d._filters[a]) return d._filters[a][e].call(d, c) }, _helpers: { _camelCase: function (a) { return a.replace(/-([a-z])/g, function (a) { return a[1].toUpperCase() }) }, _isElement: function (a) { return window.HTMLElement ? a instanceof HTMLElement : null !== a && 1 === a.nodeType && "string" === a.nodeName } }, isMixing: function () { var a = this; return a._execFilter("isMixing", a._mixing) }, filter: function () { var a = this, b = a._parseMultiMixArgs(arguments); a._clicking && (a._toggleString = ""), a.multiMix({ filter: b.command }, b.animate, b.callback) }, sort: function () { var a = this, b = a._parseMultiMixArgs(arguments); a.multiMix({ sort: b.command }, b.animate, b.callback) }, changeLayout: function () { var a = this, b = a._parseMultiMixArgs(arguments); a.multiMix({ changeLayout: b.command }, b.animate, b.callback) }, multiMix: function () { var a = this, c = a._parseMultiMixArgs(arguments); if (a._execAction("multiMix", 0, arguments), a._mixing) a.animation.queue && a._queue.length < a.animation.queueLimit ? (a._queue.push(arguments), a.controls.enable && !a._clicking && a._updateControls(c.command), a._execAction("multiMixQueue", 1, arguments)) : ("function" == typeof a.callbacks.onMixBusy && a.callbacks.onMixBusy.call(a._domNode, a._state, a), a._$container.trigger("mixBusy", [a._state, a]), a._execAction("multiMixBusy", 1, arguments)); else { a.controls.enable && !a._clicking && (a.controls.toggleFilterButtons && a._buildToggleArray(), a._updateControls(c.command, a.controls.toggleFilterButtons)), a._queue.length < 2 && (a._clicking = !1), delete a.callbacks._user, c.callback && (a.callbacks._user = c.callback); var d = c.command.sort, e = c.command.filter, f = c.command.changeLayout; a._refresh(), d && (a._newSort = a._parseSort(d), a._newSortString = d, a._sorting = !0, a._sort()), e !== b && (e = "all" === e ? a.selectors.target : e, a._activeFilter = e), a._filter(), f && (a._newDisplay = "string" == typeof f ? f : f.display || a.layout.display, a._newClass = f.containerClass || "", (a._newDisplay !== a.layout.display || a._newClass !== a.layout.containerClass) && (a._changingLayout = !0, a._changingClass = a._newClass !== a.layout.containerClass, a._changingDisplay = a._newDisplay !== a.layout.display)), a._$targets.css(a._brake), a._goMix(c.animate ^ a.animation.enable ? c.animate : a.animation.enable), a._execAction("multiMix", 1, arguments) } }, insert: function () { var a = this, b = a._parseInsertArgs(arguments), c = "function" == typeof b.callback ? b.callback : null, d = document.createDocumentFragment(), e = function () { return a._refresh(), a._$targets.length ? b.index < a._$targets.length || !a._$targets.length ? a._$targets[b.index] : a._$targets[a._$targets.length - 1].nextElementSibling : a._$parent[0].children[0] }(); if (a._execAction("insert", 0, arguments), b.$object) { for (var f = 0; f < b.$object.length; f++) { var g = b.$object[f]; d.appendChild(g), d.appendChild(document.createTextNode(" ")) } a._$parent[0].insertBefore(d, e) } a._execAction("insert", 1, arguments), "object" == typeof b.multiMix && a.multiMix(b.multiMix, c) }, prepend: function () { var a = this, b = a._parseInsertArgs(arguments); a.insert(0, b.$object, b.multiMix, b.callback) }, append: function () { var a = this, b = a._parseInsertArgs(arguments); a.insert(a._state.totalTargets, b.$object, b.multiMix, b.callback) }, getOption: function (a) { var c = this, d = function (a, c) { for (var d = c.split("."), e = d.pop(), f = d.length, g = 1, h = d[0] || c; (a = a[h]) && f > g;) h = d[g], g++; return a !== b ? a[e] !== b ? a[e] : a : void 0 }; return a ? c._execFilter("getOption", d(c, a), arguments) : c }, setOptions: function (b) { var c = this; c._execAction("setOptions", 0, arguments), "object" == typeof b && a.extend(!0, c, b), c._execAction("setOptions", 1, arguments) }, getState: function () { var a = this; return a._execFilter("getState", a._state, a) }, forceRefresh: function () { var a = this; a._refresh(!1, !0) }, destroy: function (b) { var c = this, d = a.MixItUp.prototype._bound._filter, e = a.MixItUp.prototype._bound._sort; c._execAction("destroy", 0, arguments), c._$body.add(a(c.selectors.sort)).add(a(c.selectors.filter)).off(".mixItUp"); for (var f = 0; f < c._$targets.length; f++) { var g = c._$targets[f]; b && (g.style.display = ""), delete g.mixParent } c._execAction("destroy", 1, arguments), d[c.selectors.filter] && d[c.selectors.filter] > 1 ? d[c.selectors.filter]-- : 1 === d[c.selectors.filter] && delete d[c.selectors.filter], e[c.selectors.sort] && e[c.selectors.sort] > 1 ? e[c.selectors.sort]-- : 1 === e[c.selectors.sort] && delete e[c.selectors.sort], delete a.MixItUp.prototype._instances[c._id] } }, a.fn.mixItUp = function () { var c, d = arguments, e = [], f = function (b, c) { var d = new a.MixItUp, e = function () { return ("00000" + (16777216 * Math.random() << 0).toString(16)).substr(-6).toUpperCase() }; d._execAction("_instantiate", 0, arguments), b.id = b.id ? b.id : "MixItUp" + e(), d._instances[b.id] || (d._instances[b.id] = d, d._init(b, c)), d._execAction("_instantiate", 1, arguments) }; return c = this.each(function () { if (d && "string" == typeof d[0]) { var c = a.MixItUp.prototype._instances[this.id]; if ("isLoaded" === d[0]) e.push(c ? !0 : !1); else { var g = c[d[0]](d[1], d[2], d[3]); g !== b && e.push(g) } } else f(this, d[0]) }), e.length ? e.length > 1 ? e : e[0] : c }, a.fn.removeStyle = function (c, d) { return d = d ? d : "", this.each(function () { for (var e = this, f = c.split(" "), g = 0; g < f.length; g++) for (var h = 0; 4 > h; h++) { switch (h) { case 0: var i = f[g]; break; case 1: var i = a.MixItUp.prototype._helpers._camelCase(i); break; case 2: var i = d + f[g]; break; case 3: var i = a.MixItUp.prototype._helpers._camelCase(d + f[g]) } if (e.style[i] !== b && "unknown" != typeof e.style[i] && e.style[i].length > 0 && (e.style[i] = ""), !d && 1 === h) break } e.attributes && e.attributes.style && e.attributes.style !== b && "" === e.attributes.style.value && e.attributes.removeNamedItem("style") }) } }(jQuery);


/*! jQuery Validation Plugin - v1.11.0 - 2/4/2013
* https://github.com/jzaefferer/jquery-validation
* Copyright (c) 2013 JÃ¶rn Zaefferer; Licensed MIT */
(function (e) { e.extend(e.fn, { validate: function (t) { if (!this.length) { t && t.debug && window.console && console.warn("Nothing selected, can't validate, returning nothing."); return } var n = e.data(this[0], "validator"); return n ? n : (this.attr("novalidate", "novalidate"), n = new e.validator(t, this[0]), e.data(this[0], "validator", n), n.settings.onsubmit && (this.validateDelegate(":submit", "click", function (t) { n.settings.submitHandler && (n.submitButton = t.target), e(t.target).hasClass("cancel") && (n.cancelSubmit = !0) }), this.submit(function (t) { function r() { var r; return n.settings.submitHandler ? (n.submitButton && (r = e("<input type='hidden'/>").attr("name", n.submitButton.name).val(n.submitButton.value).appendTo(n.currentForm)), n.settings.submitHandler.call(n, n.currentForm, t), n.submitButton && r.remove(), !1) : !0 } return n.settings.debug && t.preventDefault(), n.cancelSubmit ? (n.cancelSubmit = !1, r()) : n.form() ? n.pendingRequest ? (n.formSubmitted = !0, !1) : r() : (n.focusInvalid(), !1) })), n) }, valid: function () { if (e(this[0]).is("form")) return this.validate().form(); var t = !0, n = e(this[0].form).validate(); return this.each(function () { t &= n.element(this) }), t }, removeAttrs: function (t) { var n = {}, r = this; return e.each(t.split(/\s/), function (e, t) { n[t] = r.attr(t), r.removeAttr(t) }), n }, rules: function (t, n) { var r = this[0]; if (t) { var i = e.data(r.form, "validator").settings, s = i.rules, o = e.validator.staticRules(r); switch (t) { case "add": e.extend(o, e.validator.normalizeRule(n)), s[r.name] = o, n.messages && (i.messages[r.name] = e.extend(i.messages[r.name], n.messages)); break; case "remove": if (!n) return delete s[r.name], o; var u = {}; return e.each(n.split(/\s/), function (e, t) { u[t] = o[t], delete o[t] }), u } } var a = e.validator.normalizeRules(e.extend({}, e.validator.classRules(r), e.validator.attributeRules(r), e.validator.dataRules(r), e.validator.staticRules(r)), r); if (a.required) { var f = a.required; delete a.required, a = e.extend({ required: f }, a) } return a } }), e.extend(e.expr[":"], { blank: function (t) { return !e.trim("" + t.value) }, filled: function (t) { return !!e.trim("" + t.value) }, unchecked: function (e) { return !e.checked } }), e.validator = function (t, n) { this.settings = e.extend(!0, {}, e.validator.defaults, t), this.currentForm = n, this.init() }, e.validator.format = function (t, n) { return arguments.length === 1 ? function () { var n = e.makeArray(arguments); return n.unshift(t), e.validator.format.apply(this, n) } : (arguments.length > 2 && n.constructor !== Array && (n = e.makeArray(arguments).slice(1)), n.constructor !== Array && (n = [n]), e.each(n, function (e, n) { t = t.replace(new RegExp("\\{" + e + "\\}", "g"), function () { return n }) }), t) }, e.extend(e.validator, { defaults: { messages: {}, groups: {}, rules: {}, errorClass: "error", validClass: "valid", errorElement: "label", focusInvalid: !0, errorContainer: e([]), errorLabelContainer: e([]), onsubmit: !0, ignore: ":hidden", ignoreTitle: !1, onfocusin: function (e, t) { this.lastActive = e, this.settings.focusCleanup && !this.blockFocusCleanup && (this.settings.unhighlight && this.settings.unhighlight.call(this, e, this.settings.errorClass, this.settings.validClass), this.addWrapper(this.errorsFor(e)).hide()) }, onfocusout: function (e, t) { !this.checkable(e) && (e.name in this.submitted || !this.optional(e)) && this.element(e) }, onkeyup: function (e, t) { if (t.which === 9 && this.elementValue(e) === "") return; (e.name in this.submitted || e === this.lastElement) && this.element(e) }, onclick: function (e, t) { e.name in this.submitted ? this.element(e) : e.parentNode.name in this.submitted && this.element(e.parentNode) }, highlight: function (t, n, r) { t.type === "radio" ? this.findByName(t.name).addClass(n).removeClass(r) : e(t).addClass(n).removeClass(r) }, unhighlight: function (t, n, r) { t.type === "radio" ? this.findByName(t.name).removeClass(n).addClass(r) : e(t).removeClass(n).addClass(r) } }, setDefaults: function (t) { e.extend(e.validator.defaults, t) }, messages: { required: "This field is required.", remote: "Please fix this field.", email: "Please enter a valid email address.", url: "Please enter a valid URL.", date: "Please enter a valid date.", dateISO: "Please enter a valid date (ISO).", number: "Please enter a valid number.", digits: "Please enter only digits.", creditcard: "Please enter a valid credit card number.", equalTo: "Please enter the same value again.", maxlength: e.validator.format("Please enter no more than {0} characters."), minlength: e.validator.format("Please enter at least {0} characters."), rangelength: e.validator.format("Please enter a value between {0} and {1} characters long."), range: e.validator.format("Please enter a value between {0} and {1}."), max: e.validator.format("Please enter a value less than or equal to {0}."), min: e.validator.format("Please enter a value greater than or equal to {0}.") }, autoCreateRanges: !1, prototype: { init: function () { function r(t) { var n = e.data(this[0].form, "validator"), r = "on" + t.type.replace(/^validate/, ""); n.settings[r] && n.settings[r].call(n, this[0], t) } this.labelContainer = e(this.settings.errorLabelContainer), this.errorContext = this.labelContainer.length && this.labelContainer || e(this.currentForm), this.containers = e(this.settings.errorContainer).add(this.settings.errorLabelContainer), this.submitted = {}, this.valueCache = {}, this.pendingRequest = 0, this.pending = {}, this.invalid = {}, this.reset(); var t = this.groups = {}; e.each(this.settings.groups, function (n, r) { typeof r == "string" && (r = r.split(/\s/)), e.each(r, function (e, r) { t[r] = n }) }); var n = this.settings.rules; e.each(n, function (t, r) { n[t] = e.validator.normalizeRule(r) }), e(this.currentForm).validateDelegate(":text, [type='password'], [type='file'], select, textarea, [type='number'], [type='search'] ,[type='tel'], [type='url'], [type='email'], [type='datetime'], [type='date'], [type='month'], [type='week'], [type='time'], [type='datetime-local'], [type='range'], [type='color'] ", "focusin focusout keyup", r).validateDelegate("[type='radio'], [type='checkbox'], select, option", "click", r), this.settings.invalidHandler && e(this.currentForm).bind("invalid-form.validate", this.settings.invalidHandler) }, form: function () { return this.checkForm(), e.extend(this.submitted, this.errorMap), this.invalid = e.extend({}, this.errorMap), this.valid() || e(this.currentForm).triggerHandler("invalid-form", [this]), this.showErrors(), this.valid() }, checkForm: function () { this.prepareForm(); for (var e = 0, t = this.currentElements = this.elements() ; t[e]; e++) this.check(t[e]); return this.valid() }, element: function (t) { t = this.validationTargetFor(this.clean(t)), this.lastElement = t, this.prepareElement(t), this.currentElements = e(t); var n = this.check(t) !== !1; return n ? delete this.invalid[t.name] : this.invalid[t.name] = !0, this.numberOfInvalids() || (this.toHide = this.toHide.add(this.containers)), this.showErrors(), n }, showErrors: function (t) { if (t) { e.extend(this.errorMap, t), this.errorList = []; for (var n in t) this.errorList.push({ message: t[n], element: this.findByName(n)[0] }); this.successList = e.grep(this.successList, function (e) { return !(e.name in t) }) } this.settings.showErrors ? this.settings.showErrors.call(this, this.errorMap, this.errorList) : this.defaultShowErrors() }, resetForm: function () { e.fn.resetForm && e(this.currentForm).resetForm(), this.submitted = {}, this.lastElement = null, this.prepareForm(), this.hideErrors(), this.elements().removeClass(this.settings.errorClass).removeData("previousValue") }, numberOfInvalids: function () { return this.objectLength(this.invalid) }, objectLength: function (e) { var t = 0; for (var n in e) t++; return t }, hideErrors: function () { this.addWrapper(this.toHide).hide() }, valid: function () { return this.size() === 0 }, size: function () { return this.errorList.length }, focusInvalid: function () { if (this.settings.focusInvalid) try { e(this.findLastActive() || this.errorList.length && this.errorList[0].element || []).filter(":visible").focus().trigger("focusin") } catch (t) { } }, findLastActive: function () { var t = this.lastActive; return t && e.grep(this.errorList, function (e) { return e.element.name === t.name }).length === 1 && t }, elements: function () { var t = this, n = {}; return e(this.currentForm).find("input, select, textarea").not(":submit, :reset, :image, [disabled]").not(this.settings.ignore).filter(function () { return !this.name && t.settings.debug && window.console && console.error("%o has no name assigned", this), this.name in n || !t.objectLength(e(this).rules()) ? !1 : (n[this.name] = !0, !0) }) }, clean: function (t) { return e(t)[0] }, errors: function () { var t = this.settings.errorClass.replace(" ", "."); return e(this.settings.errorElement + "." + t, this.errorContext) }, reset: function () { this.successList = [], this.errorList = [], this.errorMap = {}, this.toShow = e([]), this.toHide = e([]), this.currentElements = e([]) }, prepareForm: function () { this.reset(), this.toHide = this.errors().add(this.containers) }, prepareElement: function (e) { this.reset(), this.toHide = this.errorsFor(e) }, elementValue: function (t) { var n = e(t).attr("type"), r = e(t).val(); return n === "radio" || n === "checkbox" ? e("input[name='" + e(t).attr("name") + "']:checked").val() : typeof r == "string" ? r.replace(/\r/g, "") : r }, check: function (t) { t = this.validationTargetFor(this.clean(t)); var n = e(t).rules(), r = !1, i = this.elementValue(t), s; for (var o in n) { var u = { method: o, parameters: n[o] }; try { s = e.validator.methods[o].call(this, i, t, u.parameters); if (s === "dependency-mismatch") { r = !0; continue } r = !1; if (s === "pending") { this.toHide = this.toHide.not(this.errorsFor(t)); return } if (!s) return this.formatAndAdd(t, u), !1 } catch (a) { throw this.settings.debug && window.console && console.log("Exception occured when checking element " + t.id + ", check the '" + u.method + "' method.", a), a } } if (r) return; return this.objectLength(n) && this.successList.push(t), !0 }, customDataMessage: function (t, n) { return e(t).data("msg-" + n.toLowerCase()) || t.attributes && e(t).attr("data-msg-" + n.toLowerCase()) }, customMessage: function (e, t) { var n = this.settings.messages[e]; return n && (n.constructor === String ? n : n[t]) }, findDefined: function () { for (var e = 0; e < arguments.length; e++) if (arguments[e] !== undefined) return arguments[e]; return undefined }, defaultMessage: function (t, n) { return this.findDefined(this.customMessage(t.name, n), this.customDataMessage(t, n), !this.settings.ignoreTitle && t.title || undefined, e.validator.messages[n], "<strong>Warning: No message defined for " + t.name + "</strong>") }, formatAndAdd: function (t, n) { var r = this.defaultMessage(t, n.method), i = /\$?\{(\d+)\}/g; typeof r == "function" ? r = r.call(this, n.parameters, t) : i.test(r) && (r = e.validator.format(r.replace(i, "{$1}"), n.parameters)), this.errorList.push({ message: r, element: t }), this.errorMap[t.name] = r, this.submitted[t.name] = r }, addWrapper: function (e) { return this.settings.wrapper && (e = e.add(e.parent(this.settings.wrapper))), e }, defaultShowErrors: function () { var e, t; for (e = 0; this.errorList[e]; e++) { var n = this.errorList[e]; this.settings.highlight && this.settings.highlight.call(this, n.element, this.settings.errorClass, this.settings.validClass), this.showLabel(n.element, n.message) } this.errorList.length && (this.toShow = this.toShow.add(this.containers)); if (this.settings.success) for (e = 0; this.successList[e]; e++) this.showLabel(this.successList[e]); if (this.settings.unhighlight) for (e = 0, t = this.validElements() ; t[e]; e++) this.settings.unhighlight.call(this, t[e], this.settings.errorClass, this.settings.validClass); this.toHide = this.toHide.not(this.toShow), this.hideErrors(), this.addWrapper(this.toShow).show() }, validElements: function () { return this.currentElements.not(this.invalidElements()) }, invalidElements: function () { return e(this.errorList).map(function () { return this.element }) }, showLabel: function (t, n) { var r = this.errorsFor(t); r.length ? (r.removeClass(this.settings.validClass).addClass(this.settings.errorClass), r.html(n)) : (r = e("<" + this.settings.errorElement + ">").attr("for", this.idOrName(t)).addClass(this.settings.errorClass).html(n || ""), this.settings.wrapper && (r = r.hide().show().wrap("<" + this.settings.wrapper + "/>").parent()), this.labelContainer.append(r).length || (this.settings.errorPlacement ? this.settings.errorPlacement(r, e(t)) : r.insertAfter(t))), !n && this.settings.success && (r.text(""), typeof this.settings.success == "string" ? r.addClass(this.settings.success) : this.settings.success(r, t)), this.toShow = this.toShow.add(r) }, errorsFor: function (t) { var n = this.idOrName(t); return this.errors().filter(function () { return e(this).attr("for") === n }) }, idOrName: function (e) { return this.groups[e.name] || (this.checkable(e) ? e.name : e.id || e.name) }, validationTargetFor: function (e) { return this.checkable(e) && (e = this.findByName(e.name).not(this.settings.ignore)[0]), e }, checkable: function (e) { return /radio|checkbox/i.test(e.type) }, findByName: function (t) { return e(this.currentForm).find("[name='" + t + "']") }, getLength: function (t, n) { switch (n.nodeName.toLowerCase()) { case "select": return e("option:selected", n).length; case "input": if (this.checkable(n)) return this.findByName(n.name).filter(":checked").length } return t.length }, depend: function (e, t) { return this.dependTypes[typeof e] ? this.dependTypes[typeof e](e, t) : !0 }, dependTypes: { "boolean": function (e, t) { return e }, string: function (t, n) { return !!e(t, n.form).length }, "function": function (e, t) { return e(t) } }, optional: function (t) { var n = this.elementValue(t); return !e.validator.methods.required.call(this, n, t) && "dependency-mismatch" }, startRequest: function (e) { this.pending[e.name] || (this.pendingRequest++, this.pending[e.name] = !0) }, stopRequest: function (t, n) { this.pendingRequest--, this.pendingRequest < 0 && (this.pendingRequest = 0), delete this.pending[t.name], n && this.pendingRequest === 0 && this.formSubmitted && this.form() ? (e(this.currentForm).submit(), this.formSubmitted = !1) : !n && this.pendingRequest === 0 && this.formSubmitted && (e(this.currentForm).triggerHandler("invalid-form", [this]), this.formSubmitted = !1) }, previousValue: function (t) { return e.data(t, "previousValue") || e.data(t, "previousValue", { old: null, valid: !0, message: this.defaultMessage(t, "remote") }) } }, classRuleSettings: { required: { required: !0 }, email: { email: !0 }, url: { url: !0 }, date: { date: !0 }, dateISO: { dateISO: !0 }, number: { number: !0 }, digits: { digits: !0 }, creditcard: { creditcard: !0 } }, addClassRules: function (t, n) { t.constructor === String ? this.classRuleSettings[t] = n : e.extend(this.classRuleSettings, t) }, classRules: function (t) { var n = {}, r = e(t).attr("class"); return r && e.each(r.split(" "), function () { this in e.validator.classRuleSettings && e.extend(n, e.validator.classRuleSettings[this]) }), n }, attributeRules: function (t) { var n = {}, r = e(t); for (var i in e.validator.methods) { var s; i === "required" ? (s = r.get(0).getAttribute(i), s === "" && (s = !0), s = !!s) : s = r.attr(i), s ? n[i] = s : r[0].getAttribute("type") === i && (n[i] = !0) } return n.maxlength && /-1|2147483647|524288/.test(n.maxlength) && delete n.maxlength, n }, dataRules: function (t) { var n, r, i = {}, s = e(t); for (n in e.validator.methods) r = s.data("rule-" + n.toLowerCase()), r !== undefined && (i[n] = r); return i }, staticRules: function (t) { var n = {}, r = e.data(t.form, "validator"); return r.settings.rules && (n = e.validator.normalizeRule(r.settings.rules[t.name]) || {}), n }, normalizeRules: function (t, n) { return e.each(t, function (r, i) { if (i === !1) { delete t[r]; return } if (i.param || i.depends) { var s = !0; switch (typeof i.depends) { case "string": s = !!e(i.depends, n.form).length; break; case "function": s = i.depends.call(n, n) } s ? t[r] = i.param !== undefined ? i.param : !0 : delete t[r] } }), e.each(t, function (r, i) { t[r] = e.isFunction(i) ? i(n) : i }), e.each(["minlength", "maxlength"], function () { t[this] && (t[this] = Number(t[this])) }), e.each(["rangelength"], function () { var n; t[this] && (e.isArray(t[this]) ? t[this] = [Number(t[this][0]), Number(t[this][1])] : typeof t[this] == "string" && (n = t[this].split(/[\s,]+/), t[this] = [Number(n[0]), Number(n[1])])) }), e.validator.autoCreateRanges && (t.min && t.max && (t.range = [t.min, t.max], delete t.min, delete t.max), t.minlength && t.maxlength && (t.rangelength = [t.minlength, t.maxlength], delete t.minlength, delete t.maxlength)), t }, normalizeRule: function (t) { if (typeof t == "string") { var n = {}; e.each(t.split(/\s/), function () { n[this] = !0 }), t = n } return t }, addMethod: function (t, n, r) { e.validator.methods[t] = n, e.validator.messages[t] = r !== undefined ? r : e.validator.messages[t], n.length < 3 && e.validator.addClassRules(t, e.validator.normalizeRule(t)) }, methods: { required: function (t, n, r) { if (!this.depend(r, n)) return "dependency-mismatch"; if (n.nodeName.toLowerCase() === "select") { var i = e(n).val(); return i && i.length > 0 } return this.checkable(n) ? this.getLength(t, n) > 0 : e.trim(t).length > 0 }, remote: function (t, n, r) { if (this.optional(n)) return "dependency-mismatch"; var i = this.previousValue(n); this.settings.messages[n.name] || (this.settings.messages[n.name] = {}), i.originalMessage = this.settings.messages[n.name].remote, this.settings.messages[n.name].remote = i.message, r = typeof r == "string" && { url: r } || r; if (i.old === t) return i.valid; i.old = t; var s = this; this.startRequest(n); var o = {}; return o[n.name] = t, e.ajax(e.extend(!0, { url: r, mode: "abort", port: "validate" + n.name, dataType: "json", data: o, success: function (r) { s.settings.messages[n.name].remote = i.originalMessage; var o = r === !0 || r === "true"; if (o) { var u = s.formSubmitted; s.prepareElement(n), s.formSubmitted = u, s.successList.push(n), delete s.invalid[n.name], s.showErrors() } else { var a = {}, f = r || s.defaultMessage(n, "remote"); a[n.name] = i.message = e.isFunction(f) ? f(t) : f, s.invalid[n.name] = !0, s.showErrors(a) } i.valid = o, s.stopRequest(n, o) } }, r)), "pending" }, minlength: function (t, n, r) { var i = e.isArray(t) ? t.length : this.getLength(e.trim(t), n); return this.optional(n) || i >= r }, maxlength: function (t, n, r) { var i = e.isArray(t) ? t.length : this.getLength(e.trim(t), n); return this.optional(n) || i <= r }, rangelength: function (t, n, r) { var i = e.isArray(t) ? t.length : this.getLength(e.trim(t), n); return this.optional(n) || i >= r[0] && i <= r[1] }, min: function (e, t, n) { return this.optional(t) || e >= n }, max: function (e, t, n) { return this.optional(t) || e <= n }, range: function (e, t, n) { return this.optional(t) || e >= n[0] && e <= n[1] }, email: function (e, t) { return this.optional(t) || /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test(e) }, url: function (e, t) { return this.optional(t) || /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(e) }, date: function (e, t) { return this.optional(t) || !/Invalid|NaN/.test((new Date(e)).toString()) }, dateISO: function (e, t) { return this.optional(t) || /^\d{4}[\/\-]\d{1,2}[\/\-]\d{1,2}$/.test(e) }, number: function (e, t) { return this.optional(t) || /^-?(?:\d+|\d{1,3}(?:,\d{3})+)?(?:\.\d+)?$/.test(e) }, digits: function (e, t) { return this.optional(t) || /^\d+$/.test(e) }, creditcard: function (e, t) { if (this.optional(t)) return "dependency-mismatch"; if (/[^0-9 \-]+/.test(e)) return !1; var n = 0, r = 0, i = !1; e = e.replace(/\D/g, ""); for (var s = e.length - 1; s >= 0; s--) { var o = e.charAt(s); r = parseInt(o, 10), i && (r *= 2) > 9 && (r -= 9), n += r, i = !i } return n % 10 === 0 }, equalTo: function (t, n, r) { var i = e(r); return this.settings.onfocusout && i.unbind(".validate-equalTo").bind("blur.validate-equalTo", function () { e(n).valid() }), t === i.val() } } }), e.format = e.validator.format })(jQuery), function (e) { var t = {}; if (e.ajaxPrefilter) e.ajaxPrefilter(function (e, n, r) { var i = e.port; e.mode === "abort" && (t[i] && t[i].abort(), t[i] = r) }); else { var n = e.ajax; e.ajax = function (r) { var i = ("mode" in r ? r : e.ajaxSettings).mode, s = ("port" in r ? r : e.ajaxSettings).port; return i === "abort" ? (t[s] && t[s].abort(), t[s] = n.apply(this, arguments)) : n.apply(this, arguments) } } }(jQuery), function (e) { e.extend(e.fn, { validateDelegate: function (t, n, r) { return this.bind(n, function (n) { var i = e(n.target); if (i.is(t)) return r.apply(i, arguments) }) } }) }(jQuery);



/** Abstract base class for collection plugins v1.0.1.
	Written by Keith Wood (kbwood{at}iinet.com.au) December 2013.
	Licensed under the MIT (http://keith-wood.name/licence.html) license. */
(function () { var j = false; window.JQClass = function () { }; JQClass.classes = {}; JQClass.extend = function extender(f) { var g = this.prototype; j = true; var h = new this(); j = false; for (var i in f) { h[i] = typeof f[i] == 'function' && typeof g[i] == 'function' ? (function (d, e) { return function () { var b = this._super; this._super = function (a) { return g[d].apply(this, a || []) }; var c = e.apply(this, arguments); this._super = b; return c } })(i, f[i]) : f[i] } function JQClass() { if (!j && this._init) { this._init.apply(this, arguments) } } JQClass.prototype = h; JQClass.prototype.constructor = JQClass; JQClass.extend = extender; return JQClass } })(); (function ($) { JQClass.classes.JQPlugin = JQClass.extend({ name: 'plugin', defaultOptions: {}, regionalOptions: {}, _getters: [], _getMarker: function () { return 'is-' + this.name }, _init: function () { $.extend(this.defaultOptions, (this.regionalOptions && this.regionalOptions['']) || {}); var c = camelCase(this.name); $[c] = this; $.fn[c] = function (a) { var b = Array.prototype.slice.call(arguments, 1); if ($[c]._isNotChained(a, b)) { return $[c][a].apply($[c], [this[0]].concat(b)) } return this.each(function () { if (typeof a === 'string') { if (a[0] === '_' || !$[c][a]) { throw 'Unknown method: ' + a; } $[c][a].apply($[c], [this].concat(b)) } else { $[c]._attach(this, a) } }) } }, setDefaults: function (a) { $.extend(this.defaultOptions, a || {}) }, _isNotChained: function (a, b) { if (a === 'option' && (b.length === 0 || (b.length === 1 && typeof b[0] === 'string'))) { return true } return $.inArray(a, this._getters) > -1 }, _attach: function (a, b) { a = $(a); if (a.hasClass(this._getMarker())) { return } a.addClass(this._getMarker()); b = $.extend({}, this.defaultOptions, this._getMetadata(a), b || {}); var c = $.extend({ name: this.name, elem: a, options: b }, this._instSettings(a, b)); a.data(this.name, c); this._postAttach(a, c); this.option(a, b) }, _instSettings: function (a, b) { return {} }, _postAttach: function (a, b) { }, _getMetadata: function (d) { try { var f = d.data(this.name.toLowerCase()) || ''; f = f.replace(/'/g, '"'); f = f.replace(/([a-zA-Z0-9]+):/g, function (a, b, i) { var c = f.substring(0, i).match(/"/g); return (!c || c.length % 2 === 0 ? '"' + b + '":' : b + ':') }); f = $.parseJSON('{' + f + '}'); for (var g in f) { var h = f[g]; if (typeof h === 'string' && h.match(/^new Date\((.*)\)$/)) { f[g] = eval(h) } } return f } catch (e) { return {} } }, _getInst: function (a) { return $(a).data(this.name) || {} }, option: function (a, b, c) { a = $(a); var d = a.data(this.name); if (!b || (typeof b === 'string' && c == null)) { var e = (d || {}).options; return (e && b ? e[b] : e) } if (!a.hasClass(this._getMarker())) { return } var e = b || {}; if (typeof b === 'string') { e = {}; e[b] = c } this._optionsChanged(a, d, e); $.extend(d.options, e) }, _optionsChanged: function (a, b, c) { }, destroy: function (a) { a = $(a); if (!a.hasClass(this._getMarker())) { return } this._preDestroy(a, this._getInst(a)); a.removeData(this.name).removeClass(this._getMarker()) }, _preDestroy: function (a, b) { } }); function camelCase(c) { return c.replace(/-([a-z])/g, function (a, b) { return b.toUpperCase() }) } $.JQPlugin = { createPlugin: function (a, b) { if (typeof a === 'object') { b = a; a = 'JQPlugin' } a = camelCase(a); var c = camelCase(b.name); JQClass.classes[c] = JQClass.classes[a].extend(b); new JQClass.classes[c]() } } })(jQuery);


/*! fancyBox v2.1.5 fancyapps.com | fancyapps.com/fancybox/#license */
(function(r,G,f,v){var J=f("html"),n=f(r),p=f(G),b=f.fancybox=function(){b.open.apply(this,arguments)},I=navigator.userAgent.match(/msie/i),B=null,s=G.createTouch!==v,t=function(a){return a&&a.hasOwnProperty&&a instanceof f},q=function(a){return a&&"string"===f.type(a)},E=function(a){return q(a)&&0<a.indexOf("%")},l=function(a,d){var e=parseInt(a,10)||0;d&&E(a)&&(e*=b.getViewport()[d]/100);return Math.ceil(e)},w=function(a,b){return l(a,b)+"px"};f.extend(b,{version:"2.1.5",defaults:{padding:15,margin:20,
width:800,height:600,minWidth:100,minHeight:100,maxWidth:9999,maxHeight:9999,pixelRatio:1,autoSize:!0,autoHeight:!1,autoWidth:!1,autoResize:!0,autoCenter:!s,fitToView:!0,aspectRatio:!1,topRatio:0.5,leftRatio:0.5,scrolling:"auto",wrapCSS:"",arrows:!0,closeBtn:!0,closeClick:!1,nextClick:!1,mouseWheel:!0,autoPlay:!1,playSpeed:3E3,preload:3,modal:!1,loop:!0,ajax:{dataType:"html",headers:{"X-fancyBox":!0}},iframe:{scrolling:"auto",preload:!0},swf:{wmode:"transparent",allowfullscreen:"true",allowscriptaccess:"always"},
keys:{next:{13:"left",34:"up",39:"left",40:"up"},prev:{8:"right",33:"down",37:"right",38:"down"},close:[27],play:[32],toggle:[70]},direction:{next:"left",prev:"right"},scrollOutside:!0,index:0,type:null,href:null,content:null,title:null,tpl:{wrap:'<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>',image:'<img class="fancybox-image" src="{href}" alt="" />',iframe:'<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen'+
(I?' allowtransparency="true"':"")+"></iframe>",error:'<p class="fancybox-error">The requested content cannot be loaded.<br/>Please try again later.</p>',closeBtn:'<a title="Close" class="fancybox-item fancybox-close" href="javascript:;"></a>',next:'<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',prev:'<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>'},openEffect:"fade",openSpeed:250,openEasing:"swing",openOpacity:!0,
openMethod:"zoomIn",closeEffect:"fade",closeSpeed:250,closeEasing:"swing",closeOpacity:!0,closeMethod:"zoomOut",nextEffect:"elastic",nextSpeed:250,nextEasing:"swing",nextMethod:"changeIn",prevEffect:"elastic",prevSpeed:250,prevEasing:"swing",prevMethod:"changeOut",helpers:{overlay:!0,title:!0},onCancel:f.noop,beforeLoad:f.noop,afterLoad:f.noop,beforeShow:f.noop,afterShow:f.noop,beforeChange:f.noop,beforeClose:f.noop,afterClose:f.noop},group:{},opts:{},previous:null,coming:null,current:null,isActive:!1,
isOpen:!1,isOpened:!1,wrap:null,skin:null,outer:null,inner:null,player:{timer:null,isActive:!1},ajaxLoad:null,imgPreload:null,transitions:{},helpers:{},open:function(a,d){if(a&&(f.isPlainObject(d)||(d={}),!1!==b.close(!0)))return f.isArray(a)||(a=t(a)?f(a).get():[a]),f.each(a,function(e,c){var k={},g,h,j,m,l;"object"===f.type(c)&&(c.nodeType&&(c=f(c)),t(c)?(k={href:c.data("fancybox-href")||c.attr("href"),title:c.data("fancybox-title")||c.attr("title"),isDom:!0,element:c},f.metadata&&f.extend(!0,k,
c.metadata())):k=c);g=d.href||k.href||(q(c)?c:null);h=d.title!==v?d.title:k.title||"";m=(j=d.content||k.content)?"html":d.type||k.type;!m&&k.isDom&&(m=c.data("fancybox-type"),m||(m=(m=c.prop("class").match(/fancybox\.(\w+)/))?m[1]:null));q(g)&&(m||(b.isImage(g)?m="image":b.isSWF(g)?m="swf":"#"===g.charAt(0)?m="inline":q(c)&&(m="html",j=c)),"ajax"===m&&(l=g.split(/\s+/,2),g=l.shift(),l=l.shift()));j||("inline"===m?g?j=f(q(g)?g.replace(/.*(?=#[^\s]+$)/,""):g):k.isDom&&(j=c):"html"===m?j=g:!m&&(!g&&
k.isDom)&&(m="inline",j=c));f.extend(k,{href:g,type:m,content:j,title:h,selector:l});a[e]=k}),b.opts=f.extend(!0,{},b.defaults,d),d.keys!==v&&(b.opts.keys=d.keys?f.extend({},b.defaults.keys,d.keys):!1),b.group=a,b._start(b.opts.index)},cancel:function(){var a=b.coming;a&&!1!==b.trigger("onCancel")&&(b.hideLoading(),b.ajaxLoad&&b.ajaxLoad.abort(),b.ajaxLoad=null,b.imgPreload&&(b.imgPreload.onload=b.imgPreload.onerror=null),a.wrap&&a.wrap.stop(!0,!0).trigger("onReset").remove(),b.coming=null,b.current||
b._afterZoomOut(a))},close:function(a){b.cancel();!1!==b.trigger("beforeClose")&&(b.unbindEvents(),b.isActive&&(!b.isOpen||!0===a?(f(".fancybox-wrap").stop(!0).trigger("onReset").remove(),b._afterZoomOut()):(b.isOpen=b.isOpened=!1,b.isClosing=!0,f(".fancybox-item, .fancybox-nav").remove(),b.wrap.stop(!0,!0).removeClass("fancybox-opened"),b.transitions[b.current.closeMethod]())))},play:function(a){var d=function(){clearTimeout(b.player.timer)},e=function(){d();b.current&&b.player.isActive&&(b.player.timer=
setTimeout(b.next,b.current.playSpeed))},c=function(){d();p.unbind(".player");b.player.isActive=!1;b.trigger("onPlayEnd")};if(!0===a||!b.player.isActive&&!1!==a){if(b.current&&(b.current.loop||b.current.index<b.group.length-1))b.player.isActive=!0,p.bind({"onCancel.player beforeClose.player":c,"onUpdate.player":e,"beforeLoad.player":d}),e(),b.trigger("onPlayStart")}else c()},next:function(a){var d=b.current;d&&(q(a)||(a=d.direction.next),b.jumpto(d.index+1,a,"next"))},prev:function(a){var d=b.current;
d&&(q(a)||(a=d.direction.prev),b.jumpto(d.index-1,a,"prev"))},jumpto:function(a,d,e){var c=b.current;c&&(a=l(a),b.direction=d||c.direction[a>=c.index?"next":"prev"],b.router=e||"jumpto",c.loop&&(0>a&&(a=c.group.length+a%c.group.length),a%=c.group.length),c.group[a]!==v&&(b.cancel(),b._start(a)))},reposition:function(a,d){var e=b.current,c=e?e.wrap:null,k;c&&(k=b._getPosition(d),a&&"scroll"===a.type?(delete k.position,c.stop(!0,!0).animate(k,200)):(c.css(k),e.pos=f.extend({},e.dim,k)))},update:function(a){var d=
a&&a.type,e=!d||"orientationchange"===d;e&&(clearTimeout(B),B=null);b.isOpen&&!B&&(B=setTimeout(function(){var c=b.current;c&&!b.isClosing&&(b.wrap.removeClass("fancybox-tmp"),(e||"load"===d||"resize"===d&&c.autoResize)&&b._setDimension(),"scroll"===d&&c.canShrink||b.reposition(a),b.trigger("onUpdate"),B=null)},e&&!s?0:300))},toggle:function(a){b.isOpen&&(b.current.fitToView="boolean"===f.type(a)?a:!b.current.fitToView,s&&(b.wrap.removeAttr("style").addClass("fancybox-tmp"),b.trigger("onUpdate")),
b.update())},hideLoading:function(){p.unbind(".loading");f("#fancybox-loading").remove()},showLoading:function(){var a,d;b.hideLoading();a=f('<div id="fancybox-loading"><div></div></div>').click(b.cancel).appendTo("body");p.bind("keydown.loading",function(a){if(27===(a.which||a.keyCode))a.preventDefault(),b.cancel()});b.defaults.fixed||(d=b.getViewport(),a.css({position:"absolute",top:0.5*d.h+d.y,left:0.5*d.w+d.x}))},getViewport:function(){var a=b.current&&b.current.locked||!1,d={x:n.scrollLeft(),
y:n.scrollTop()};a?(d.w=a[0].clientWidth,d.h=a[0].clientHeight):(d.w=s&&r.innerWidth?r.innerWidth:n.width(),d.h=s&&r.innerHeight?r.innerHeight:n.height());return d},unbindEvents:function(){b.wrap&&t(b.wrap)&&b.wrap.unbind(".fb");p.unbind(".fb");n.unbind(".fb")},bindEvents:function(){var a=b.current,d;a&&(n.bind("orientationchange.fb"+(s?"":" resize.fb")+(a.autoCenter&&!a.locked?" scroll.fb":""),b.update),(d=a.keys)&&p.bind("keydown.fb",function(e){var c=e.which||e.keyCode,k=e.target||e.srcElement;
if(27===c&&b.coming)return!1;!e.ctrlKey&&(!e.altKey&&!e.shiftKey&&!e.metaKey&&(!k||!k.type&&!f(k).is("[contenteditable]")))&&f.each(d,function(d,k){if(1<a.group.length&&k[c]!==v)return b[d](k[c]),e.preventDefault(),!1;if(-1<f.inArray(c,k))return b[d](),e.preventDefault(),!1})}),f.fn.mousewheel&&a.mouseWheel&&b.wrap.bind("mousewheel.fb",function(d,c,k,g){for(var h=f(d.target||null),j=!1;h.length&&!j&&!h.is(".fancybox-skin")&&!h.is(".fancybox-wrap");)j=h[0]&&!(h[0].style.overflow&&"hidden"===h[0].style.overflow)&&
(h[0].clientWidth&&h[0].scrollWidth>h[0].clientWidth||h[0].clientHeight&&h[0].scrollHeight>h[0].clientHeight),h=f(h).parent();if(0!==c&&!j&&1<b.group.length&&!a.canShrink){if(0<g||0<k)b.prev(0<g?"down":"left");else if(0>g||0>k)b.next(0>g?"up":"right");d.preventDefault()}}))},trigger:function(a,d){var e,c=d||b.coming||b.current;if(c){f.isFunction(c[a])&&(e=c[a].apply(c,Array.prototype.slice.call(arguments,1)));if(!1===e)return!1;c.helpers&&f.each(c.helpers,function(d,e){if(e&&b.helpers[d]&&f.isFunction(b.helpers[d][a]))b.helpers[d][a](f.extend(!0,
{},b.helpers[d].defaults,e),c)});p.trigger(a)}},isImage:function(a){return q(a)&&a.match(/(^data:image\/.*,)|(\.(jp(e|g|eg)|gif|png|bmp|webp|svg)((\?|#).*)?$)/i)},isSWF:function(a){return q(a)&&a.match(/\.(swf)((\?|#).*)?$/i)},_start:function(a){var d={},e,c;a=l(a);e=b.group[a]||null;if(!e)return!1;d=f.extend(!0,{},b.opts,e);e=d.margin;c=d.padding;"number"===f.type(e)&&(d.margin=[e,e,e,e]);"number"===f.type(c)&&(d.padding=[c,c,c,c]);d.modal&&f.extend(!0,d,{closeBtn:!1,closeClick:!1,nextClick:!1,arrows:!1,
mouseWheel:!1,keys:null,helpers:{overlay:{closeClick:!1}}});d.autoSize&&(d.autoWidth=d.autoHeight=!0);"auto"===d.width&&(d.autoWidth=!0);"auto"===d.height&&(d.autoHeight=!0);d.group=b.group;d.index=a;b.coming=d;if(!1===b.trigger("beforeLoad"))b.coming=null;else{c=d.type;e=d.href;if(!c)return b.coming=null,b.current&&b.router&&"jumpto"!==b.router?(b.current.index=a,b[b.router](b.direction)):!1;b.isActive=!0;if("image"===c||"swf"===c)d.autoHeight=d.autoWidth=!1,d.scrolling="visible";"image"===c&&(d.aspectRatio=
!0);"iframe"===c&&s&&(d.scrolling="scroll");d.wrap=f(d.tpl.wrap).addClass("fancybox-"+(s?"mobile":"desktop")+" fancybox-type-"+c+" fancybox-tmp "+d.wrapCSS).appendTo(d.parent||"body");f.extend(d,{skin:f(".fancybox-skin",d.wrap),outer:f(".fancybox-outer",d.wrap),inner:f(".fancybox-inner",d.wrap)});f.each(["Top","Right","Bottom","Left"],function(a,b){d.skin.css("padding"+b,w(d.padding[a]))});b.trigger("onReady");if("inline"===c||"html"===c){if(!d.content||!d.content.length)return b._error("content")}else if(!e)return b._error("href");
"image"===c?b._loadImage():"ajax"===c?b._loadAjax():"iframe"===c?b._loadIframe():b._afterLoad()}},_error:function(a){f.extend(b.coming,{type:"html",autoWidth:!0,autoHeight:!0,minWidth:0,minHeight:0,scrolling:"no",hasError:a,content:b.coming.tpl.error});b._afterLoad()},_loadImage:function(){var a=b.imgPreload=new Image;a.onload=function(){this.onload=this.onerror=null;b.coming.width=this.width/b.opts.pixelRatio;b.coming.height=this.height/b.opts.pixelRatio;b._afterLoad()};a.onerror=function(){this.onload=
this.onerror=null;b._error("image")};a.src=b.coming.href;!0!==a.complete&&b.showLoading()},_loadAjax:function(){var a=b.coming;b.showLoading();b.ajaxLoad=f.ajax(f.extend({},a.ajax,{url:a.href,error:function(a,e){b.coming&&"abort"!==e?b._error("ajax",a):b.hideLoading()},success:function(d,e){"success"===e&&(a.content=d,b._afterLoad())}}))},_loadIframe:function(){var a=b.coming,d=f(a.tpl.iframe.replace(/\{rnd\}/g,(new Date).getTime())).attr("scrolling",s?"auto":a.iframe.scrolling).attr("src",a.href);
f(a.wrap).bind("onReset",function(){try{f(this).find("iframe").hide().attr("src","//about:blank").end().empty()}catch(a){}});a.iframe.preload&&(b.showLoading(),d.one("load",function(){f(this).data("ready",1);s||f(this).bind("load.fb",b.update);f(this).parents(".fancybox-wrap").width("100%").removeClass("fancybox-tmp").show();b._afterLoad()}));a.content=d.appendTo(a.inner);a.iframe.preload||b._afterLoad()},_preloadImages:function(){var a=b.group,d=b.current,e=a.length,c=d.preload?Math.min(d.preload,
e-1):0,f,g;for(g=1;g<=c;g+=1)f=a[(d.index+g)%e],"image"===f.type&&f.href&&((new Image).src=f.href)},_afterLoad:function(){var a=b.coming,d=b.current,e,c,k,g,h;b.hideLoading();if(a&&!1!==b.isActive)if(!1===b.trigger("afterLoad",a,d))a.wrap.stop(!0).trigger("onReset").remove(),b.coming=null;else{d&&(b.trigger("beforeChange",d),d.wrap.stop(!0).removeClass("fancybox-opened").find(".fancybox-item, .fancybox-nav").remove());b.unbindEvents();e=a.content;c=a.type;k=a.scrolling;f.extend(b,{wrap:a.wrap,skin:a.skin,
outer:a.outer,inner:a.inner,current:a,previous:d});g=a.href;switch(c){case "inline":case "ajax":case "html":a.selector?e=f("<div>").html(e).find(a.selector):t(e)&&(e.data("fancybox-placeholder")||e.data("fancybox-placeholder",f('<div class="fancybox-placeholder"></div>').insertAfter(e).hide()),e=e.show().detach(),a.wrap.bind("onReset",function(){f(this).find(e).length&&e.hide().replaceAll(e.data("fancybox-placeholder")).data("fancybox-placeholder",!1)}));break;case "image":e=a.tpl.image.replace("{href}",
g);break;case "swf":e='<object id="fancybox-swf" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="100%"><param name="movie" value="'+g+'"></param>',h="",f.each(a.swf,function(a,b){e+='<param name="'+a+'" value="'+b+'"></param>';h+=" "+a+'="'+b+'"'}),e+='<embed src="'+g+'" type="application/x-shockwave-flash" width="100%" height="100%"'+h+"></embed></object>"}(!t(e)||!e.parent().is(a.inner))&&a.inner.append(e);b.trigger("beforeShow");a.inner.css("overflow","yes"===k?"scroll":
"no"===k?"hidden":k);b._setDimension();b.reposition();b.isOpen=!1;b.coming=null;b.bindEvents();if(b.isOpened){if(d.prevMethod)b.transitions[d.prevMethod]()}else f(".fancybox-wrap").not(a.wrap).stop(!0).trigger("onReset").remove();b.transitions[b.isOpened?a.nextMethod:a.openMethod]();b._preloadImages()}},_setDimension:function(){var a=b.getViewport(),d=0,e=!1,c=!1,e=b.wrap,k=b.skin,g=b.inner,h=b.current,c=h.width,j=h.height,m=h.minWidth,u=h.minHeight,n=h.maxWidth,p=h.maxHeight,s=h.scrolling,q=h.scrollOutside?
h.scrollbarWidth:0,x=h.margin,y=l(x[1]+x[3]),r=l(x[0]+x[2]),v,z,t,C,A,F,B,D,H;e.add(k).add(g).width("auto").height("auto").removeClass("fancybox-tmp");x=l(k.outerWidth(!0)-k.width());v=l(k.outerHeight(!0)-k.height());z=y+x;t=r+v;C=E(c)?(a.w-z)*l(c)/100:c;A=E(j)?(a.h-t)*l(j)/100:j;if("iframe"===h.type){if(H=h.content,h.autoHeight&&1===H.data("ready"))try{H[0].contentWindow.document.location&&(g.width(C).height(9999),F=H.contents().find("body"),q&&F.css("overflow-x","hidden"),A=F.outerHeight(!0))}catch(G){}}else if(h.autoWidth||
h.autoHeight)g.addClass("fancybox-tmp"),h.autoWidth||g.width(C),h.autoHeight||g.height(A),h.autoWidth&&(C=g.width()),h.autoHeight&&(A=g.height()),g.removeClass("fancybox-tmp");c=l(C);j=l(A);D=C/A;m=l(E(m)?l(m,"w")-z:m);n=l(E(n)?l(n,"w")-z:n);u=l(E(u)?l(u,"h")-t:u);p=l(E(p)?l(p,"h")-t:p);F=n;B=p;h.fitToView&&(n=Math.min(a.w-z,n),p=Math.min(a.h-t,p));z=a.w-y;r=a.h-r;h.aspectRatio?(c>n&&(c=n,j=l(c/D)),j>p&&(j=p,c=l(j*D)),c<m&&(c=m,j=l(c/D)),j<u&&(j=u,c=l(j*D))):(c=Math.max(m,Math.min(c,n)),h.autoHeight&&
"iframe"!==h.type&&(g.width(c),j=g.height()),j=Math.max(u,Math.min(j,p)));if(h.fitToView)if(g.width(c).height(j),e.width(c+x),a=e.width(),y=e.height(),h.aspectRatio)for(;(a>z||y>r)&&(c>m&&j>u)&&!(19<d++);)j=Math.max(u,Math.min(p,j-10)),c=l(j*D),c<m&&(c=m,j=l(c/D)),c>n&&(c=n,j=l(c/D)),g.width(c).height(j),e.width(c+x),a=e.width(),y=e.height();else c=Math.max(m,Math.min(c,c-(a-z))),j=Math.max(u,Math.min(j,j-(y-r)));q&&("auto"===s&&j<A&&c+x+q<z)&&(c+=q);g.width(c).height(j);e.width(c+x);a=e.width();
y=e.height();e=(a>z||y>r)&&c>m&&j>u;c=h.aspectRatio?c<F&&j<B&&c<C&&j<A:(c<F||j<B)&&(c<C||j<A);f.extend(h,{dim:{width:w(a),height:w(y)},origWidth:C,origHeight:A,canShrink:e,canExpand:c,wPadding:x,hPadding:v,wrapSpace:y-k.outerHeight(!0),skinSpace:k.height()-j});!H&&(h.autoHeight&&j>u&&j<p&&!c)&&g.height("auto")},_getPosition:function(a){var d=b.current,e=b.getViewport(),c=d.margin,f=b.wrap.width()+c[1]+c[3],g=b.wrap.height()+c[0]+c[2],c={position:"absolute",top:c[0],left:c[3]};d.autoCenter&&d.fixed&&
!a&&g<=e.h&&f<=e.w?c.position="fixed":d.locked||(c.top+=e.y,c.left+=e.x);c.top=w(Math.max(c.top,c.top+(e.h-g)*d.topRatio));c.left=w(Math.max(c.left,c.left+(e.w-f)*d.leftRatio));return c},_afterZoomIn:function(){var a=b.current;a&&(b.isOpen=b.isOpened=!0,b.wrap.css("overflow","visible").addClass("fancybox-opened"),b.update(),(a.closeClick||a.nextClick&&1<b.group.length)&&b.inner.css("cursor","pointer").bind("click.fb",function(d){!f(d.target).is("a")&&!f(d.target).parent().is("a")&&(d.preventDefault(),
b[a.closeClick?"close":"next"]())}),a.closeBtn&&f(a.tpl.closeBtn).appendTo(b.skin).bind("click.fb",function(a){a.preventDefault();b.close()}),a.arrows&&1<b.group.length&&((a.loop||0<a.index)&&f(a.tpl.prev).appendTo(b.outer).bind("click.fb",b.prev),(a.loop||a.index<b.group.length-1)&&f(a.tpl.next).appendTo(b.outer).bind("click.fb",b.next)),b.trigger("afterShow"),!a.loop&&a.index===a.group.length-1?b.play(!1):b.opts.autoPlay&&!b.player.isActive&&(b.opts.autoPlay=!1,b.play()))},_afterZoomOut:function(a){a=
a||b.current;f(".fancybox-wrap").trigger("onReset").remove();f.extend(b,{group:{},opts:{},router:!1,current:null,isActive:!1,isOpened:!1,isOpen:!1,isClosing:!1,wrap:null,skin:null,outer:null,inner:null});b.trigger("afterClose",a)}});b.transitions={getOrigPosition:function(){var a=b.current,d=a.element,e=a.orig,c={},f=50,g=50,h=a.hPadding,j=a.wPadding,m=b.getViewport();!e&&(a.isDom&&d.is(":visible"))&&(e=d.find("img:first"),e.length||(e=d));t(e)?(c=e.offset(),e.is("img")&&(f=e.outerWidth(),g=e.outerHeight())):
(c.top=m.y+(m.h-g)*a.topRatio,c.left=m.x+(m.w-f)*a.leftRatio);if("fixed"===b.wrap.css("position")||a.locked)c.top-=m.y,c.left-=m.x;return c={top:w(c.top-h*a.topRatio),left:w(c.left-j*a.leftRatio),width:w(f+j),height:w(g+h)}},step:function(a,d){var e,c,f=d.prop;c=b.current;var g=c.wrapSpace,h=c.skinSpace;if("width"===f||"height"===f)e=d.end===d.start?1:(a-d.start)/(d.end-d.start),b.isClosing&&(e=1-e),c="width"===f?c.wPadding:c.hPadding,c=a-c,b.skin[f](l("width"===f?c:c-g*e)),b.inner[f](l("width"===
f?c:c-g*e-h*e))},zoomIn:function(){var a=b.current,d=a.pos,e=a.openEffect,c="elastic"===e,k=f.extend({opacity:1},d);delete k.position;c?(d=this.getOrigPosition(),a.openOpacity&&(d.opacity=0.1)):"fade"===e&&(d.opacity=0.1);b.wrap.css(d).animate(k,{duration:"none"===e?0:a.openSpeed,easing:a.openEasing,step:c?this.step:null,complete:b._afterZoomIn})},zoomOut:function(){var a=b.current,d=a.closeEffect,e="elastic"===d,c={opacity:0.1};e&&(c=this.getOrigPosition(),a.closeOpacity&&(c.opacity=0.1));b.wrap.animate(c,
{duration:"none"===d?0:a.closeSpeed,easing:a.closeEasing,step:e?this.step:null,complete:b._afterZoomOut})},changeIn:function(){var a=b.current,d=a.nextEffect,e=a.pos,c={opacity:1},f=b.direction,g;e.opacity=0.1;"elastic"===d&&(g="down"===f||"up"===f?"top":"left","down"===f||"right"===f?(e[g]=w(l(e[g])-200),c[g]="+=200px"):(e[g]=w(l(e[g])+200),c[g]="-=200px"));"none"===d?b._afterZoomIn():b.wrap.css(e).animate(c,{duration:a.nextSpeed,easing:a.nextEasing,complete:b._afterZoomIn})},changeOut:function(){var a=
b.previous,d=a.prevEffect,e={opacity:0.1},c=b.direction;"elastic"===d&&(e["down"===c||"up"===c?"top":"left"]=("up"===c||"left"===c?"-":"+")+"=200px");a.wrap.animate(e,{duration:"none"===d?0:a.prevSpeed,easing:a.prevEasing,complete:function(){f(this).trigger("onReset").remove()}})}};b.helpers.overlay={defaults:{closeClick:!0,speedOut:200,showEarly:!0,css:{},locked:!s,fixed:!0},overlay:null,fixed:!1,el:f("html"),create:function(a){a=f.extend({},this.defaults,a);this.overlay&&this.close();this.overlay=
f('<div class="fancybox-overlay"></div>').appendTo(b.coming?b.coming.parent:a.parent);this.fixed=!1;a.fixed&&b.defaults.fixed&&(this.overlay.addClass("fancybox-overlay-fixed"),this.fixed=!0)},open:function(a){var d=this;a=f.extend({},this.defaults,a);this.overlay?this.overlay.unbind(".overlay").width("auto").height("auto"):this.create(a);this.fixed||(n.bind("resize.overlay",f.proxy(this.update,this)),this.update());a.closeClick&&this.overlay.bind("click.overlay",function(a){if(f(a.target).hasClass("fancybox-overlay"))return b.isActive?
b.close():d.close(),!1});this.overlay.css(a.css).show()},close:function(){var a,b;n.unbind("resize.overlay");this.el.hasClass("fancybox-lock")&&(f(".fancybox-margin").removeClass("fancybox-margin"),a=n.scrollTop(),b=n.scrollLeft(),this.el.removeClass("fancybox-lock"),n.scrollTop(a).scrollLeft(b));f(".fancybox-overlay").remove().hide();f.extend(this,{overlay:null,fixed:!1})},update:function(){var a="100%",b;this.overlay.width(a).height("100%");I?(b=Math.max(G.documentElement.offsetWidth,G.body.offsetWidth),
p.width()>b&&(a=p.width())):p.width()>n.width()&&(a=p.width());this.overlay.width(a).height(p.height())},onReady:function(a,b){var e=this.overlay;f(".fancybox-overlay").stop(!0,!0);e||this.create(a);a.locked&&(this.fixed&&b.fixed)&&(e||(this.margin=p.height()>n.height()?f("html").css("margin-right").replace("px",""):!1),b.locked=this.overlay.append(b.wrap),b.fixed=!1);!0===a.showEarly&&this.beforeShow.apply(this,arguments)},beforeShow:function(a,b){var e,c;b.locked&&(!1!==this.margin&&(f("*").filter(function(){return"fixed"===
f(this).css("position")&&!f(this).hasClass("fancybox-overlay")&&!f(this).hasClass("fancybox-wrap")}).addClass("fancybox-margin"),this.el.addClass("fancybox-margin")),e=n.scrollTop(),c=n.scrollLeft(),this.el.addClass("fancybox-lock"),n.scrollTop(e).scrollLeft(c));this.open(a)},onUpdate:function(){this.fixed||this.update()},afterClose:function(a){this.overlay&&!b.coming&&this.overlay.fadeOut(a.speedOut,f.proxy(this.close,this))}};b.helpers.title={defaults:{type:"float",position:"bottom"},beforeShow:function(a){var d=
b.current,e=d.title,c=a.type;f.isFunction(e)&&(e=e.call(d.element,d));if(q(e)&&""!==f.trim(e)){d=f('<div class="fancybox-title fancybox-title-'+c+'-wrap">'+e+"</div>");switch(c){case "inside":c=b.skin;break;case "outside":c=b.wrap;break;case "over":c=b.inner;break;default:c=b.skin,d.appendTo("body"),I&&d.width(d.width()),d.wrapInner('<span class="child"></span>'),b.current.margin[2]+=Math.abs(l(d.css("margin-bottom")))}d["top"===a.position?"prependTo":"appendTo"](c)}}};f.fn.fancybox=function(a){var d,
e=f(this),c=this.selector||"",k=function(g){var h=f(this).blur(),j=d,k,l;!g.ctrlKey&&(!g.altKey&&!g.shiftKey&&!g.metaKey)&&!h.is(".fancybox-wrap")&&(k=a.groupAttr||"data-fancybox-group",l=h.attr(k),l||(k="rel",l=h.get(0)[k]),l&&(""!==l&&"nofollow"!==l)&&(h=c.length?f(c):e,h=h.filter("["+k+'="'+l+'"]'),j=h.index(this)),a.index=j,!1!==b.open(h,a)&&g.preventDefault())};a=a||{};d=a.index||0;!c||!1===a.live?e.unbind("click.fb-start").bind("click.fb-start",k):p.undelegate(c,"click.fb-start").delegate(c+
":not('.fancybox-item, .fancybox-nav')","click.fb-start",k);this.filter("[data-fancybox-start=1]").trigger("click");return this};p.ready(function(){var a,d;f.scrollbarWidth===v&&(f.scrollbarWidth=function(){var a=f('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo("body"),b=a.children(),b=b.innerWidth()-b.height(99).innerWidth();a.remove();return b});if(f.support.fixedPosition===v){a=f.support;d=f('<div style="position:fixed;top:20px;"></div>').appendTo("body");var e=20===
d[0].offsetTop||15===d[0].offsetTop;d.remove();a.fixedPosition=e}f.extend(b.defaults,{scrollbarWidth:f.scrollbarWidth(),fixed:f.support.fixedPosition,parent:f("body")});a=f(r).width();J.addClass("fancybox-lock-test");d=f(r).width();J.removeClass("fancybox-lock-test");f("<style type='text/css'>.fancybox-margin{margin-right:"+(d-a)+"px;}</style>").appendTo("head")})})(window,document,jQuery);

(function ($) {

    "use strict";


    //Hide Loading Box (Preloader)
    function handlePreloader() {
        if ($('.preloader').length) {
            $('.preloader').delay(500).fadeOut(500);
        }
    }

    // Mobile Navigation
    function mobileNavToggler() {
        if ($('header .mainmenu-container').length) {
            $('header button.mainmenu-toggler').on('click', function () {
                $('ul.mainmenu').slideToggle();
                return false;
            });
            $('.mainmenu-container ul li.dropdown').append(function () {
                return '<i class="fa fa-bars"></i>';
            });
            $('.mainmenu-container ul li.dropdown .fa').on('click', function () {
                $(this).parent('li').children('ul').slideToggle();
            });

        }
    }

    //Update Header Style + Scroll to Top
    function scrollToTop() {
        if ($('.page-wrapper').length) {
            var topHeader = $('.header-top').innerHeight();
            var windowpos = $(window).scrollTop();
            if (windowpos >= topHeader) {
                $('.page-wrapper').addClass('fixed-header');
                $('.scroll-to-top').fadeIn(300);
            } else {
                $('.page-wrapper').removeClass('fixed-header');
                $('.scroll-to-top').fadeOut(300);
            }
        }
    }

    // Header top Search button 
    function headerTopSearch() {
        if ($('header .mainmenu-container ul li.top-icons.search a').length) {
            $('header .mainmenu-container ul li.top-icons.search a').on('click', function () {
                $('header .search-box').slideToggle();
                $('header .cart-box').slideUp();
                return false;
            });
        }
    }

    // Header top Cart button 
    function headerTopCart() {
        if ($('header .mainmenu-container ul li.top-icons.cart a').length) {
            $('header .mainmenu-container ul li.top-icons.cart a').on('click', function () {
                $('header .search-box').slideUp();
                $('header .cart-box').slideToggle();
                return false;
            });
        }
    }

    // sticky header 
    function stickyHeader() {
        var headerScrollPos = $('header').next().offset().top;
        if ($(window).scrollTop() > headerScrollPos) {
            $('header').addClass('header-fixed');
        } else if ($(this).scrollTop() <= headerScrollPos) {
            $('header').removeClass('header-fixed');
        }
    }


    //Main Slider
    if ($('.main-slider .tp-banner').length) {

        jQuery('.main-slider .tp-banner').show().revolution({
            delay: 10000,
            startwidth: 1200,
            startheight: 820,
            hideThumbs: 600,

            thumbWidth: 80,
            thumbHeight: 50,
            thumbAmount: 5,

            navigationType: "bullet",
            navigationArrows: "0",
            navigationStyle: "preview4",

            touchenabled: "on",
            onHoverStop: "off",

            swipe_velocity: 0.7,
            swipe_min_touches: 1,
            swipe_max_touches: 1,
            drag_block_vertical: false,

            parallax: "mouse",
            parallaxBgFreeze: "on",
            parallaxLevels: [7, 4, 3, 2, 5, 4, 3, 2, 1, 0],

            keyboardNavigation: "off",

            navigationHAlign: "center",
            navigationVAlign: "bottom",
            navigationHOffset: 0,
            navigationVOffset: 20,

            soloArrowLeftHalign: "left",
            soloArrowLeftValign: "center",
            soloArrowLeftHOffset: 20,
            soloArrowLeftVOffset: 0,

            soloArrowRightHalign: "right",
            soloArrowRightValign: "center",
            soloArrowRightHOffset: 20,
            soloArrowRightVOffset: 0,

            shadow: 0,
            fullWidth: "on",
            fullScreen: "off",

            spinner: "spinner4",

            stopLoop: "off",
            stopAfterLoops: -1,
            stopAtSlide: -1,

            shuffle: "off",

            autoHeight: "off",
            forceFullWidth: "on",

            hideThumbsOnMobile: "on",
            hideNavDelayOnMobile: 1500,
            hideBulletsOnMobile: "on",
            hideArrowsOnMobile: "on",
            hideThumbsUnderResolution: 0,

            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            startWithSlide: 0,
            videoJsPath: "",
            fullScreenOffsetContainer: ".main-slider"
        });


    }

    //Adjust Footer Background
    function footerStyle() {
        if ($('.main-footer .contact-widget').length) {
            var contactWidth = $('.main-footer .contact-widget').innerWidth();
            //var windowWidth = $(window).width();
            var contWidth = $('.main-footer .auto-container').width();
            $('.main-footer .footer-bg-layer').css({ 'width': contWidth - contactWidth + 15 });
        }
    }

    //Date TimePicker
    if ($('.date-field').length) {
        $('.date-field').datepick();
    }

    //Tabs Box
    if ($('.tab-style').length) {
        $('.tab-style .tab-btn').on('click', function (e) {
            e.preventDefault();
            var target = $($(this).attr('href'));
            $('.tab-style .tab-btn').removeClass('active');
            $(this).addClass('active');
            $('.tab-style .tab').fadeOut(0);
            $('.tab-style .tab').removeClass('active-tab');
            $(target).fadeIn(300);
            $(target).addClass('active-tab');
            var windowWidth = $(window).width();
            if (windowWidth <= 700) {
                $('html, body').animate({
                    scrollTop: $('.tab-style .content-column').offset().top - 100
                }, 1000);
            }
        });

    }

    // 9 Owl Carousel
    function load_owlCarousel() {

        $(".welcome-carousel").owlCarousel({
            autoplay: 5000,
            smartSpeed: 700,
            loop: true,
            margin: 15,
            items: 3,
            dots: false,
            nav: false,
            responsive: {
                0: {
                    items: 2,
                    center: false
                },
                600: {
                    items: 3,
                    center: false
                },
                960: {
                    items: 3
                },
                1170: {
                    items: 3
                },
                1300: {
                    items: 3
                }
            }
        });

        $('.gallery-carousel').owlCarousel({
            loop: true,
            margin: 5,
            dots: false,
            nav: true,
            navText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>"
            ],
            autoplayHoverPause: false,
            autoplay: 5000,
            smartSpeed: 700,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                800: {
                    items: 2
                },
                1024: {
                    items: 4
                },
                1100: {
                    items: 4
                }
            }
        });

        $('.testimonials-carousel').owlCarousel({
            loop: true,
            margin: 30,
            dots: true,
            nav: false,
            autoplayHoverPause: false,
            autoplay: 5000,
            smartSpeed: 700,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                800: {
                    items: 2
                },
                1024: {
                    items: 2
                },
                1100: {
                    items: 3
                }
            }
        });

        $('.sponsors-section .slider').owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            autoplay: 5000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                800: {
                    items: 3
                },
                1024: {
                    items: 4
                },
                1100: {
                    items: 5
                }
            }
        });

    }

    //Skill Progress Bar
    if ($('.skill-box .bar-fill').length) {
        $(".skill-box .bar-fill").each(function () {
            var progressWidth = $(this).attr('data-percent');
            $(this).css('width', progressWidth + '%');
            $(this).parents('.bar').children('.percent').html(progressWidth + '%');
        });
    }

    //Common CssJs
    if ($.length) {
        $('[data-mt]').each(function () {
            $(this).css('margin-top', $(this).data("mt"));
        });
        $('[data-bac]').each(function () {
            $(this).css("cssText", "background: " + $(this).data("bac") + " !important;");
        });
        $('[data-img-bg]').each(function () {
            $(this).css('background-image', 'url(' + $(this).data("img-bg") + ')');
        });
        $('[data-border]').each(function () {
            $(this).css('border', $(this).data("border"));
        });
        $('[data-border-top]').each(function () {
            $(this).css('border-top', $(this).data("border-top"));
        });
    }

    // Fact Counter
    function factCounter() {
        if ($('.fact-counter').length) {
            $('.fact-counter .column.animated').each(function () {

                var $t = $(this),
                    n = $t.find(".count-text").attr("data-stop"),
                    r = parseInt($t.find(".count-text").attr("data-speed"), 10);

                if (!$t.hasClass("counted")) {
                    $t.addClass("counted");
                    $({
                        countNum: $t.find(".count-text").text()
                    }).animate({
                        countNum: n
                    }, {
                        duration: r,
                        easing: "linear",
                        step: function () {
                            $t.find(".count-text").text(Math.floor(this.countNum));
                        },
                        complete: function () {
                            $t.find(".count-text").text(this.countNum);
                        }
                    });
                }

            });
        }
    }

    //Accordions
    if ($('.accordion-box').length) {
        $('.accordion-box .acc-btn').on('click', function () {
            if ($(this).hasClass('active') !== true) {
                $('.accordion-box .acc-btn').removeClass('active');
            }

            if ($(this).next('.acc-content').is(':visible')) {
                $(this).removeClass('active');
                $(this).next('.acc-content').slideUp(500);
            } else {
                $(this).addClass('active');
                $('.accordion-box .acc-content').slideUp(500);
                $(this).next('.acc-content').slideDown(500);
            }
        });
    }

    // GalleryMasonaryLayout
    function galleryMasonaryLayout() {
        if ($('.img-masonary').length) {
            $('.img-masonary').isotope({
                layoutMode: 'masonry'
            });
        }
    }

  

    // Gallery Filters
    if ($('.filter-list').length) {
        $('.filter-list').mixItUp({});
    }



    // Google Map Settings
    if ($('#map-location').length) {
        var map;

        map = new GMaps({
            el: '#map-location',
            zoom: 14,
            scrollwheel: false,
            //Set Latitude and Longitude Here
            lat: -37.817085,
            lng: 144.955631
        });

        //Add map Marker
        map.addMarker({
            lat: -37.817085,
            lng: 144.955631,
            infoWindow: {
                content: '<p style="text-align:center;"><strong>Envato</strong><br>Melbourne VIC 3000, Australia</p>'
            }

        });
    }

    // Scroll to top
    if ($('.scroll-to-top').length) {
        $(".scroll-to-top").on('click', function () {
            // animate
            $('html, body').animate({
                scrollTop: $('html, body').offset().top
            }, 1000);

        });
    }

    // Elements Animation
    if ($('.wow').length) {
        var wow = new WOW({
            boxClass: 'wow', // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: 0, // distance to the element when triggering the animation (default is 0)
            mobile: true, // trigger animations on mobile devices (default is true)
            live: true // act on asynchronously loaded content (default is true)
        });
        wow.init();
    }

	
    // contact form validatio 
    if ($('.validated-contact-form').length) {
        $('.validated-contact-form').each(function () {
            var contacForm = $(this);
            contacForm.validate({ // initialize the plugin
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    message: {
                        required: true
                    },
                    subject: {
                        required: true
                    }
                },
                submitHandler: function (form) {
                    // sending value with ajax request
                    $.post($(form).attr('action'), $(form).serialize(), function (response) {
                        $(form).find('.result').append(response);
                        $(form).find('input[type="text"]').val('');
                        $(form).find('input[type="email"]').val('');
                        $(form).find('textarea').val('');
                    });
                    return false;
                }
            });
        });
    }


    /* ==========================================================================
       When document is ready, do
       ========================================================================== */

    $(document).on('ready', function () {
        scrollToTop();
        stickyHeader();
        headerTopSearch();
        headerTopCart();
        mobileNavToggler();
        footerStyle();
    });

    /* ==========================================================================
       When document is Scrollig, do
       ========================================================================== */

    $(window).on('scroll', function () {
        scrollToTop();
        stickyHeader();
        load_owlCarousel();
        factCounter();
        galleryMasonaryLayout();
    });

    /* ==========================================================================
       When document is loading, do
       ========================================================================== */

    $(window).on('load', function () {
        handlePreloader();
        load_owlCarousel();
        galleryMasonaryLayout();
    });


    /* ==========================================================================
       When Window is resizing, do
       ========================================================================== */

    $(window).on('resize', function () {
        stickyHeader();
        footerStyle();
    });


})(window.jQuery);
