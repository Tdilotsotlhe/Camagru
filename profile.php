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
<script src="js/prof.js"></script>


<!--     <script src="js/myajax.js"></script> -->
</head>
<body>

<?php

    include "includes/header.php";
?>


<!-- newcode -->
<div class="w3-theme-d5 (w3-theme-dark) w3-animate-top w3-cell-row w3-center">
    <div class="w3-third w3-cell">
    <p onclick="window.location = 'profile.php'" class="w3-bar-item w3-mobile w3-hover-gray">PROFILE</p>
    
    </div>
    <div class="w3-third w3-cell">
    <p onclick="window.location = 'index.php'" class="w3-bar-item w3-mobile w3-hover-gray w3-animate-zoom">HOME</p>
    </div>
    <div class="w3-third w3-cell">
    <p class="w3-bar-item w3-mobile w3-hover-gray ">GALLERY</p>
    </div>

</div>
<div class="w3-container  w3-cell w3-mobile w3-theme-d4 w3-animate-opacity w3-animate-zoom">
  <p>MY PROFILE</p>

  <div class="w3-panel w3-text-theme w3-round-xlarge">
<label>username</label>
<input class="w3-input w3-theme-d4" type="text">
<p><button onclick="changeuser();" class="w3-btn w3-round">Submit</button></p>
</div>
  
  <div class="w3-panel  w3-text-theme w3-round-xlarge">
  <label>email</label>
<input class="w3-input w3-theme-d4" type="text">
<p><button onclick="changeemail()" class="w3-btn w3-round">Submit</button></p>

</div>
  
<div class="w3-panel  w3-text-theme w3-round-xlarge">
<label>Notifications</label>
<input id="notcheckbox" class="w3-check" type="checkbox" checked="checked">
</div>
  
<div class="w3-panel  w3-text-theme w3-round-xlarge">
<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-center w3-theme-d4">Change Password</button>
</div>
  <br>
  
</div>
<div class="w3-container w3-theme-l3 w3-cell w3-middle w3-mobile w3-animate-right">
  <p>Details</p>
  <p w3-theme-l1 id="curuser"></p>
  <p w3-theme-l1 id="curemail"></p>
  <p w3-theme-l1 id="curnotif"></p>
</div>
</div>

<footer class="w3-container w3-theme-d5 (w3-theme-dark) w3-animate-bottom ">
  <p class="w3-center">TDILOTSO</p>
</footer>
<!-- DMODAL -->
<div id="id01" class="w3-modal">
  <div class="w3-modal-content">
  <header class="w3-container w3-theme-d5">
      <span onclick="document.getElementById('id01').style.display='none'" 
      class="w3-button w3-display-topright">&times;</span>
      <h2>Change Password</h2>
    </header>
    <div class="w3-container">
     <!--  <span onclick="document.getElementById('id01').style.display='none'" 
      class="w3-button w3-display-topright">&times;</span> -->
      <form class="w3-container">

<label>Current Password</label>
<input class="w3-input" type="text">

<label>New Password</label>
<input class="w3-input" type="text">

<label>Re-type Password</label>
<input class="w3-input" type="text">
<p><button type="button" class="w3-btn w3-padding w3-theme" style="width:120px">Send &nbsp; ❯</button></p>
<br>
<form>
<footer class="w3-container w3-theme-l5 (w3-theme-light)">
  <p class="w3-center">forgot password?</p>
</footer>
    </div>
  </div>
</div>
</body>


</html>