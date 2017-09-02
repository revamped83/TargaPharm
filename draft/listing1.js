var xHRObject1 = false;
if (window.XMLHttpRequest)
{
xHRObject1 = new XMLHttpRequest();
}
else if (window.ActiveXObject)
{
xHRObject1 = new ActiveXObject("Microsoft.XMLHTTP");
}

var x = 1;

//the function will receive respone from php and display to htm page
function getData1()
{
	//alert(xHRObject1.responseText);
	if ((xHRObject1.readyState == 4) &&(xHRObject1.status == 200))
	{
		if (x==1)
		{
			var spantag = document.getElementById("itName");
			spantag.innerHTML = xHRObject1.responseText;
		}
		else
		{
			var id = "itName" + x;
			var spantag = document.getElementById(id);
			spantag.innerHTML = xHRObject1.responseText;
		}
	}
}

//the function will collect all the data and put to server to process
function listing1() 
{
		xHRObject1.open("GET", "listing1.php?&value=" + Number(new Date), true);
		xHRObject1.onreadystatechange = getData1;
		xHRObject1.send(null);
}