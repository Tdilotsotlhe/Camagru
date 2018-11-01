function loginAjax(){
alert("Tsek");
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

var url = "../functions/login2.php";
xhr.open("POST", url, true);
xhr.setRequestHeader("Content-Type", "text/xml");
xhr.send(xmlString);

}

function ajaxsavepic(){
    alert("Tsek");
     var xmlString; 
    ogimg = document.getElementById("img64").value;
    newimg = document.getElementById("emoji64").value;
    
    var xhr;
         if (window.XMLHttpRequest) { // Mozilla, Safari, ...
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // IE 8 and older
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    xmlString = "<userinfo>" +
    "  <uname>" + escape(userid) + "</userid>" +

    "</userinfo>";
    
    var url = "../functions/webupload.php";
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "text/xml");
    xhr.send(xmlString); 
    
    }