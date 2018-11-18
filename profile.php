<?php
 
include "functions/load.php";
session_start();
if(!isset($_SESSION['uid']))
{
    header("Location: index.php#");
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
<body style="background-image:url(img/newbg1.jpg); background-size: 100% 100%;    background-position: center;background-repeat: no-repeat;background-size: stretch;">

<?php

   // include "includes/header.php";
?>

<div class="w3-container w3-opacity-min w3-padding-5 w3-theme-d5 w3-animate-zoom ">
  <h1>Camagru</h1>
  
</div>
<div class="w3-container w3-mobile w3-theme-d3 (w3-theme-dark) w3-animate-left w3-cell-row w3-center w3-opacity ">
<?php   if(isset($_SESSION['username']))
  {
    echo "<button class='w3-btn w3-left w3-mobile'>Welcome ".$_SESSION['username']."<button class='w3-mobile w3-btn w3-right'>Logout</button>";
  }
  else echo "<div class=' w3-padding-2 w3-container w3-cell w3-mobile'><button  class='w3-btn w3-left w3-mobile'>Welcome Guest </button>   <button onclick='loginmodal()' class='w3-btn w3-hover-grey w3-center w3-right'>Login/Register</button></div>"; 
  ?>
</div>
<!-- hide on small -->
 <div class="w3-theme-l1   w3-mobile (w3-theme-light) w3-animate-top w3-cell-row w3-center w3-opacity-min w3-hover-opacity-off">
    
 <div class="w3-quarter w3-cell w3-hide-small">
   
   <p onclick="window.location = 'index.php'" class="w3-bar-item w3-mobile w3-hover-gray"> HOME</p>
    </div>
    <div class="w3-quarter w3-cell w3-hide-small">
    <p onclick="window.location = 'profile.php'" class="w3-bar-item w3-mobile w3-hover-gray w3-animate-zoom">PROFILE</p>
    </div>
    <div class="w3-quarter w3-cell w3-hide-small">
    <p onclick="window.location = 'snap.php'" class="w3-bar-item w3-mobile w3-hover-gray ">PHOTOBOOTH</p>
		</div>
		<div class="w3-quarter w3-cell w3-hide-small">
    <p onclick="window.location = 'gal3.php'" class="w3-bar-item w3-mobile w3-hover-gray ">GALLERY</p>
    </div>
<!-- hide on big -->

 <div class="w3-theme-l1 w3-hide-large w3-hide-medium  w3-mobile (w3-theme-light) w3-animate-top w3-cell-row w3-center w3-opacity-min w3-hover-opacity-off">
 <button onclick="myFunction('Demo1')" class="w3-btn w3-block w3-black w3-left-align">Menu</button>
<div id="Demo1" class="w3-container w3-hide">
  <p>Home</p>
  <p>Profile</p>
  <p>Gallery</p>
  <p>Logout</p>
</div>
    </div>





</div>


<!-- //start new row -->
<div class="w3-cell-row">


        <div class="w3-container w3-half w3-cell w3-mobile w3-theme-d4 w3-animate-opacity w3-animate-zoom">
        <p>MY PROFILE</p>

        <div class="w3-panel w3-text-theme w3-mobile w3-round-xlarge">
        <label class="w3-mobile">username</label>
        <input class="w3-mobile w3-input w3-theme-d4" type="text" id="newname">
        <p><button onclick="changeuser();" class="w3-btn w3-round">Submit</button></p>
        </div>
  
        <div class="w3-panel w3-mobile w3-text-theme w3-round-xlarge">
        <label class="w3-mobile">email</label>
        <input class="w3-mobile w3-input w3-theme-d4" type="text" id="newemail">
        <p class="w3-mobile"><button onclick="changeemail()" class="w3-mobile w3-btn w3-round">Submit</button></p>

        </div>
  
        <div class="w3-panel w3-mobile w3-text-theme w3-round-xlarge">
        <label class="w3-mobile">Notifications</label>
        <input id="notcheckbox" class="w3-check w3-mobile" type="checkbox" checked="checked">
        </div>
  
          <div class="w3-panel w3-mobile  w3-text-theme w3-round-xlarge">
          <button onclick="document.getElementById('modalpass').style.display='block'" class="w3-button w3-center w3-theme-d4 w3-mobile">Change Password</button>
          </div>
  
        </div>

        <div class="w3-container w3-mobile w3-half w3-theme-l3 w3-cell w3-opacity w3-animate-right">
        <p class="w3-mobile">Details</p>
        <p class="w3-theme-l1 w3-mobile" id="curuser"></p>
        <p class="w3-theme-l1 w3-mobile" id="curemail"></p>
        <p class="w3-theme-l1 w3-mobile" id="curnotif"></p>
        </div>

</div>






<div class="w3-row">
<footer class="w3-container w3-mobile w3-theme-d5 (w3-theme-dark) w3-animate-bottom ">
  <p class="w3-center">TDILOTSO</p>
</footer>
</div>
<!-- DMODAL -->
<div id="modalpass" class="w3-modal">
  <div class="w3-modal-content">
  <header class="w3-container w3-theme-d5">
      <span onclick="document.getElementById('modalpass').style.display='none'" 
      class="w3-button w3-display-topright">&times;</span>
      <h2>Change Password</h2>
    </header>
    <div class="w3-container">
     <!--  <span onclick="document.getElementById('id01').style.display='none'" 
      class="w3-button w3-display-topright">&times;</span> -->
      <form id="changepass" class="w3-container">

<label>Current Password</label>
<input class="w3-input" type="password" id="current" required>

<label>New Password</label>
<input class="w3-input" type="password" id="newpass" required>

<label>Re-type Password</label>
<input class="w3-input" type="password" id="newpass2" required>
<p><button type="button" onclick="changepassword()" class="w3-btn w3-padding w3-theme" style="width:120px">Send &nbsp; ❯</button></p>
<br>
<form>
<footer class="w3-container w3-theme-l5 (w3-theme-light)">
  <p class="w3-center">forgot password?</p>
</footer>
    </div>
  </div>
</div>
</body>
<!-- MODAL -->

<!-- <div id="id02" class="w3-modal" >
  <div class="w3-modal-content" >
    <header class="w3-container w3-theme-d5 (w3-theme-dark) w3-animate-top"> 
      <span onclick="document.getElementById('id02').style.display='none'" 
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
</div> -->


<!-- MODALEND -->
<script>

function showpass() {
   // document.getElementById("modalogin").className = "w3-container w3-center w3-theme-d1 w3-animate-zoom w3-mobile w3-hide";
    document.getElementById("modalpass").className = "w3-container w3-center w3-theme-d1 w3-animate-left w3-mobile w3-show";
    document.getElementById("regform").addEventListener("submit", function(e){
    e.preventDefault();
    //changepassword();
   
});
}
</script>

 



</html>