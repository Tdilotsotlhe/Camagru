<?php
 
include "functions/load.php";

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
<body>

<?php

    include "includes/header.php";
?>
 <!-- ////////////////// -->
<!-- oldcode -->
<!-- //////////////////////////// -->

<!-- newcode -->
<div class="w3-cell-row">
<div class="w3-container w3-red w3-cell w3-mobile w3-theme-l1 w3-animate-left">
<div class="w3-bar-block w3-theme-l1 w3-animate-left">
  <div onclick="window.location = 'index.php'" class="w3-bar-item w3-mobile w3-hover-gray w3-animate-zoom">HOME</div>
  <div onclick="window.location = 'profile.php'" class="w3-bar-item w3-mobile w3-hover-gray">PROFILE</div>
  <div class="w3-bar-item w3-mobile w3-hover-gray ">GALLERY</div>
</div>  


</div>
<div class="w3-container w3-green w3-cell w3-mobile w3-theme-l4 w3-animate-opacity w3-animate-zoom">
  <p class = "w3-center"> MY GALLERY</p>
  <p id="pagegal" class = "w3-center"></p>
  <br>
  <p id='pagecounter' class = "w3-center">1/?</p>
  <p class="w3-center w3-animate-top"><button id="prevset" onclick="prevpage();" class="w3-button w3-border w3-hover-dark-grey w3-animate-right">Left</button>
  <button id="nextset" onclick="nextpage();" class="w3-button w3-border w3-hover-dark-grey w3-animate-right">Right</button>
  </p>
</div>
<div class="w3-container w3-theme-l1 w3-cell w3-mobile w3-animate-right">
  <p>VIEW</p>
  <p id="comment"></p>
</div>
</div>

<footer class="w3-container w3-theme-d5 (w3-theme-dark) w3-animate-bottom ">
  <p class = "w3-center">TDILOTSO</p>
</footer>
</body>
<!-- MODAL -->

<div id="id01" class="w3-modal">
  <div class="w3-modal-content">
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


<!-- MODALEND -->
</html>
