$(document).ready(function () {	
	$('#searchBar').keyup(function(){
		var xmlhttp;
		var keyword = $(this).val();
		if (window.XMLHttpRequest){
			xmlhttp=new XMLHttpRequest();
		}
		else{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("searchResult").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET", 'https://infs3202-35966830.uqcloud.net/Main_controller/autoSearch?value=' + keyword, true);
		xmlhttp.send();

	});
});