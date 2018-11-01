
function privategal()
{   
    //alert("working");
    var xhr;
         if (window.XMLHttpRequest) { // Mozilla, Safari, ...
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // IE 8 and older
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    xmlString = "privategal";
    
    var url = "functions/afuncs.php";
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "text/xml");
    //alert(xmlString);
    xhr.send(xmlString);
}

function loginAjax(){

    var username, pass, email, xmlString; 
    userid = document.getElementById("uname1").value;
    pass = document.getElementById("pwrd1").value;
    
    var xhr;
         if (window.XMLHttpRequest) { // Mozilla, Safari, ...
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // IE 8 and older
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    xmlString = "<userinfo>" +
    "  <uname>" + escape(userid) + "</userid>" +
    "  <password>" + escape(pwrd) + "</password>" +
    "</userinfo>";
    
    var url = "functions/login2.php";
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "text/xml");
    xhr.send(xmlString);
    
    
    }


function changeActive()
{
   // alert('OKAY!');
   // alert(window.location.href);
    var fileName = location.href.split("/").slice(-1); 
   // alert(fileName);

   if (fileName == "index.php")
   {
      var curlink = document.getElementById("home");
      var olink1 = document.getElementById("gallery");
      curlink.className = "active";
      olink1.className = "";
   }
   else
   {
    var curlink = document.getElementById("home");
    var olink1 = document.getElementById("gallery");
  
    curlink.className = "";
    olink1.className = "active";
   }
}

var images;
 window.onload = function(){
 /*    var p = document.getElementById("testy1");
    p.addEventListener("click", myFunction);

    images = document.getElementsByClassName("thumbs");
    for (var i = 0; i < images.length; i++) {
        images[i].addEventListener('click', imageFoc, false);
    } */
  
   // var x = document.getElementById("webacm");
   // x.addEventListener("click", changeActive);
    changeActive();
   
    
} 


function imageFoc(tid)
{
   alert(tid);
   var attribute = images[0].getAttribute("data-myattribute");
   alert(attribute);
}

function regtoggle()
{
    


    var x = document.getElementById("regdiv");
    var y = document.getElementById("logindiv");
    if (x.style.display === "none") {
        x.style.display = "block";
        y.style.display = "none";
    } else {
        x.style.display = "none";
        y.style.display = "block";
    }
}


function wtf()
{
    alert("wtf");
}

function logout()
{
    alert("Please come again fore de next time when the pots must do to  make and get done");
    window.location = "functions/logout.php";
}




