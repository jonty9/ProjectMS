
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

function validation(){
	var fname = document.getElementById('fname').value;
	var lnamename = document.getElementById('lname').value;
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	
	var fname_check = /^[A-Za-z. ]{3,30}$/;
	var lname_check = /^[A-Za-z. ]{3,30}$/;
	var passwordcheck = /^(?=.*[0-9])(?=.*[!@#$%^&*])/[a-zA-z0-9!@#$%^&*]{8,16}/;
	var email_check = /^[A-Za-z0-9_.]{3,}@[A-za-z]{3,}[.]{1}[A-za-z.]{2,6}$/;
	
	if(fname_check.test(fname)){
		document.getElementById('fnameerror').innerHTML = "";
	}else{
		document.getElementById('fnameerror').innerHTML ="** First Name is Invalid";
		return false;
	}
	if(lname_check.test(lname)){
		document.getElementById('lnameerror').innerHTML = "";
	}else{
		document.getElementById('lnameerror').innerHTML ="** Last Name is Invalid";
		return false;
	}
	if(email_check.test(email)){
		document.getElementById('emailerror').innerHTML = "";
	}else{
		document.getElementById('emailerror').innerHTML ="** Email is Invalid";
		return false;
	}
	if(password_check.test(fname)){
		document.getElementById('passworderror').innerHTML = "";
	}else{
		document.getElementById('passworderror').innerHTML ="** Password is Invalid";
		return false;
	}
}