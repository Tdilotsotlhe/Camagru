/////load thumbnails
/* window.addEventListener('load', ajaxthumbs, false);

function ajaxthumbs() {
   // alert("ajax thumbs");
    thumbdiv = document.getElementById("thumbnails");

 var hr = new XMLHttpRequest();
 var url = "functions/ajaxfunction.php";

 var vars = "thumby=SHO";
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





function imgFetch()
{
     //alert("sdsdsdsd");
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
            console.log(foo);
         }
     }
     hr.send(vars); 
     document.getElementById("comment").innerHTML = "Comments";
}

/////////////window.addEventListener('load', alert("asdasd"), false);

// function ajaxupload() {
//     alert("ajupload running");
//     var hr = new XMLHttpRequest();
//      var url = "functions/upload.php";
//      var vars = "userpic="+document.getElementById("userpic").value;
// /*      var formData = new FormData();
//     formData.append("userpic", document.getElementById("userpic").value);
//     console.log(document.getElementById("userpic").value); */ 
// //
//      hr.open("POST", url, true);
//      hr.setRequestHeader("Content-type", "multipart/form-data");
//      hr.onreadystatechange = function() {
//          if(hr.readyState == 4 && hr.status == 200) {
//              var return_data = hr.responseText;
//             alert(return_data);
//          }
//      }
//      hr.send(formData); 

   
//     }


function privImageFoc(tid)
{
    var el = document.getElementById(tid.id);
    imgid = el.getAttribute('data-id');
   //alert(imgid);
   //alert(el);
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
            //console.log(foo);
            addCom.innerHTML = foo;
         }
     }
     hr.send(vars); 
}


function delpic(theuser, thepic){
     alert("OK");
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
            ajaxthumbs();
            document.getElementById("comment").innerHTML="";
         }
     }
     hr.send(vars);
}

