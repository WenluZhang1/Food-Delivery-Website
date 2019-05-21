$(document).ready(function () {
	
	$('#inputPassword4').blur(function() {
		var password = $(this).val();
		
		if(password.length == 0){
			$('#inputPassword4').css("border-color","");
			document.getElementById("passwordInvalid").innerHTML = "";
			return;
		} else{
			var xmlhttp;
			if (window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}
			else{
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
					if(password.length < 8 || password.length > 16 || !/\d/.test(password) || !/[a-z]+/.test(password)){
						$('#inputPassword4').css("border-color","red");
						document.getElementById("passwordInvalid").innerHTML=xmlhttp.responseText;
					} else{
						$('#inputPassword4').css("border-color","");
						document.getElementById("passwordInvalid").innerHTML = "";
					}
				}
			}
			xmlhttp.open("GET", "https://infs3202-35966830.uqcloud.net/Main_controller/signup_password", true);
			xmlhttp.send();
		}
	});
	
	$('#inputPhone4').blur(function() {
		var tel = $(this).val();
		
		if(tel.length != 10 || !/^\d+$/.test(tel)){
			$('#inputPhone4').css("border-color","red");
			$('#PhoneInvalid').css("display","block");
		} else{
			$('#inputPhone4').css("border-color","");
			$('#PhoneInvalid').css("display","none");
		}
	});
	
	$('#Postcode').blur(function() {
		var postcode = $(this).val();
		
		if(postcode.length != 4){
			$('#Postcode').css("border-color","red");
			$('#PostcodeInvalid').css("display", "block");
		} else{
			$('#Postcode').css("border-color","");
			$('#PostcodeInvalid').css("display","none");
		}
	});
	
	function passwordStrength(){
		var passwordCheck = document.getElementById("inputPassword4");
		passwordCheck.addEventListener('keyup', function(){
			checkPassword(passwordCheck.value);
		})
	}
	
	function checkPassword(password){
		var progressBar = document.getElementById("passwordStrength");
		var strength = 0;
		if(password.length > 8){
			strength +=1;
		}
		if(password.match(/[a-z]+/)){
			strength +=1;
		}
		if(password.match(/[A-Z]/)){
			strength +=1;
		}
		if(password.match(/[0-9]/)){
			strength +=1;
		}
		if(password.match(/[~<>?]+/)){
			strength +=1;
		}
		if(password.match(/[!@#$%^&*()]+/)){
			strength +=1;
		}
		switch(strength){
			case 0:
				progressBar.style = "width: 0%";
				break;
			case 1:
				progressBar.style = "width: 20%";
				break;
			case 2:
				progressBar.style = "width: 40%";
				break;
			case 3:
				progressBar.style = "width: 60%";
				break;
			case 4:
				progressBar.style = "width: 80%";
				break;
			case 5:
				progressBar.style = "width: 100%";
				break;
		}
	}
	passwordStrength();
	
	$('#inputUsername4').blur(function(){
		var username = $(this).val();
		$.ajax({
			url: 'https://infs3202-35966830.uqcloud.net/Main_controller/signup_username',
			method:'POST',
			data:{user_name:username},
			success:function(data){
				if(data == '1'){
					$('#inputUsername4').css("border-color","red");
					document.getElementById("usernameToken").innerHTML = "Username already be token";
				} else{
					$('#inputUsername4').css("border-color","");
					document.getElementById("usernameToken").innerHTML = "";
				}
			}
		})
		
	});
	
	$('#inputEmail4').blur(function(){
		var email = $(this).val();
		$.ajax({
			url:'https://infs3202-35966830.uqcloud.net/Main_controller/signup_email',
			method:'POST',
			data:{user_email:email},
			success:function(data){
				if(data == '1'){
					$('#inputEmail4').css("border-color","red");
					document.getElementById("emailToken").innerHTML = "Email address already be token";
				} else{
					$('#inputEmail4').css("border-color","");
					document.getElementById("emailToken").innerHTML = "";
				}
			}
		})
		
	});
});
