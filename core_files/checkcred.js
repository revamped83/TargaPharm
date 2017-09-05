//result function for check credit and logout. If credit is not valid, it will alert and redirect to login.htm. For logout ,it will alert and redirect to login.htm
function result()
{
	if ((xHRObject.readyState == 4) &&(xHRObject.status == 200))
	{
		if (xHRObject.responseText == 1)
		{
			alert("Session Expired. Please login again");
			window.location = "login.htm";
			return 1;
		}
		else if (xHRObject.responseText == 2)
		{
			alert("Successfully logged out. Thanks for using ShopOnline!!");
			window.location = "login.htm";
			return 2;
		}
		return 0;
	}
}
//check credit function
function checkcre() 
{
	xHRObject.open("GET", "checkcred.php", true);
	xHRObject.onreadystatechange = result;
    xHRObject.send(null);
}
//log out function
function logout()
{
	xHRObject.open("GET", "logout.php", true);
	xHRObject.onreadystatechange = result;
    xHRObject.send(null);
}
