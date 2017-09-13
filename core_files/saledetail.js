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
function getData2()
{
	//alert(xHRObject.responseText);
	if ((xHRObject.readyState == 4) &&(xHRObject.status == 200))
	{
	var spantag = document.getElementById("output");
	spantag.innerHTML = xHRObject.responseText;
	}
}

function display() 
{
	var spantag = document.getElementById("saleid");
	spantag.innerHTML = sessionStorage.saleid;
	xHRObject.open("GET", "saledetail.php?&action=" + encodeURIComponent(sessionStorage.saleid)+ "&value=" + Number(new Date), false);
	xHRObject.onreadystatechange = getData2;
    xHRObject.send(null);
}
