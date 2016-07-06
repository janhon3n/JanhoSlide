$(document).ready(function(){

	function clearAllImg(){
		$("#customform img.changeimg").attr("chosenone", "no");
	}

	$("#customform img.changeimg").click(function(){
		clearAllImg();
		$("#customform input#changetype").val($(this).attr("changetype"));
		$(this).attr("chosenone", "chosenone");
	});
	
	
	//fix becouse sometimes when returning from the show page the default changetype would be highlighted
	//but the hidden attribute changetype would still be the last chosen one
	$("#customform img.changeimg").each(function(){
		if($(this).attr("chosenone") == "chosenone"){
			$("#customform input#changetype").val($(this).attr("changetype"));
		}
	});
});