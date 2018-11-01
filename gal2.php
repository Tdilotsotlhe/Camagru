<?php
include "config/database.php";
include "functions/load.php";
/* $_SESSION['test'] = "SHIT!";
echo $_SESSION['test']; */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="new.css" />
    
   <!--  <script src="js/myjs.js"></script> -->
   <!--  <script src="js/newcamjs.js"></script> -->
    <script src="js/pic.js"></script>
    <style>
#overlay {
    position: absolute;
    display: none;
    width: 500px;
    height: 375px;
    top: 50;
    left: 50;
    right: 70; 
    bottom: 30;
    z-index: 2;
   
    
    cursor: pointer;
}
#text{
    position: absolute; 
    top: 50%;
    left: 50%;
    font-size: 20px;
    color: white;
    /* transform: translate(-50%,-50%); */
    /* -ms-transform: translate(-50%,-50%); */
}
</style>
</head>

<body>
<div class="wrapper">
<?php
    include "includes/header.php";
?>
  <article class="main">
  <div class="top_container">


  <div height="375px" width="500px" style="position: relative;">  
<div id="overlay" class="overlay" onclick="off()">
<img class="text" height='100px' width='100px' id="emoji1" name="emoji1" src="img/emojis/poo.png">
<img class="text" height='100px' width='100px' id="emoji2" name="emoji1" src="img/emojis/poo.png">
</div>
<!-- <div> -->
<video id='video'>Stream not available...</video>
<!-- </div> -->
<!-- <button onclick="on()">On</button> -->

</div>
<button id="photo_button" class="btn btn_darkk">
Take Photo
</button>
<button id="save_photo" class="btn btn_darkk">
save
</button>


</div>

<img id="e1" src="img/emojis/penguin.png" height='40px' width='40px'>
<img id="e2" src="img/emojis/poo.png" height='40px' width='40px'>
<br>

<canvas id="canvas"></canvas>


<div class="bottom_container">
<div id="photos"></div>
</div> 
<script>
function on() {

document.getElementById("overlay").style.display = "block";
}
function off() {
document.getElementById("overlay").style.display = "none";
}
emo1 = document.getElementById("e1");
emo2 = document.getElementById("e2");
emo1.addEventListener("click", function(){switchsrc(emo1);}, false);
emo2.addEventListener("click", function(){switchsrc(emo2);}, false);
function switchsrc(emonew)
{
//document.getElementById("emoji1").style.display = "block";
document.getElementById("overlay").style.display = "block";
var emoswitch = document.getElementById("emoji1");
var emoswitch2 = document.getElementById("emoji2");

var ovl = document.getElementById("emoji1");
var ovl2 = document.getElementById("emoji2");
switch (emonew.id)
{
case "e1" :
    emoswitch.setAttribute('src', emonew.src);
    emoswitch2.setAttribute('src', emonew.src);
    ovl.style.paddingTop = "90px";
    ovl.style.paddingLeft = "20px";
    ovl2.style.paddingTop = "10px";
    ovl2.style.paddingLeft = "30px";
    break;
case "e2" :
emoswitch.setAttribute('src', emonew.src);
    ovl.style.paddingTop = "30px";
    ovl.style.paddingLeft = "500px";
    ovl2.style.paddingTop = "50px";
    ovl2.style.paddingLeft = "120px";
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
      <form action="functions/upload.php" method="post" enctype="multipart/form-data">
        <p>Select image to upload</p>
        <input type="file" name="userpic" id="userpic">
        <input type="submit" value="Upload Image" name="submit">
        
      </form>
      
  </div>
  </article>
  <aside class="aside aside-1"><div><?php  loadMenu();   ?></div></aside>
  <aside class="aside aside-2">Thumbnails <?php loadGallery();  ?></aside>
  <footer class="footer">CAMAGRU TDILOTSO</footer>
</div>
</body>
<script>

  

  </script>

</html>