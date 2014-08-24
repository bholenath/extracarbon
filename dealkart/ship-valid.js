function ship()
{
	if(shipfrm.fname.value=='')
	{
		alert("Enter First Name");
		return false;
	}
	if(shipfrm.lname.value=='')
	{
		alert("Enter Last Name");
		return false;
	}
	
	var x=shipfrm.email.value;
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
	{
		alert("Enter valid e-mail address");
		return false;
	}
	if(shipfrm.add.value=='')
	{
		alert("Enter Address ");
		return false;
	}
	var phn=shipfrm.phone.value;
	if(phn.length<1 || phn.length<10 || phn.length>10 || isNaN(phn))
	{
		alert("Enter Valid Phone Number in Numeric Format");
		return false;
	}
	if(shipfrm.city.value=='')
	{
		alert("Enter City");
		return false;
	}
	if(shipfrm.state.value=='')
	{
		alert("Enter State");
		return false;
	}
	var pcode=shipfrm.zcode.value;
	if(pcode.length<1 || pcode.length<6 || pcode.length>6 || isNaN(pcode))
	{
		alert("Enter Valid Pin Code");
		return false;
	}
	else
		return true;
}
