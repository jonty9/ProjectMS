
function openForm(x){
	if(x==1){
	document.getElementById('formSignup').style.display = "block";
	}else{	
	document.getElementById('formLogin').style.display = "block";
	}
}

function closeForm() {
	document.getElementById('formLogin').style.display = "none";
	document.getElementById('formSignup').style.display = "none";
}

