function doTheSwitch(fromEl, toEl, switchtime){
	toEl.css('left', fromEl.width());
	fromEl.css('left', 0);
	
	toEl.show();
	fromEl.animate({'left':-fromEl.width()}, switchtime, function(){
		fromEl.hide();
	});
	
	toEl.animate({'left':0}, switchtime);
}
