//result function for check credit and logout. If credit is not valid, it will alert and redirect to home.htm. For logout ,it will alert and redirect to home.htm
function result()
{
	if ((xHRObject.readyState == 4) &&(xHRObject.status == 200))
	{
		if (xHRObject.responseText == 1)
		{
			alert("Session Expired. Please login again");
			window.location = "home.htm";
			return 1;
		}
		else if (xHRObject.responseText == 2)
		{
			alert("Successfully logged out.");
			window.location = "home.htm";
			return 2;
		}
		return 0;
	}
}
function result1()
{
	if ((xHRObject.readyState == 4) &&(xHRObject.status == 200))
	{
		if (xHRObject.responseText == 3)
		{
			alert("Session Expired. Please login again");
			window.location = "home.htm";
		}
		else if (xHRObject.responseText == 2)
		{
			alert("Your access level: staff. Insufficient access level.");
			//history.back();
			window.location = "home.htm";
		}
	}
}
//check credit function
function checkcre() 
{
	xHRObject.open("GET", "checkcred.php", false);
	xHRObject.onreadystatechange = result;
    xHRObject.send(null);
}
//log out function
function logout()
{
	xHRObject.open("GET", "logout.php", false);
	xHRObject.onreadystatechange = result;
    xHRObject.send(null);
}
//check credit function
function checkcreadmin() 
{
	xHRObject.open("GET", "checkcredadmin.php", false);
	xHRObject.onreadystatechange = result1;
    xHRObject.send(null);
}
