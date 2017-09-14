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
var x = 0;
//the function will collect all the data and put to server to process
function display() 
{
	xHRObject.open("GET", "purchasesdisplay.php?&action=" + encodeURIComponent(x)+ "&value=" + Number(new Date), false);
	xHRObject.onreadystatechange = getData2;
    xHRObject.send(null);
}

function change(y)
{
	switch (y)
	{
		case 1:
		x -= 10;
		display();
		if (x < 0)
		{
			x = 0;
			display();
		}
		break;
		case 2:
		x += 10;
		display();
		break;
	}
}

function edit(z)
{
	if(!isNaN(z))
	{
		var str1 = "Please enter edited price for item";
		var str2 = "Please enter edited quantity for item";
		str1.concat(z);
		str2.concat(z);
		var itp = prompt(str1);
		var itq = prompt(str2);
		if (itp != null && itp != "" && !isNaN(itp) && !isNaN(itq) && itq != null && itq != "")
		{
			xHRObject.open("GET", "purchasesedit.php?&itid=" + encodeURIComponent(z)+ "&itp=" + encodeURIComponent(itp) + "&itq=" + encodeURIComponent(itq) +"&value=" + Number(new Date), false);
			xHRObject.onreadystatechange = function(){
				alert(xHRObject.responseText);
				location.reload();
			};
			xHRObject.send(null);
		}
	}		
}

