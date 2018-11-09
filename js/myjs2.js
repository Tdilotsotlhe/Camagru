
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


window.onload= function(){


var logbut = document.getElementById("logbut2");
//logbut.addEventListener("click", loginAjax);

}



//////////////////////////
/////
/* function loginAjax(){
    var xhr = new XMLHttpRequest();
   var url = "functions/login2.php";
   var userid = document.getElementById("uname1").value;
    pass = document.getElementById("pwrd1").value;



}//end */

//////
function loginAjax(){

    alert('sdfsdf');
    var xmlString;
    userid = document.getElementById("uname").value;
    pass = document.getElementById("pwrd").value;
    alert(userid, pass);
    var xhr = new XMLHttpRequest();
   
    
/*     xmlString = "<userinfo>" +
    "  <uname>" + escape(userid) + "</userid>" +
    "  <password>" + escape(pwrd) + "</password>" +
    "</userinfo>"; */
    xmlString = "uname=" + escape(userid) + "&" +
    "password=" + escape(pwrd);
    var url = "functions/login2.php";
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function(){
    if (xhr.readyState == 4 && xhr.status == 200)
    {
       // alert("READY!");
        alert(xhr.responseText);
        document.getElementById("foot").innerHTML = "home";
    }
};
    

    
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
   alert(tid.id);
   imgFetch(tid.id);
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

/////newcomment
function newCom(commenter, picid) {
    alert(commenter + "  " + picid);
    //insert comment, NB****modify comment table
    var comtext = document.getElementById("comtxt");
    alert(comtext.value);

     var hr = new XMLHttpRequest();
     var url = "functions/ajaxfunction.php";
     var vars = "insertCom="+comtext.value+"&"+"picid="+picid;
     hr.open("POST", url, true);
     hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     hr.onreadystatechange = function() {
         if(hr.readyState == 4 && hr.status == 200) {
             var return_data = hr.responseText;
           //refresh comments
           alert(hr.responseText);
           document.getElementById("latest").innerHTML = comtext.value;
         }
     }
     hr.send(vars); 
     

}


////////////


function ajax_post(){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "functions/login2.php";
    var fn = document.getElementById("uname").value;
    var ln = document.getElementById("pwrd").value;
    var vars = "uname="+fn+"&pwrd="+ln;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
           // alert(return_data);
            checkResponse(hr.responseText);
          //  document.getElementById("login_error").innerHTML = return_data;
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("login_error").innerHTML = "logging in...";
}

function checkResponse(response) {
    if (response == "Login failed")
    {
        document.getElementById("login_error").innerHTML = "login failed";
    }
    else{
        document.getElementById("namebrand").innerHTML = response;
        document.getElementById("logcont").style.visibility = "hidden";
        document.getElementById("logindiv").style.visibility = "hidden";
        document.getElementById("regdiv").style.visibility = "hidden";
        homegal();
    }
}


////////////home gallery

function homegal()
{
     
     var hr = new XMLHttpRequest();
     var url = "functions/ajaxfunction.php";
     var vars = "homegal=loadit";
     hr.open("POST", url, true);
     hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     hr.onreadystatechange = function() {
         if(hr.readyState == 4 && hr.status == 200) {
             var return_data = hr.responseText;
            document.getElementById("mygal").innerHTML = return_data;
         }
     }
     hr.send(vars); 
   //  document.getElementById("maincontent").innerHTML = "loading private gallery...";
}

/////////////

////////////imgfetch

function imgFetch()
{
     
     var hr = new XMLHttpRequest();
     var url = "functions/ajaxfunction.php";
     var vars = "allpics=loadup";
     hr.open("POST", url, true);
     hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     hr.onreadystatechange = function() {
         if(hr.readyState == 4 && hr.status == 200) {
             //var return_data = hr.responseText;
            //document.getElementById("comment").innerHTML += return_data;
            var foo = JSON.parse(hr.responseText);
            console.log(foo.length);
            var count = foo.length;
            var x = 0;
            while(x < count)
            {
                console.log(foo[x][1]);
                x++;
            }
            
         }
     }
     hr.send(vars); 
    
}











