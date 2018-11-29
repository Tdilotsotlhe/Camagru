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
"  <uname>" + escape(userid) + "</uname>" +
"  <password>" + escape(pwrd) + "</password>" +
"</userinfo>";

var url = "../functions/login2.php";
xhr.open("POST", url, true);
xhr.setRequestHeader("Content-Type", "text/xml");
xhr.send(xmlString);

}



function ajaxsavepic(){

     var xmlString; 
    ogimg = document.getElementById("img64").value;
    newimg = document.getElementById("emoji64").value;
    
    var xhr;
         if (window.XMLHttpRequest) { // Mozilla, Safari, ...
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // IE 8 and older
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    xmlString = "<picinfo>" +
    "  <ogimg>" + ogimg + "</ogimg>" +
    "  <newimg>" + newimg + "</ogimg>" +
    "</picinfo>";
    
    var url = "../functions/webupload.php";
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "text/xml");
    xhr.send(xmlString); 
    
    }



    
    function ajaxupload() {
        //alert("ajuploaddh running");
        var hr = new XMLHttpRequest();
         var url = "functions/upload.php";
         var thefile = document.getElementById("userpic").files[0];
        var formData = new FormData();
        formData.append("userpic", thefile);
         hr.open("POST", url, true);
         hr.onreadystatechange = function() {
             if(hr.readyState == 4 && hr.status == 200) {
                 var return_data = hr.responseText;
                alert(return_data);
             }
         }
         hr.send(formData); 
    
       
        }








        function forgpassmail() {

       
            var theemail = document.getElementById("forgotemail").value;
            //alert(theemail);
            var hr = new XMLHttpRequest();
            var url = "functions/ajaxfunction.php";
            var vars = "forgotemail="+theemail;
            hr.open("POST", url, true);
            hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            hr.onreadystatechange = function() {
            if(hr.readyState == 4 && hr.status == 200) {
                var return_data = hr.responseText;
                alert(return_data);
               // location.replace("index.php");
                }
            }
            hr.send(vars);
        }

   