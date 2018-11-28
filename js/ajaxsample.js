
function example1(){

    
    var inputOne = document.getElementById("input1");
    var inputTwo = document.getElementById("input2");
    
    //alert(inputOne.getAttribute("data-shmer"));
    

        var hr = new XMLHttpRequest();
         var url = "action.php";
         var myvariables = "email="+inputOne.value+"&pass="+inputTwo.value;
         hr.open("POST", url, true);
         hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         hr.onreadystatechange = function() {
             if(hr.readyState == 4 && hr.status == 200) {
                 var return_data = hr.responseText;
                alert(return_data);
             }
         }
         hr.send(myvariables); 
    
       


}
