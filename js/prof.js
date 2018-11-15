

window.onload = function(){
    var curuser = document.getElementById("curuser");
var curemail = document.getElementById("curemail");
//var curnotif = document.getElementById("curemail");
    loadcurdetails();
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
           // curnotif.innerHTML = foo['notifications'];
          }
      }
      hr.send(vars);
  }


  function changeuser(){
      alert("user");
      var hr = new XMLHttpRequest();
      var url = "functions/ajaxfunction.php";
      var vars = "newname=me";
      hr.open("POST", url, true);
      hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      hr.onreadystatechange = function() {
          if(hr.readyState == 4 && hr.status == 200) {
          //   var foo = JSON.parse(hr.responseText);
           loadcurdetails();
        
          }
      }
      hr.send(vars);

  }
  function changeemail(){
      alert("email");

  }
  function changepass(){
      alert("pass");

  }