//module pattern
//unabtrusive java script
var w1D1 = {
	'init' : function(){
		console.log(document.getElementById("submitbtn"));
		//document.getElementById('submitBtn').onclick = w1D1.validate1;
	},
	'validate1' : function(){

		var user = document.getElementById("user").value;

		if(user.length === 0)
		{
			document.getElementById('errors').innerHTML = "Please enter user name";
			return false;
		}
	}
};

window.onload = w1D1.init();