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


/* overlay stuff */
#overlay {
    position: absolute;
    display: block;
    width: 20%;
    height: 20%; 
    top: 100;
    left: 60;
    right: 70;
    bottom: 30;
    z-index: 2;
   
    
    cursor: pointer;

}

#text{
    position: absolute;
    top: 50%;
    left: 50%;
    font-size: 50px;
    color: white;
}

.top_container
{
    width: 500px;
    margin: 30px auto;
}

#canvas
{
    display: none;
}
#canvas2
{
    display: none;
}

#emoji1
{
    position: absolute;
    visibility: hidden;
}

#emoji2
{
    position: absolute;
    visibility: hidden;
}
</style>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Camagru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--     <link rel="stylesheet" type="text/css" media="screen" href="new.css" /> -->
<link rel="stylesheet" type="text/css" media="screen" href="css/w3.css" />
<!-- <link rel="stylesheet" type="text/css" media="screen" href="css/main2.css" /> -->
<link rel="stylesheet" type="text/css" media="screen" href="css/w3-theme-indigo.css" />
<link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css" />
<script src="js/prof.js"></script>
<script src="js/pic.js"></script>
    <script src="js/myajax.js"></script>
    <script src="js/thumbs2.js"></script>


<!--     <script src="js/myajax.js"></script> -->
</head>
<body style="background-image:url(img/newbg1.jpg); background-size: 100% 100%;    background-position: center;background-repeat: no-repeat;background-size: stretch;">

<?php

   // include "includes/header.php";
?>

<div class="w3-container w3-opacity-min w3-padding-5 w3-theme-d5 w3-animate-zoom ">
  <h1>Camagru</h1>
  
</div>
<div class="w3-container w3-theme-d3 (w3-theme-dark) w3-animate-left w3-cell-row w3-center w3-opacity ">
<?php   if(isset($_SESSION['username']))
  {
    echo "<button class='w3-btn w3-left'>Welcome ".$_SESSION['username']."</button> <a href='functions/logout.php' class='w3-mobile w3-btn w3-right'>Logout</a>";
  }
  else echo "<div class=' w3-padding-2 w3-container w3-cell'><button  class='w3-btn w3-left'>Welcome Guest </button>   <button onclick='loginmodal()' class='w3-btn w3-hover-grey w3-center w3-right'>Login/Register</button></div>"; 
  ?>
</div>
<!-- hide on small -->
 <div class="w3-theme-l1 w3-hide-small   w3-mobile (w3-theme-light) w3-animate-top w3-cell-row w3-center w3-opacity-min w3-hover-opacity-off">
    
 <div class="w3-quarter w3-cell w3-hide-small">
	 <p onclick="window.location = 'index.php'" class="w3-bar-item w3-mobile w3-hover-gray w3-animate-zoom">HOME</p>
	 
	</div>
	<div class="w3-quarter w3-cell w3-hide-small">
			<p onclick="window.location = 'profile.php'" class="w3-bar-item w3-mobile w3-hover-gray">PROFILE</p>
    </div>
    <div class="w3-quarter w3-cell w3-hide-small">
    <p onclick="window.location = 'snap.php'" class="w3-bar-item w3-mobile w3-hover-gray ">PHOTOBOOTH</p>
		</div>
		<div class="w3-quarter w3-cell w3-hide-small">
    <p onclick="window.location = 'newgal1.php'" class="w3-bar-item w3-mobile w3-hover-gray ">GALLERY</p>
    </div>
<!-- hide on big -->

 <div class="w3-theme-l1 w3-hide-large w3-hide-medium  w3-mobile (w3-theme-light) w3-animate-top w3-cell-row w3-center w3-opacity-min w3-hover-opacity-off">
 <button onclick="myFunction('Demo1')" class="w3-btn w3-block w3-black w3-left-align">Menu</button>
<div id="Demo1" class="w3-container w3-hide">
  <p onclick="window.location = 'index.php'">Home</p>
  <p onclick="window.location = 'profile.php'">Profile</p>
  <p onclick="window.location = 'newgal1.php'">Gallery</p>
  <p onclick="window.location = 'functions/logout.php'">Logout</p>
</div>
    </div>





</div>
<div class="w3-container w3-cell w3-mobile w3-theme-d4 w3-animate-opacity w3-animate-zoom">
  <p>Gallery</p>

  

  <article class="w3-container w3-half">
  <div class="top_container">
			<div id="overlay" class="overlay">
				<img class="text" height='100px' width='100px' id="emoji1" name="emoji1" onclick="off()">
				<img onclick="off2()" class="text" height='100px' width='100px' id="emoji2" name="emoji2"  >
			</div>
			<div class="video">
				<img id="editpic" class="video" width="500px">
				<video id='video'>Stream not available...</video>
			</div>
			<div class="emo_list">
			<img id="e1" src="img/emojis/1.png" height='50px' width='50px' style="margin: 19px">
			<img id="e2" src="img/emojis/2.png" height='50px' width='50px' style="margin: 19px">
			<img id="e3" src="img/emojis/3.png" height='50px' width='50px' style="margin: 19px">
			<img id="e4" src="img/emojis/4.png" height='50px' width='50px' style="margin: 19px">
			<br>
		</div>
			<button id="photo_button" class="w3-button" >Take Photo</button>
			<!-- <button id="Uploadbtn" class="button">Upload</button> -->
			<!-- <label id="testme" for="file" class="lbbutton">Css only file upload button</label> -->
		<!-- 	<input id="file" class="file-upload__input" type="file" name="file-upload"> -->
			<!-- <div class="file-upload">
			</div> -->
			<!-- <canvas id="canvas2"></canvas> -->
			<button id="save_photo" class="w3-button w3-grey" style="display:none;">save</button>
		<!-- 	<canvas id="canvas"></canvas> -->
		</div>
		

<br>

<canvas id="canvas"></canvas>


<div class="bottom_container">
<div id="photos"></div>
</div> 
<script>
 function off() {
		document.getElementById("emoji1").style.visibility = "hidden";
		document.getElementById("emoji1").removeAttribute('src');

	}
	function off2() {
		document.getElementById("emoji2").style.visibility = "hidden";
		document.getElementById("emoji2").removeAttribute('src');

	}

	emo1 = document.getElementById("e1");
	emo2 = document.getElementById("e2");
	emo3 = document.getElementById("e3");
	emo4 = document.getElementById("e4");

	
	emo1.addEventListener("click", function(){switchsrc(emo1);}, false);
	emo2.addEventListener("click", function(){switchsrc(emo2);}, false);
	emo3.addEventListener("click", function(){switchsrc(emo3);}, false);
	emo4.addEventListener("click", function(){switchsrc(emo4);}, false);


	function switchsrc(emonew)
	{
		document.getElementById("emoji1").style.visibility = "visible";
		if (document.getElementById("emoji1").hasAttribute("src"))
		{
			document.getElementById("emoji2").style.visibility = "visible";
			var emoswitch = document.getElementById("emoji2");
		}
		else
		{
			var emoswitch = document.getElementById("emoji1");
		}
		var ovl = document.getElementById("overlay");
		switch (emonew.id)
		{
			case "e1" :
				emoswitch.setAttribute('src', emonew.src);
				emoswitch.style.top = "10px";
				emoswitch.style.left = "10px";
				break;
			case "e2" :
				emoswitch.setAttribute('src', emonew.src);
				emoswitch.style.top = "10px";
				emoswitch.style.left = "200px";
				break;
			case "e3" :
				emoswitch.setAttribute('src', emonew.src);
				emoswitch.style.top = "10px";
				emoswitch.style.left = "400px";
				break;
			case "e4" :
				emoswitch.setAttribute('src', emonew.src);
				emoswitch.style.top = "100px";
				emoswitch.style.left = "10px";
				break;
			case "e5" :
				emoswitch.setAttribute('src', emonew.src);
				emoswitch.style.top = "100px";
				emoswitch.style.left = "200px";
				break;
			case "e6" :
				emoswitch.setAttribute('src', emonew.src);
				emoswitch.style.top = "100px";
				emoswitch.style.left = "400px";
				break;
			case "e7" :
				emoswitch.setAttribute('src', emonew.src);
				emoswitch.style.top = "250px";
				emoswitch.style.left = "10px";
				break;
			case "e8" :
				emoswitch.setAttribute('src', emonew.src);
				emoswitch.style.top = "250px";
				emoswitch.style.left = "200px";
				break;
			case "e9" :
				emoswitch.setAttribute('src', emonew.src);
				emoswitch.style.top = "250px";
				emoswitch.style.left = "400px";
				break;
			case "e10" :
				emoswitch.setAttribute('src', emonew.src);
				emoswitch.style.top = "100px";
				emoswitch.style.left = "200px";
				break;
		}
	} 

	function setedit(imgid) {
		//alert(imgid);
		var hv = document.getElementById("video");
		hv.style.display = "none";
		//alert(hv.style.display);
		var movesrc = document.getElementById(imgid).src;
		//alert(movesrc);
		document.getElementById("editpic").src = movesrc;
		//alert(imgid);
	    video = document.getElementById("editpic");

}
</script>
<br>
<form action="functions/upweb.php" method="post" enctype="multipart/form-data">
<br>
<!-- <input type="submit" id="webcamupload" value="submit"> -->
</form>

 
  <div>
<!--   onsubmit="ajaxupload();"
action="functions/upload.php"
action="functions/upload.php"
 -->      <!--  <form method="post" enctype="multipart/form-data">  -->
        <p>Select imagesdfsd to upload</p>
        <input type="file" name="userpic" id="userpic">
       <input type="submit" onclick="ajaxupload();" value="Upload Ajax Image" name="submit">
     <!--   <button id="fileUpload" type="submit">Upload!!!</button> -->
        
    <!--  </form>  -->
      
  </div>
  </article>








  

  

  

  <br>
  
</div>
<div class="w3-container w3-theme-l3 w3-cell w3-middle w3-padding-large w3-mobile w3-animate-right">
  <p>Preview</p>
  <canvas id="canvas2"></canvas>
  <canvas id="canvas"></canvas>
</div>
<div class="w3-container w3-theme-l3 w3-cell w3-middle w3-padding-large w3-mobile w3-animate-right">
  <p>Gallery</p>
  <div id="mygal"></div>
</div>
</div>

<footer class="w3-container w3-theme-d5 (w3-theme-dark) w3-animate-bottom ">
  <p class="w3-center">TDILOTSO</p>
</footer>
<!-- MODAL -->

<div id="id01" class="w3-modal" >
  <div class="w3-modal-content" >
    <header class="w3-container w3-theme-d5 (w3-theme-dark) w3-animate-top"> 
      <span onclick="document.getElementById('id01').style.display='none'" 
      class="w3-closebtn w3-right">&times;</span>
      <h2>Login / Register</h2>
    </header>
   <!-- login modal -->
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


    <footer class="w3-container w3-theme-d5 (w3-theme-dark) w3-animate-bottom w3-bottom">
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