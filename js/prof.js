

window.onload = function(){
    var curuser = document.getElementById("curuser");
    var curemail = document.getElementById("curemail");
//var curnotif = document.getElementById("curemail");
    loadcurdetails();
    var cb =  document.getElementById("notcheckbox");
    cb.addEventListener("click", function(event){
       notifupd();
   });
  }

  function loadcurdetails()
  {
    //alert("OK");
    var hr = new XMLHttpRequest();
      var url = "functions/ajaxfunction.php";
      var vars = "getuser=me";
      hr.open("POST", url, true);
      hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      hr.onreadystatechange = function() {
          if(hr.readyState == 4 && hr.status == 200) {
             var foo = JSON.parse(hr.responseText);
            curuser.innerHTML = "username: "+foo['username'];
            curemail.innerHTML = "email: "+foo['email'];
            curnotif.innerHTML = foo['notification'];
            if (foo['notification'] == 1)
            {
                document.getElementById("notcheckbox").checked= true;
            }else{
                document.getElementById("notcheckbox").checked= false;
            }
            
          }
      }
      hr.send(vars);
  }

  function  notifupd(){

    
      var hr = new XMLHttpRequest();
      var url = "functions/ajaxfunction.php";
   var vars = "notiftog=toggle";
      hr.open("POST", url, true);
      hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function() {
          if(hr.readyState == 4 && hr.status == 200) {
             
           loadcurdetails();

          }
      }
      hr.send(vars); 
  }

  function changeuser(){
      var nn = document.getElementById("newname").value;
    //  alert(nn);
      var hr = new XMLHttpRequest();
      var url = "functions/ajaxfunction.php";
      var vars = "newname="+nn;
      hr.open("POST", url, true);
      hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      hr.onreadystatechange = function() {
          if(hr.readyState == 4 && hr.status == 200) {
             //var foo = JSON.parse(hr.responseText);
           loadcurdetails();
           //alert(foo);
          }
      }
      hr.send(vars);

  }


  function ValidateEmail(mail) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
  {
    return (true)
  }
    alert("You have entered an invalid email address!")
    return (false)
}


  function changeemail(){
    var nn = document.getElementById("newemail").value;
    //  alert(nn);

    if(ValidateEmail(nn) == false)
    {
     //   alert("tseks");
        return false;
    }

      var hr = new XMLHttpRequest();
      var url = "functions/ajaxfunction.php";
      var vars = "newemail="+nn;
      hr.open("POST", url, true);
      hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      hr.onreadystatechange = function() {
          if(hr.readyState == 4 && hr.status == 200) {
             //var foo = JSON.parse(hr.responseText);
           loadcurdetails();
           //alert(foo);
          }
      }
      hr.send(vars);

  }
  function changepassword(){
      //alert("pass");
      var cur = document.getElementById("current").value;
      var newp = document.getElementById("newpass").value;
      var newp2 = document.getElementById("newpass2").value;
        

      var regStr = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");



     // alert(newp.localeCompare(newp2, 'en', {sensitivity: 'variant'}));

        if (cur == "" || newp == "" || newp2 == "" || newp.localeCompare(newp2, 'en', {sensitivity: 'variant'}) == 1)
        {
            
            alert("all fields required! and new password must match");
          //  document.getElementById("changepass").reset();
            return false;
        }else if (newp == newp2 && regStr.test(newp) != 1){
       
        alert("password strength fail");
        return false;
    }else{
        var hr = new XMLHttpRequest();
        var url = "functions/ajaxfunction.php";
        var vars = "cur="+cur+"&newp1="+newp+"&newp2="+newp2;
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function() {
            if(hr.readyState == 4 && hr.status == 200) {
               var foo = hr.responseText;
               //alert(foo);
             if (foo == "Password changed! please log back in with your new password")
             {
                 alert(foo);
                 location.replace("functions/logout.php");
             }
             else{ 
                 alert(foo +": this is foo");
                 alert("Password change failed! check all fields.");
                 document.getElementById("changepass").reset();
             }
            }
        }
        hr.send(vars);
    }



}

  function loginmodal(){
   // document.getElementById('id01').style.display='block'
    document.getElementById('id02').style.display='block'
}


