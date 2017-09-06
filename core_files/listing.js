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
	xHRObject.open("GET", "listing.php?&saleid=" +  encodeURIComponent(saleid)+ "&itID=" + encodeURIComponent(itID)+ "&itQuan=" + encodeURIComponent(itQuan)+"&sPrice=" + encodeURIComponent(sPrice)+ "&sid=" + encodeURIComponent("1") + "&value=" + Number(new Date), false);
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
		xHRObject.open("GET", "listing.php?&saleid=" +  encodeURIComponent(saleid)+ "&itID=" + encodeURIComponent(itID)+ "&itQuan=" + encodeURIComponent(itQuan)+"&sPrice=" + encodeURIComponent(sPrice)+ "&sid=" + encodeURIComponent("0") +"&value=" + Number(new Date), false);
		xHRObject.onreadystatechange = getData13;
		xHRObject.send(null);
	}
	
}
var x = 1;

//the function will receive respone from php and display to htm page
function getData1()
{
	//alert(xHRObject.responseText);
	if ((xHRObject.readyState == 4) &&(xHRObject.status == 200))
	{
		if (x==1)
		{
			var spantag = document.getElementById("itName");
			spantag.innerHTML = xHRObject.responseText;
		}
		else
		{
			var id = "itName" + x;
			var spantag = document.getElementById(id);
			spantag.innerHTML = xHRObject.responseText;
		}
	}
}

//the function will collect all the data and put to server to process
function listing1() 
{
		xHRObject.open("GET", "listing1.php?&value=" + Number(new Date), false);
		xHRObject.onreadystatechange = getData1;
		xHRObject.send(null);
}


//the function will receive respone from php and display to htm page
var saleid;

function getData2()
{
	alert(xHRObject.responseText);
	if ((xHRObject.readyState == 4) &&(xHRObject.status == 200))
	{
	saleid = xHRObject.responseText;
	var spantag = document.getElementById("saleid");
	spantag.innerHTML = xHRObject.responseText;
	}
}

//the function will collect all the data and put to server to process
function listing2() 
{
	xHRObject.open("GET", "listing2.php?&value=" + Number(new Date), false);
	xHRObject.onreadystatechange = getData2;
    xHRObject.send(null);
}

