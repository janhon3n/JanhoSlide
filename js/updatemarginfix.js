var ratiowidth = parseInt($("#slide_container").attr("ratiowidth"));
var ratioheight = parseInt($("#slide_container").attr("ratioheight"));

var heightfix = 0;
var widthfix = 0;

var width = $(window).width();
var height = $(window).height();


$(window).resize(function(){
	updateMargins();
});

function updateMargins(){
	widthfix = 0;
	heightfix = 0;
	width = $(window).width();
	height = $(window).height();
	var newheight = height;
	var newwidth = width;
	
	if(width * ratioheight <= height * ratiowidth){
		newheight = (width * ratioheight) / ratiowidth;
		heightfix = (height - newheight) / 2;
	} else if(width * ratioheight > height * ratiowidth){
		newwidth = (height * ratiowidth) / ratioheight;
		widthfix = (width - newwidth) / 2;
	}

	console.log("Calculating margins: "+width+" "+height+" "+widthfix+" "+heightfix);
	
	$("#slide_container").css({
			"width": newwidth+"px",
			"height": newheight+"px",
			"margin-left":widthfix+"px",
			"margin-top":heightfix+"px"
			});
}

updateMargins();
