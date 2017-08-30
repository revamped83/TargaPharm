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
function getData1()
{
	//alert(xHRObject.responseText);
	if ((xHRObject.readyState == 4) &&(xHRObject.status == 200))
	{
	var spantag = document.getElementById("itName");
	spantag.innerHTML = xHRObject.responseText;
	}
}
//the function will collect all the data and put to server to process
function listing1() 
{
	xHRObject.open("GET", "listing1.php?&value=" + Number(new Date), true);
	xHRObject.onreadystatechange = getData1;
    xHRObject.send(null);
}
