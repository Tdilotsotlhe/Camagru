
function likepic(theuid, imgid)
{
  // alert(theuid+" "+imgid);
   //$sql = "INSERT INTO likes (theimg_id,likers_id,likestatus) VALUES (:img,:lid,:lst) ON DUPLICATE KEY UPDATE likestatus=IF(likestatus=1, 0, 1)";
     var hr = new XMLHttpRequest();
     var url = "functions/ajaxfunction.php";
     var vars = "theid="+theuid+"&picid="+imgid;
     hr.open("POST", url, true);
     hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     hr.onreadystatechange = function() {
         if(hr.readyState == 4 && hr.status == 200) {
             //alert("DAMN!");
             var return_data = hr.responseText;
             var ih =  document.getElementById('likebtn');
             if(ih.innerText == "LIKE")
             {
                 document.getElementById('likebtn').innerHTML="UNLIKE";
                }else{
                    document.getElementById('likebtn').innerHTML="LIKE";
                }
         }
     }
     hr.send(vars);  
}

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


    var xmlString;
    userid = document.getElementById("uname").value;
    pass = document.getElementById("pwrd").value;

    var xhr = new XMLHttpRequest();
   
    

    xmlString = "uname=" + escape(userid) + "&" +
    "password=" + escape(pwrd);
    var url = "functions/login2.php";
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function(){
    if (xhr.readyState == 4 && xhr.status == 200)
    {
 
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
   //alert(tid.id);
   //imgFetch(tid.id);
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
    //("wtf");
}

function logout()
{
    alert("Please come again fore de next time when the pots must do to  make and get done");
    window.location = "functions/logout.php";
}

/////newcomment
function newCom(commenter, picid) {
   // alert(commenter + "  " + picid);
    //insert comment, NB****modify comment table
    var comtext = document.getElementById("comtxt");
  //  alert(comtext.value);

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
   // alert("wtf");
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
            alert(return_data);
           checkResponse(hr.responseText);
            
          //  document.getElementById("login_error").innerHTML = return_data;
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("login_error").innerHTML = "logging in...<br><img class='w3-spin' src='img/loa.png'>";
}




function checkResponse(response) {
    if (response == "Login failed" || response == "No results")
    {
        //alert("login error");
        document.getElementById("login_error").innerHTML = "login failed";
    }
    else{
        //alert("WTFFFF");
        location.replace("index.php");
/*         document.getElementById("namebrand").innerHTML = response;
        document.getElementById("logcont").style.visibility = "hidden";
        document.getElementById("logindiv").style.visibility = "hidden";
        document.getElementById("regdiv").style.visibility = "hidden"; */
       // homegal();
       
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
////////new custom pagination attempt
/* function test1(){
    alert(myPage);
    myPage++;
    alert(myPage);
} */
var myPage = 1;
var myOffset = 0;
var numPics = countPics();

if(myOffset > numPics)
{
    document.getElementById("nextstep").style.visibility = "hidden";
}
//if offset < 0 disable previous

function nextpage(){
   // alert(numPics);
    if (myPage >= Math.ceil(numPics/5)){
        mypage = 1;
    }else{
        myPage++;
    }
   //findway to manage offset
   myOffset = +myOffset + 5;
   if (+myOffset > numPics)
    {
        myOffset = 0;
        document.getElementById("pagecounter").innerHTML = mypage + "/" + Math.ceil(numPics/5);
    }else{
        document.getElementById("pagecounter").innerHTML = myPage + "/" + Math.ceil(numPics/5);
    }
    fetchPicSet(myPage, myOffset);
    
}

function prevpage(){
   // alert(numPics);
   if (myPage <= 0){
    mypage = 1;
    }else{
        myPage--;
    }
    //alert(myPage);
    myOffset = +myOffset - 5;
    if (myOffset < 0)
    {
        myOffset = 0;
        document.getElementById("pagecounter").innerHTML = "1" + "/" + Math.ceil(numPics/5);
    }else{
        document.getElementById("pagecounter").innerHTML = myPage + "/" + Math.ceil(numPics/5);
    }
        fetchPicSet(myPage, myOffset);
    
    
}
/////////////
window.onload = function(){
    fetchPicSet(0,0);

    //ajaxthumbs();
}

function    fetchPicSet(page, offs){

    var galsel = document.getElementById("galtype").value;
     var hr = new XMLHttpRequest();
     var url = "functions/ajaxfunction.php";
     var vars = "page="+page+"&offset="+offs+"&galtype="+galsel;
     hr.open("POST", url, true);
     hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     hr.onreadystatechange = function() {
         if(hr.readyState == 4 && hr.status == 200) {
            var foo = JSON.parse(hr.responseText);
          //  console.log(foo);
            var count = foo.length;
            var x = 0;

            var picdiv = document.getElementById("pagegal");
            var selprev = document.getElementById("selprev");
            picdiv.innerHTML="";
            
                for(var w = 0;w< count;w++){

                var newimg = document.createElement("IMG");
                newimg.setAttribute("id", "img"+w);
                newimg.setAttribute("data-id", foo[w][0]);
             
                newimg.style.height = "100px";
                newimg.style.width = "100px";
                newimg.src = "img/gal/"+foo[w][1];
                if(galsel == "private"){
                newimg.setAttribute("onclick", "imageComment(this)");
                }else if(galsel == "public"){
                    newimg.setAttribute("onclick", "imagePublic(this)");
                }else if(galsel == "fullgal"){
                    newimg.setAttribute("onclick", "imageFull(this)");
                }
                newimg.className = "w3-mobile w3-image w3-animate-opacity w3-hover-opacity";
                picdiv.appendChild(newimg);
                
            }
         }
     }
     hr.send(vars); 
}




function countPics(){

    var hr = new XMLHttpRequest();
     var url = "functions/ajaxfunction.php";
     var vars = "countpics=yup";
     hr.open("POST", url, true);
     hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     hr.onreadystatechange = function() {
         if(hr.readyState == 4 && hr.status == 200) {
            var foo = hr.responseText;
            console.log(foo);
            numPics = foo;
         }
     }
     hr.send(vars); 
}


function imageComment(tid)
{
    var el = document.getElementById(tid.id);
    imgid = el.getAttribute('data-id');
  // alert(imgid);
   //loadcomment
   var addCom = document.getElementById("comment");
   var prevsel = document.getElementById("selprev");
   prevsel.src = el.src;
   var hr = new XMLHttpRequest();
     var url = "functions/ajaxfunction.php";
     var vars = "imgid="+imgid;
     hr.open("POST", url, true);
     hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     hr.onreadystatechange = function() {
         if(hr.readyState == 4 && hr.status == 200) {
            var foo = hr.responseText;
            addCom.innerHTML = foo;
         }
     }
     hr.send(vars); 

}


function imageFull(tid)
{
    var el = document.getElementById(tid.id);
    imgid = el.getAttribute('data-id');
  // alert(imgid);
   //loadcomment
   var addCom = document.getElementById("comment");
   var prevsel = document.getElementById("selprev");
   prevsel.src = el.src;
   var hr = new XMLHttpRequest();
     var url = "functions/ajaxfunction.php";
     var vars = "imgidfull="+imgid;
     hr.open("POST", url, true);
     hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     hr.onreadystatechange = function() {
         if(hr.readyState == 4 && hr.status == 200) {
            var foo = hr.responseText;
            addCom.innerHTML = foo;
         }
     }
     hr.send(vars); 

}



function imagePublic(tid)
{
    var el = document.getElementById(tid.id);
   var prevsel = document.getElementById("selprev");
   prevsel.src = el.src;
}

function loginmodal(){
    document.getElementById('id01').style.display='block'
}

function delpic(theuser, thepic){
    //alert("OK");
  //loadcomment
  var hr = new XMLHttpRequest();
    var url = "functions/ajaxfunction.php";
    var vars = "delpicid="+thepic;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
           var foo = hr.responseText;
           //console.log(foo);
           alert(foo);
           //ajaxthumbs();
           document.getElementById("comment").innerHTML="";
        }
    }
    hr.send(vars);
}




///////////////ajax reg code

/* document.getElementById("regform").submit(function(e){
e.preventDefault();
alert("stopping");
}); */

function ValidateEmail(mail) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
  {
    return (true)
  }
    alert("You have entered an invalid email address!")
    return (false)
}


function ajax_register(){
    // Create our XMLHttpRequest object
   // alert("wtf");
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "functions/register.php";
    var usern = document.getElementById("uname1").value;
    var pass1 = document.getElementById("pwrd1").value;
    var pass2 = document.getElementById("pwrd2").value;
    var email = document.getElementById("email").value;
    
    if(ValidateEmail(email) == false)
    {
        alert("tseks");
        return false;
    }

    var regStr = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    if (pass1 != pass2){
        alert("Passwords do not match");
        return false;
    }else if (pass1 == pass2 && regStr.test(pass1) != 1){
       
        alert("regex fail");
        return false;
    }else{
    


    var vars = "uname1="+usern+"&pwrd="+pass1+"&pwrd1="+pass2+"&email="+email;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
            //alert(return_data);
            if(return_data[0] == "E"){
                alert("Registration failed, please check all fields");

            }else{
                alert("Registration successful");
                location.replace("index.php");
            }
           //checkResponse(hr.responseText);
            
          //  document.getElementById("login_error").innerHTML = return_data;
	    }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("login_error").innerHTML = "logging in...<br><img class='w3-spin' src='img/loa.png'>";
}
}




function checkRegResponse(response) {
    if (response == "Registration Failed" || response == "No results")
    {
        //alert("login error");
        document.getElementById("reg_error").innerHTML = "login failed";
    }
    else{
        //alert("WTFFFF");
        location.replace("index.php?regstatus=1");
/*         document.getElementById("namebrand").innerHTML = response;
        document.getElementById("logcont").style.visibility = "hidden";
        document.getElementById("logindiv").style.visibility = "hidden";
        document.getElementById("regdiv").style.visibility = "hidden"; */
       // homegal();
       
    }
}

/* function ajaxthumbs() {
     alert("ajax thumbs");
     thumbdiv = document.getElementById("thumbnails");
 
  var hr = new XMLHttpRequest();
  var url = "functions/ajaxfunction.php";
 
  var vars = "newthumby=SHO";
  hr.open("POST", url, true);
  // Set content type header information for sending url encoded variables in the request
  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  // Access the onreadystatechange event for the XMLHttpRequest object
  hr.onreadystatechange = function() {
      if(hr.readyState == 4 && hr.status == 200) {
          var return_data = hr.responseText;
         // alert(return_data);
          //checkResponse(hr.responseText);
          document.getElementById("thumbnails").innerHTML = return_data;
      }
  }
  // Send the data to PHP now... and wait for response to update the status div
  hr.send(vars); // Actually execute the request
  document.getElementById("thumbnails").innerHTML = "loading thumbs...";
 } */
