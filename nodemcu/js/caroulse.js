var slideItem = 0;
window.onload = function() {
	setInterval(passarSlide, 5000);

	var slidewidth = document.getElementById("slideshow").offsetWidth;
	var objs = document.getElementsByClassName("slide");
	for(var i in objs) {
		objs[i].style.width = slidewidth;
	}
}

function passarSlide() {

	var cor = document.getElementsByClassName("bolinha");
	var slidewidth = document.getElementById("slideshow").offsetWidth;
	
	if(slideItem >= 2) {
		slideItem = 0;
	} else {
		slideItem++;
	}

	var i;
	var j;
	for (i = 0; i < cor.length; i++) {
		cor[i].style.background = "#C4C4C4";
		cor[i].style.transition = "all 0.7s ease";
		cor[i].style.transform = "scale(1.2)";
		cor[i].style.boxShadow = "2px 4px 5px #888888";

		if (slideItem != i) {
			cor[i].style.background = "#16a085";
			cor[i].style.transition = "all 0.0s ease";
			cor[i].style.transform = "scale(1.0)";
			cor[i].style.boxShadow = "0px 0px 0px";
		}

		for (j = 0; j > cor.length; i++) {
			cor[i].style.background = "#16a085";
			cor[i].style.transition = "all 0.0s ease";
			cor[i].style.transform = "scale(1.0)";
			cor[i].style.boxShadow = "0px 0px 0px";
		}
	}

	document.getElementsByClassName("slideshowarea")[0].style.marginLeft = "-"+(slidewidth * slideItem)+"px";
}


function mudarSlide(pos) {

	slideItem = pos;
	var slidewidth = document.getElementById("slideshow").offsetWidth;
	document.getElementsByClassName("slideshowarea")[0].style.marginLeft = "-"+(slidewidth * slideItem)+"px";

	var cor = document.getElementsByClassName("bolinha");
	var i;
	for (i = 0; i < cor.length; i++) {
		cor[i].style.background = "#C4C4C4";

		if (slideItem != i) {
			cor[i].style.background = "#16a085";
		}
	}
}


function toggleMenu() {

	var menu = document.getElementById("menu");

	if (menu.style.display == 'none' || menu.style.display == '') {
		menu.style.display = "block";
	} else {
		menu.style.display = "none";
	}
}
