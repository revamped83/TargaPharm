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

//the function will collect all the data and put to server to process
function login() 
{
	var id  = document.getElementById("id").value;
	var pw  = document.getElementById("pw").value;
	xHRObject.open("GET", "home.php?&id=" + encodeURIComponent(id)+ "&pw=" + encodeURIComponent(pw) + "&value=" + Number(new Date), false);
	xHRObject.onreadystatechange = getData2;
    xHRObject.send(null);
}

function mouseoverPass(obj) {
  var obj = document.getElementById('pw');
  obj.type = "text";
}
function mouseoutPass(obj) {
  var obj = document.getElementById('pw');
  obj.type = "password";
}