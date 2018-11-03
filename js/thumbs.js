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