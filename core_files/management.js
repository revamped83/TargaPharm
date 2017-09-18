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
	spantag.innerHTML += xHRObject.responseText;
	}
}
//the function will collect all the data and put to server to process
function csv() 
{
	var year = document.getElementById("year").value;
	if(year != null && year != "")
	{
	var a = "csv.php?&action=".concat(encodeURIComponent(year));
	document.location.href = a;
	}
	else 
	{
		var spantag = document.getElementById("output1");
		spantag.innerHTML = "</br>Pleaese select a year";
	}
}

//"<button type='button' onclick='change(1);'><</button>    <button type='button' onclick='change(2);'>></button>"
function selectyear()
{
	var yearselect = '<select id="year"><option value="">Please select a year</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option></select><input type="button" onclick="csv();" value ="Download"></input><div id="output1"></div>';
	var spantag = document.getElementById("output");
	spantag.innerHTML = yearselect;
}

function lowstock() 
{
	xHRObject.open("GET", "lowstock.php?&action=" + encodeURIComponent(0)+ "&value=" + Number(new Date), false);
	xHRObject.onreadystatechange = getData2;
    xHRObject.send(null);
}

function getdata2()
{
	//alert(xHRObject.responseText);
	if ((xHRObject.readyState == 4) &&(xHRObject.status == 200))
	{
	var spantag = document.getElementById("output");
	spantag.innerHTML = xHRObject.responseText;
	}
}

function popularbutton()
{
	var spantag = document.getElementById("output");
	spantag.innerHTML = "<button type='button' onclick='popular(1);'>Sale Quantity</button>    <button type='button' onclick='popular(2);'>Sale Times</button></br></br>";
}

function popular(num)
{
	xHRObject.open("GET", "popularitem.php?&action=" + encodeURIComponent(num)+ "&value=" + Number(new Date), false);
	xHRObject.onreadystatechange = getData2;
    xHRObject.send(null);
}

