var xHRObject = false;
if (window.XMLHttpRequest)
{
xHRObject = new XMLHttpRequest();
}
else if (window.ActiveXObject)
{
xHRObject = new ActiveXObject("Microsoft.XMLHTTP");
}
//the function will receive respone from php and display to htm page
var saleid;
function getData2()
{
	alert(xHRObject.responseText);
	if ((xHRObject.readyState == 4) &&(xHRObject.status == 200))
	{
	saleid = xHRObject.responseText; 
	}
}
//the function will collect all the data and put to server to process
function listing2() 
{
	xHRObject.open("GET", "listing2.php?&value=" + Number(new Date), true);
	xHRObject.onreadystatechange = getData2;
    xHRObject.send(null);
}
