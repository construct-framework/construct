sfHover = function () {
	var sfEls = document.getElementById("nav").getElementsByTagName("LI");
	for (var i = 0; i < sfEls.length; i++) {
		sfEls[i].onmouseover = function () {
			this.className += " sfhover";
		}
		sfEls[i].onmouseout = function () {
			this.className = this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);

sfHover = function () {
	var sfEls = document.getElementById("nav").getElementsByTagName("SPAN");
	for (var i = 0; i < sfEls.length; i++) {
		sfEls[i].onmouseover = function () {
			this.className += " sfhover";
		}
		sfEls[i].onmouseout = function () {
			this.className = this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);

sfHover = function () {
	var sfEls = document.getElementById("content-left").getElementsByTagName("LI");
	for (var i = 0; i < sfEls.length; i++) {
		sfEls[i].onmouseover = function () {
			this.className += " sfhover";
		}
		sfEls[i].onmouseout = function () {
			this.className = this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);

sfHover = function () {
	var sfEls = document.getElementById("content-left").getElementsByTagName("SPAN");
	for (var i = 0; i < sfEls.length; i++) {
		sfEls[i].onmouseover = function () {
			this.className += " sfhover";
		}
		sfEls[i].onmouseout = function () {
			this.className = this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);

sfHover = function () {
	var sfEls = document.getElementById("content-right").getElementsByTagName("LI");
	for (var i = 0; i < sfEls.length; i++) {
		sfEls[i].onmouseover = function () {
			this.className += " sfhover";
		}
		sfEls[i].onmouseout = function () {
			this.className = this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);

sfHover = function () {
	var sfEls = document.getElementById("content-right").getElementsByTagName("SPAN");
	for (var i = 0; i < sfEls.length; i++) {
		sfEls[i].onmouseover = function () {
			this.className += " sfhover";
		}
		sfEls[i].onmouseout = function () {
			this.className = this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover);