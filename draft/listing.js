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
function listing() 
{
	var itID  = document.getElementById("itName").value;
	var itQuan  = document.getElementById("itQuan").value;
	var sPrice  = document.getElementById("sPrice").value;
	xHRObject.open("GET", "listing.php?&saleid=" +  encodeURIComponent(saleid)+ "&itID=" + encodeURIComponent(itID)+ "&itQuan=" + encodeURIComponent(itQuan)+"&sPrice=" + encodeURIComponent(sPrice)+ "&value=" + Number(new Date), true);
	xHRObject.onreadystatechange = getData13;
	xHRObject.send(null);
	for (i=1; i < x; i++)
	{
		a =  i+1;
		b = "itName"+a;
		c = "itQuan"+a;
		d = "sPrice"+a;
		var itID  = document.getElementById(b).value;
		var itQuan  = document.getElementById(c).value;
		var sPrice  = document.getElementById(d).value;
		xHRObject.open("GET", "listing.php?&saleid=" +  encodeURIComponent(saleid)+ "&itID=" + encodeURIComponent(itID)+ "&itQuan=" + encodeURIComponent(itQuan)+"&sPrice=" + encodeURIComponent(sPrice)+ "&value=" + Number(new Date), true);
		xHRObject.onreadystatechange = getData13;
		xHRObject.send(null);
	}
	
}
