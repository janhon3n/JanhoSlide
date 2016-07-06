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
	
	
	$("#customform input[name='fullwindow']").change(function(){
		if(this.checked){
			$("#customform input[name='width']").prop('disabled', true).parent().attr("disabl", "disabl");
			$("#customform input[name='height']").prop('disabled', true).parent().attr("disabl", "disabl");
		} else {
			$("#customform input[name='width']").prop('disabled', false).parent().attr("disabl", "no");
			$("#customform input[name='height']").prop('disabled', false).parent().attr("disabl", "no");
			
		}
	});
	
	$("#customform input[name='fixratio']").change(function(){
		if(!this.checked){
			$("#customform input[name='ratiowidth']").prop('disabled', true);
			$("#customform input[name='ratioheight']").prop('disabled', true).parent().attr("disabl", "disabl");
		} else {
			$("#customform input[name='ratiowidth']").prop('disabled', false);
			$("#customform input[name='ratioheight']").prop('disabled', false).parent().attr("disabl", "no");
			
		}
	});
});