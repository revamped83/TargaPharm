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
function getData13()
{
	alert(xHRObject.responseText);
	if ((xHRObject.readyState == 4) &&(xHRObject.status == 200))
	{
	var spantag = document.getElementById("output");
	spantag.innerHTML += xHRObject.responseText;
	}
}
//the function will collect all the data and put to server to process
function creating() 
{
	var itName  = document.getElementById("itName").value;
	var itCat  = document.getElementById("itCat").value;
	var price  = document.getElementById("price").value;
	xHRObject.open("GET", "newItem.php?&itName=" +  encodeURIComponent(itName)+ "&itCat=" + encodeURIComponent(itCat) + "&price=" + encodeURIComponent(price) + "&value=" + Number(new Date), false);
	xHRObject.onreadystatechange = getData13;
	xHRObject.send(null);
}