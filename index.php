<?php
 
include "functions/load.php";
session_start();
if(isset($_GET['as']))
{
   if($_GET['as'] == 1)
   {
     echo "<script>alert('Welcome, your account is activated');location.replace('index.php');</script>";
   }else{
    echo "<script>alert('Account activation failed, please try again');location.replace('index.php');</script>";
   }
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
.w3-theme-gradient {
  color: #000 !important;
  background:-webkit-linear-gradient(top,#64B5F6 25%,#42A5F5 75%)}
.w3-theme-gradient {
  color: #000 !important;
  background:-moz-linear-gradient(top,#64B5F6 25%,#42A5F5 75%)}
.w3-theme-gradient {
  color: #000 !important;
  background:-o-linear-gradient(top,#64B5F6 25%,#42A5F5 75%)}
.w3-theme-gradient {
  color: #000 !important;
  background:-ms-linear-gradient(top,#64B5F6 25%,#42A5F5 75%)}
.w3-theme-gradient {
  color: #000 !important;
  background: linear-gradient(top,#64B5F6 25%,#42A5F5 75%)}
</style>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Camagru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--     <link rel="stylesheet" type="text/css" media="screen" href="new.css" /> -->
<link rel="stylesheet" type="text/css" media="screen" href="css/w3.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/w3-theme-indigo.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css" />
    <script src="js/myjs.js"></script>
    <script src="js/myajax.js"></script>
    <script src="js/thumbs.js"></script>
<!--     <script src="js/myajax.js"></script> -->
</head>
<body style="background-image:url(img/newbg1.jpg); background-size: 100% 100%;    background-position: center;background-repeat: no-repeat;background-size: stretch;">

<?php

   // include "includes/header.php";
?>
<div class="w3-container w3-opacity-min w3-padding-10 w3-theme-d5 w3-animate-zoom w3-mobile">
  <h1>Camagru</h1>

</div>
<div class="w3-container w3-theme-d3 w3-hide-small (w3-theme-dark) w3-animate-left w3-cell-row w3-center w3-opacity w3-mobile">
  <?php   if(isset($_SESSION['username']))
  {
    echo "<button class='w3-btn w3-left w3-mobile'>Welcome ".$_SESSION['username']."</button> <a href='functions/logout.php' class='w3-mobile w3-btn w3-right'>Logout</a>";
  }
  else echo "<div class='w3-mobile w3-padding-2 w3-cell'><button  class='w3-btn w3-left w3-mobile'>Welcome Guest </button>   <button onclick='loginmodal()' class='w3-mobile w3-btn w3-hover-grey w3-center w3-right'>Login/Register</button></div>"; 
  ?>

</div>
 <!-- ////////////////// -->
<!-- oldcode -->
<!-- //////////////////////////// -->
<!-- menu -->
<!-- newcode test -->
<!-- new header -->

<div class="w3-theme-l1 w3-hide-small w3-mobile (w3-theme-light) w3-animate-top w3-cell-row w3-center w3-opacity-min w3-hover-opacity-off">
    <div class="w3-quarter w3-mobile w3-cell">
    <p onclick="window.location = 'index.php'" class="w3-bar-item w3-hover-sepia w3-animate-zoom">HOME</p>
    </div>
    <div class="w3-quarter w3-mobile w3-cell">
    <p onclick="window.location = 'profile.php'" class="w3-bar-item w3-mobile w3-hover-gray">PROFILE</p>
    </div>
    <div class="w3-quarter w3-mobile w3-cell w3-hide-small">
    <p onclick="window.location = 'snap.php'" class="w3-bar-item w3-mobile w3-hover-gray ">PHOTOBOOTH</p>
		</div>
		<div class="w3-quarter w3-mobile w3-cell w3-hide-small">
    <p onclick="window.location = 'newgal1.php'" class="w3-bar-item w3-mobile w3-hover-gray ">GALLERY</p>
    </div>

</div>
<!-- hide on big -->

 <div class="w3-theme-l1 w3-hide-large w3-hide-medium  w3-mobile w3-theme (w3-theme-light) w3-animate-top w3-cell-row w3-center w3-opacity-min w3-hover-opacity-off">
 <button onclick="myFunction('Demo1')" class="w3-mobile w3-btn w3-block  w3-theme w3-left-align w3-animate-top">Menu</button>
<div id="Demo1" class="w3-container w3-mobile w3-hide w3-opacity w3-animate-left">
  <p class="w3-animate-top w3-mobile">Home</p>
  <p class="w3-animate-left w3-mobile">Profile</p>
  <p class="w3-animate-left w3-mobile">Gallery</p>
  <p class="w3-animate-bottom w3-mobile">Logout</p>
</div>
    </div>

<div class="w3-cell-row w3-mobile">

<div class="w3-container w3-theme-d1 (w3-theme-dark) w3-animate-top w3-cell w3-mobile">
<p class = "w3-center"> <?php if(isset($_SESSION['uid'])){echo "MY ";}?>GALLERY</p>
        <?php     
          ///pub/priv gallery
          if(isset($_SESSION['uid']))
          {
            echo '<p id="pagegal" data-public="false" class = "w3-container w3-center w3-cell-middle w3-mobile"></p><input type="hidden" id="galtype" value="private">';
          }else{
            echo '<p id="pagegal" data-public="true" class = "w3-container w3-center w3-cell-middle w3-mobile"></p><input type="hidden" id="galtype" value="public">';
          }
        ?>
       
        <br>
        
        <p id="pagecounter" class = " w3-center">1/?</p>
        <p class="w3-center w3-animate-top"><button id="prevset" onclick="prevpage();" class="w3-button w3-border w3-hover-dark-grey w3-animate-right">Left</button>
        <button id="nextset" onclick="nextpage();" class="w3-button w3-border w3-hover-dark-grey w3-animate-right">Right</button>
        </p>
       


        <p class="w3-center w3-animate-zoom w3-mobile">
          <img class="w3-round w3-mobile w3-image" width="250px" height="250px" src="img/newbg1.jpg" id="selprev">
        </p>                                  
</div>

<div  class="w3-container w3-center w3-mobile w3-theme-l1 w3-animate-right w3-rest w3-cell w3-cell-middle">
<p class="w3-center w3-mobile">CARDS</p>
          <p id="comment" class = "w3-center w3-mobile">Login to view comments</p>
</div>

</div>

<!-- wrap in center -->

<!-- NEWMENU -->
<div class="w3-cell-row w3-center">
     <!-- //row contents -->
<!--       <div class="w3-quarter w3-container  w3-theme-d5 (w3-theme-dark) w3-cell w3-animate-top">
        <p onclick="window.location = 'index.php'" class="w3-bar-item w3-mobile w3-hover-gray w3-animate-zoom">HOME</p>
        <p onclick="window.location = 'profile.php'" class="w3-bar-item w3-mobile w3-hover-gray">PROFILE</p>
        <p class="w3-bar-item w3-mobile w3-hover-gray ">GALLERY</p>
      </div>  -->  
      
 <!--      <div class="w3-half w3-cell w3-container  w3-theme-d1 (w3-theme-dark) w3-animate-top">
        <p class = "w3-center"> MY GALLERY</p>
        <p id="pagegal" class = "w3-center"></p>
        <br>
        <p id='pagecounter' class = " w3-center">1/?</p>
        <p class="w3-center w3-animate-top"><button id="prevset" onclick="prevpage();" class="w3-button w3-border w3-hover-dark-grey w3-animate-right">Left</button>
        <button id="nextset" onclick="nextpage();" class="w3-button w3-border w3-hover-dark-grey w3-animate-right">Right</button>
        </p>
      </div> -->
<!--       <div class="w3-cell w3-half w3-theme-l1 w3-animate-right">
          <p>VIEW</p>
          <p id="comment"></p>
      </div> -->
</div>

      
 

<div class="w3-row">
<footer class="w3-container w3-theme-d1 (w3-theme-dark) w3-mobile w3-opacity-min w3-animate-bottom ">
  <p class = "w3-center">TDILOTSO</p>
</footer>
</div>



</body>
<!-- MODAL -->

<div id="id01" class="w3-modal" >
  <div class="w3-modal-content" >
    <header class="w3-container w3-theme-d5 (w3-theme-dark) w3-animate-top"> 
      <span onclick="document.getElementById('id01').style.display='none'" 
      class="w3-closebtn w3-right">&times;</span>
      <h2>Login / Register</h2>
    </header>
   <!-- lgoin modal -->
    <div id="modalogin" class="w3-container w3-center w3-theme-d1 w3-animate-zoom w3-mobile">
    <label>Username</label>
   <p class="w3-center w3-mobile w3-animate-top"> <input class="w3-input w3-text-theme" type='text' name='uname' id='uname' placeholder='Enter Username' required></p>
    <p>Password</p>
   <p class="w3-center w3-mobile w3-animate-left"> <input  type='password' class="w3-input w3-text-theme" name='pwrd' id='pwrd' placeholder='Enter Password' required></p>
    <p class="w3-center w3-mobile w3-animate-bottom" id='login_error'></p>
   
 <p class="w3-center">   <button class="w3-btn w3-grey w3-mobile w3-animate-opacity" onclick='ajax_post()' id='logbut2'>Login</button></p>
 <button id="forgotpass" class="w3-btn w3-center w3-grey w3-animate-zoom" onclick="document.getElementById('forgot').style.display = 'block';">Forgot Password</button>
  <p class="w3-animate-rigth" id="forgot" style="display: none;"><label class="w3-tag">Email:</label><br><input class="w3-input w3-animate-zoom" type="email" id="forgotemail"><button onclick="forgpassmail()" class="w3-btn w3-animate-left w3-grey" id="forgotsub">Send Email</button></p>
</div>



    <!-- reg modal --> 
    <form id="regform" method="post" onsubmit="event.preventDefault();">
    <div id="modalreg" class="w3-container w3-center w3-theme-d1 w3-animate-zoom w3-mobile w3-hide">
    <label>Username</label>
   <p class="w3-center w3-mobile w3-animate-top"> <input class="w3-input w3-text-theme" type='text' name='uname' id='uname1' placeholder='Enter Username' required></p>
   <label>Email</label>
   <p class="w3-center w3-mobile w3-animate-top"> <input  class="w3-input w3-text-theme" type='text' name='email' id='email' placeholder='Enter email' required></p>
   
   <label>Password</label>
   <p class="w3-center w3-mobile w3-animate-left"> <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type='password' class="w3-input w3-text-theme" name='pwrd' id='pwrd1' placeholder='Enter Password' required></p>
   <label>Re-enter Password</label>
   <p  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="w3-center w3-mobile w3-animate-left"> <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type='password' class="w3-input w3-text-theme" name='pwrd' id='pwrd2' placeholder='Re-enter Password' required></p>

   <p class="w3-center w3-mobile w3-animate-bottom" id='reg_error'></p>
 <p class="w3-center"><!-- <input type="submit" id="newBtn" value="sendtest">  -->  <input onclick="ajax_register();" class="w3-btn w3-grey w3-mobile w3-animate-opacity"  id='logbut2' type="submit" value = "Register"><!-- Register</button> --></p>
</div>
        </form>


    <footer class="w3-container w3-theme-d5 (w3-theme-dark) w3-animate-bottom">
      <p class="w3-center w3-mobile w3-hover-grey" onclick="showreg()">Register</p>
      <p class="w3-center w3-mobile w3-hover-grey" onclick="showlogin()">login</p>
    </footer>
  </div>
</div>
<script>

  function showlogin() {
    document.getElementById("modalreg").className = "w3-container w3-center w3-theme-d1 w3-animate-zoom w3-mobile w3-hide";
    document.getElementById("modalogin").className = "w3-container w3-center w3-theme-d1 w3-animate-zoom w3-mobile w3-show";
    
  }

  function showreg() {
    document.getElementById("modalogin").className = "w3-container w3-center w3-theme-d1 w3-animate-zoom w3-mobile w3-hide";
    document.getElementById("modalreg").className = "w3-container w3-center w3-theme-d1 w3-animate-left w3-mobile w3-show";
    document.getElementById("regform").addEventListener("submit", function(e){
    e.preventDefault();
    //ajax_register();
   // alert("submitting");
});
    
  }

  function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

<!-- MODALEND -->
</html>
