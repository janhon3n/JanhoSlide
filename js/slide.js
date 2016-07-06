$(document).ready(function(){

	var showtime = parseInt($("#slide_container").attr("showtime"));
	
	var currentSlide = 2;
	var slideCount = $("#slide_container .slide").length;
	var videoCount = $("#slide_container .vidslide").length;

	function switchToSlide(n){
		console.log("Switching from "+currentSlide+" to "+n);
		var current = $("#slide_container .slide:nth-child("+currentSlide+")");
		if(n < 1 || n > slideCount){
			n = 1;
		}
		var target = $("#slide_container .slide:nth-child("+n+")");
		doTheSwitch(current, target);
		currentSlide = n;
	}
	
	function switchToNext(){
		var n = currentSlide + 1;
		if(n > slideCount){
			n = 1;
		}
		switchToSlide(n);
	}

	switchToSlide(1);
	var switcher = setInterval(function(){
		switchToNext();
	}, showtime);
});
