$(function(){
	$('#submitbtn').click(function(){
		if($('#user').val() ==='')
		{
			$('#errors').append('<p>').text("Enter Username");
			return false;
		}
	});
});