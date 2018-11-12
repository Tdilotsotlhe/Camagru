<?php
include "config/database.php";
include "functions/load.php";
/* $_SESSION['test'] = "SHIT!";
echo $_SESSION['test']; */
if(!isset($_SESSION['uid']))
{
	header("Location: index.php?nli=1");
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
        * {
    box-sizing: border-box;
}
.row::after {
    content: "";
    clear: both;
    display: table;
}
[class*="col-"] {
    float: left;
    padding: 15px;
}
.col-1 {width: 8.33%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}
html {
    font-family: "Lucida Sans", sans-serif;
}
.header {
    background-color: #9933cc;
    color: #ffffff;
    padding: 15px;
}
.menu ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
.menu li {
    padding: 8px;
    margin-bottom: 7px;
    background-color: #33b5e5;
    color: #ffffff;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}
.menu li:hover {
    background-color: #0099cc;
}
        </style>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main2.css" />
    
   <!--  <script src="js/myjs.js"></script> -->
   <!--  <script src="js/newcamjs.js"></script> -->
    <script src="js/pic.js"></script>
    <script src="js/myajax.js"></script>
    <script src="js/thumbs2.js"></script>
    <style>

</style>
</head>

<body>
<div class="wrapper">
<?php
    include "includes/header.php";
?>


<div class="col-2" id="thumbnails">IMAGES</div>
  <div class="col-7">
  <div class="top_container">
			<div id="overlay" class="overlay">
				<img class="text" height='100px' width='100px' id="emoji1" name="emoji1" onclick="off()">
				<img onclick="off2()" class="text" height='100px' width='100px' id="emoji2" name="emoji2"  >
			</div>
			<div class="video">
				<img id="editpic" class="video" width="500px">
			
			<div class="video">
				<video id='video'>Stream not available...</video>
			</div>
			<div class="emo_list">
			<img id="e1" src="img/emojis/1.png" height='50px' width='50px' style="margin: 19px">
			<img id="e2" src="img/emojis/2.png" height='50px' width='50px' style="margin: 19px">
			<img id="e3" src="img/emojis/3.png" height='50px' width='50px' style="margin: 19px">
			<img id="e4" src="img/emojis/4.png" height='50px' width='50px' style="margin: 19px">
			<br>
		</div>
			<button id="photo_button" class="button">Take Photo</button>
			<button id="Uploadbtn" class="button">Upload</button>
			<label id="testme" for="file" class="lbbutton">Css only file upload button</label>
			<input id="file" class="file-upload__input" type="file" name="file-upload">
			<!-- <div class="file-upload">
			</div> -->
			<canvas id="canvas2"></canvas>
			<button id="save_photo" class="button">save</button>
			<canvas id="canvas"></canvas>
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
</div>
<div id="comment"  class="col-2"><p>Comments<p></div>
  <!-- <aside class="aside aside-1" id="thumbnails"></aside> -->
  <!-- <aside id="comment"  class="aside aside-2"><p>Comments<p></aside> -->
  <footer class="footer">CAMAGRU TDILOTSO</footer>
</div>
</body>
<script>


  </script>

</html>