function doTheSwitch(fromEl, toEl){
	var switchtime = parseInt($("#slide_container").attr("switchtime"));
	fromEl.fadeOut(switchtime);
	toEl.fadeIn(switchtime);
}