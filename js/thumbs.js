/////load thumbnails
window.addEventListener('load', ajaxthumbs, false);

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
}





function imgFetch()
{
     alert("sdsdsdsd");
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

function ajaxupload() {
    alert("ajupload running");
    var hr = new XMLHttpRequest();
     var url = "functions/upload.php";
    // var vars = "userpic="+document.getElementById("userpic").value;
     var formData = new FormData();
    formData.append("userpic", document.getElementById("userpic").value);
    console.log(document.getElementById("userpic").value); 
//
     hr.open("POST", url, true);
     hr.setRequestHeader("Content-type", "multipart/form-data");
     hr.onreadystatechange = function() {
         if(hr.readyState == 4 && hr.status == 200) {
             var return_data = hr.responseText;
            alert(return_data);
         }
     }
     hr.send(formData); 

   
    }


var nextBtn = document.getElementById("next");
var prevBtn = document.getElementById("prev");
window.onload = function () {
    nextBtn.addEventListener("click", test1, false);
prevBtn.addEventListener("click", test1, false);    
}


function test1(){
    alert("OK");
}