function doTheSwitch(fromEl, toEl){
	var switchtime = parseInt($("#slide_container").attr("switchtime"));
	toEl.css('left', -fromEl.width());
	fromEl.css('left', 0);
	
	toEl.show();
	fromEl.animate({'left':fromEl.width()}, switchtime, function(){
		fromEl.hide();
	});
	toEl.animate({'left':0}, switchtime);
}