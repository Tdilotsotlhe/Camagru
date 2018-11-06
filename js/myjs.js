
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
////////new custom pagination attempt
/* function test1(){
    alert(myPage);
    myPage++;
    alert(myPage);
} */
var myPage = 1;
var myOffset = 0;
//var numPics = 0;
var numPics = countPics();
//var numPage = Math.ceil(numPics/4);

///if offset > numpics disable next;
if(myOffset > numPics)
{
    document.getElementById("nextstep").style.visibility = "hidden";
}
//if offset < 0 disable previous

function nextpage(){
   // alert(numPics);
    if (myPage >= Math.ceil(numPics/4)){
        mypage = 1;
    }else{
        myPage++;
    }
   //findway to manage offset
   myOffset = +myOffset + 4;
   if (+myOffset > numPics)
    {
        myOffset = 0;
        document.getElementById("pagecounter").innerHTML = mypage + "/" + Math.ceil(numPics/4);
    }else{
        document.getElementById("pagecounter").innerHTML = myPage + "/" + Math.ceil(numPics/4);
    }
    fetchPicSet(myPage, myOffset);
    
}

function prevpage(){
   // alert(numPics);
   if (myPage < 0){
    mypage = 1;
    }else{
        myPage--;
    }
    //alert(myPage);
    myOffset = +myOffset - 4;
    if (myOffset < 0)
    {
        myOffset = 0;
        document.getElementById("pagecounter").innerHTML = "1" + "/" + Math.ceil(numPics/4);
    }else{
        document.getElementById("pagecounter").innerHTML = myPage + "/" + Math.ceil(numPics/4);
    }
        fetchPicSet(myPage, myOffset);
    
    
}
/////////////
window.onload = function(){
    fetchPicSet(0,0);
}

function    fetchPicSet(page, offs){
   // alert(page);
   // alert(offs);

    var hr = new XMLHttpRequest();
     var url = "functions/ajaxfunction.php";
     var vars = "page="+page+"&offset="+offs;
     hr.open("POST", url, true);
     hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     hr.onreadystatechange = function() {
         if(hr.readyState == 4 && hr.status == 200) {
            var foo = JSON.parse(hr.responseText);
          //  console.log(foo);
            var count = foo.length;
            var x = 0;
            //if results are less than 4 disable button
            //subtract count from offset maybe?

            //clear image srcs or delete imgs
            var picdiv = document.getElementById("pagegal");
           
            picdiv.innerHTML="";
            
               /*  document.getElementById("pic0").src = "#";
                document.getElementById("pic1").src = "#";
                document.getElementById("pic2").src = "#";
                document.getElementById("pic3").src = "#"; */
                
           /*  while(x < count)
            { *///////
                for(var w = 0;w< count;w++){
                //modify srcs or append images
                //append img
                var newimg = document.createElement("IMG");
                newimg.setAttribute("id", "img"+foo[x][0]);
                newimg.setAttribute("data-id", foo[w][0]);
             
                
                newimg.style.height = "100px";
                newimg.style.width = "100px";
                newimg.src = "img/gal/"+foo[w][1];
                picdiv.appendChild(newimg);
                newimg.setAttribute("onclick", "imageComment(this)");

               // newimg.onclick(imageComment(newimg));
               // addEventListener("click", imageComment(newimg), false);
               // alert(foo[x][1]);
                //mod sources
                //document.getElementById("pic"+x).src = "img/gal/" + foo[x][1];
                //document.getElementById("pic"+x).setAttribute("data-id", foo[x][0]);
               // console.log(foo[x][1]);
                /////////append

                //x++;
            /*     } */
                ///////
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

   var hr = new XMLHttpRequest();
     var url = "functions/ajaxfunction.php";
     var vars = "imgid="+imgid;
     hr.open("POST", url, true);
     hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     hr.onreadystatechange = function() {
         if(hr.readyState == 4 && hr.status == 200) {
            var foo = hr.responseText;
            console.log(foo);
            addCom.innerHTML = foo;
         }
     }
     hr.send(vars); 

}