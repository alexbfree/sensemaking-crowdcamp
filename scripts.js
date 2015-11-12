
$(document).ready(function(){
	
	$('#form0').submit(function(){
		return validate();
	});

});

function validate() {
	var validate = true;

	// check sequence 
	$('.sequence').each(function(){
		if($(this).val() == '') {
			alert("Please pick a sequence for each piece of evidence.");
			validate = false;
			return false;
		}
	});

	// check summary
	if($('#summary').val() == '') {
		alert("Please provide a summary.");
		validate = false;
		return false;
	} 

	return validate;
}