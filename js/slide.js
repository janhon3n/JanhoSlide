$(document).ready(function(){

	var showtime = parseInt($("#slide_container").attr("showtime"));
    var switchtime = parseInt($("#slide_container").attr("switchtime"));
	
	var currentSlide = 2;
	var slideCount = $("#slide_container .slide").length;
	var videoCount = $("#slide_container .vidslide").length;
	
	var delay = showtime;
	
	function switchToSlide(n){
		console.log("Switching from "+currentSlide+" to "+n);
		var current = $("#slide_container .slide:nth-child("+currentSlide+")");
		if(n < 1 || n > slideCount){
			n = 1;
		}
		var target = $("#slide_container .slide:nth-child("+n+")");
		var delayTime = showtime;
			
		//if target element is a video, use its length instead of switchtime
		//and set it to play correctly
		if(target.is('video')){
			target[0].currentTime = 0;
			target[0].play();
			delayTime = target[0].duration * 1000 - switchtime; //seconds to ms
			console.log(delayTime);
		}
		doTheSwitch(current, target, switchtime);
		currentSlide = n;
		return delayTime;
	}
	
	function switchLoop(nextSlide){
		delay = switchToSlide(nextSlide);
		
		setTimeout(function(){
			switchLoop(currentSlide + 1)
		}, delay);
	}
	switchLoop(1);
});
