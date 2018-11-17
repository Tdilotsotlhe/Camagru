<?php
 
include "functions/load.php";
session_start();
if(isset($_GET['welcome']))
{
    echo "<script>alert('login successful')</script>";
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
  else echo "<button class='w3-mobile w3-padding-2 w3-cell'><button  class='w3-btn w3-left w3-mobile'>Welcome Guest </button>   <button onclick='loginmodal()' class='w3-mobile w3-btn w3-hover-grey w3-center w3-right'>Login/Register</button></button>"; 
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

<div class="w3-container w3-center w3-mobile w3-theme-l1 w3-animate-right w3-cell w3-cell-middle">
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
      <h2>Login</h2>
    </header>
   
    <div class="w3-container w3-center w3-theme-d1  w3-animate-zoom">
    <p>Username</p>
   <p class="w3-center"> <input type='text' name='uname' id='uname' placeholder='Enter Username' required></p>
    <p>Password</p>
   <p class="w3-center"> <input type='password' name='pwrd' id='pwrd' placeholder='Enter Password' required></p>
    <p class="w3-center" id='login_error'></p>
 <p class="w3-center">   <button class="w3-button" onclick='ajax_post()' id='logbut2'>Login2</button></p>
    
</div>
    <footer class="w3-container w3-theme-d5 (w3-theme-dark) w3-animate-bottom">
      <p class="w3-center">Register</p>
    </footer>
  </div>
</div>
<script>
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
