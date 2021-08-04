function Submit(form){
	var xhttp = new XMLHttpRequest()
	document.getElementById("result").style.color = "";
	document.getElementById("result").style.fontSize = "";
	var id = document.getElementById("searchId").value;
	xhttp.onload = function(){
		document.getElementById("result").innerHTML = this.responseText;



		if(this.responseText === "No history found.")
		{
			document.getElementById("result").style.color = "red";
			document.getElementById("result").style.fontSize = "20px";
			document.getElementById("result").style.textAlign = "center";
			document.getElementById("searchId").value = "";
		}
	}
	xhttp.open("GET", form.action + "?search=" + id, true);
	xhttp.send();
	return false;
}

function isValid(){

	var flag = true;


	var category = document.forms["form"]["category"].value;
	document.getElementById("error1").innerHTML = "";

	var receiver = document.forms["form"]["receiver"].value;
	document.getElementById("error2").innerHTML = "";


	var amount = document.forms["form"]["amount"].value;
	document.getElementById("error3").innerHTML = "";


	if(category === "")
	{
		document.getElementById("error1").innerHTML = "Category can't be empty!";
		flag = false;
	}
	if(receiver === "")
	{
		document.getElementById("error2").innerHTML = "Receiver can't be empty!";
		flag = false;
	}

	if(amount === "")
	{
		document.getElementById("error3").innerHTML = "Amount can't be empty!";
		flag = false;
	}

	return flag;
}
