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
function getData()
{
	//alert(xHRObject.responseText);
	if ((xHRObject.readyState == 4) &&(xHRObject.status == 200))
	{
	var spantag = document.getElementById("output");
	spantag.innerHTML = xHRObject.responseText;
	}
}
//the function will collect all the data and put to server to process
function listing() 
{
	var itName  = document.getElementById("itName").value;
	var itQuan  = document.getElementById("itQuan").value;
	var sPrice  = document.getElementById("sPrice").value;
	xHRObject.open("GET", "listing.php?&itName=" +  encodeURIComponent(itName)+ "&itQuan=" + encodeURIComponent(itQuan)+ "&sPrice=" + encodeURIComponent(sPrice)+ "&value=" + Number(new Date), true);
	xHRObject.onreadystatechange = getData;
    xHRObject.send(null);
}
