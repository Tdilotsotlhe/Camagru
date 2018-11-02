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
    <script src="js/myajax.js"></script>
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
<img class="text" height='100px' width='100px' id="emoji1" name="emoji1" src="img/emojis/poo.png" onclick="emotoggle(this);">
<img class="text" height='100px' width='100px' id="emoji2" name="emoji1" src="" onclick="emotoggle(this);" style="display: none;">
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

<div id="emos1" class="btn-group">
<p>emo1</p>
<img id="e1" src="img/emojis/penguin.png" height='40px' width='40px' >
<img id="e2" src="img/emojis/poo.png" height='40px' width='40px'>
<img id="e3" src="img/emojis/1.png" height='40px' width='40px'>
<img id="e4" src="img/emojis/2.png" height='40px' width='40px' >
</div>
<p>emo2</p>
<div id="emos2" class="btn-group">
<img id="e6" src="img/emojis/penguin.png" height='40px' width='40px'onclick ="emohide2()">
<img id="e7" src="img/emojis/poo.png" height='40px' width='40px'onclick ="emohide2()">
<img id="e9" src="img/emojis/1.png" height='40px' width='40px'onclick ="emohide2()">
<img id="e10" src="img/emojis/2.png" height='40px' width='40px'onclick ="emohide2()">
</div>
<br>

<canvas id="canvas"></canvas>


<div class="bottom_container">
<div id="photos"></div>
</div> 
<script>
  var ediv1 = document.getElementById("emos1");
  var ediv2 = document.getElementById("emos2");
function on() {

document.getElementById("overlay").style.display = "block";

}
function off() {
//document.getElementById("overlay").style.display = "none";

}
emo1 = document.getElementById("e1");
emo2 = document.getElementById("e2");
emo3 = document.getElementById("e3");
emo4 = document.getElementById("e4");
emo6 = document.getElementById("e6");
emo7 = document.getElementById("e7");
emo9 = document.getElementById("e9");
emo10 = document.getElementById("e10");
emo1.addEventListener("click", function(){switchsrc(emo1); emohide();}, false);
emo2.addEventListener("click", function(){switchsrc(emo2); emohide();}, false);
emo3.addEventListener("click", function(){switchsrc(emo3); emohide();}, false);
emo4.addEventListener("click", function(){switchsrc(emo4); emohide();}, false);
emo6.addEventListener("click", function(){switchsrc(emo6);}, false);
emo7.addEventListener("click", function(){switchsrc(emo7);}, false);
emo9.addEventListener("click", function(){switchsrc(emo9);}, false);
emo10.addEventListener("click", function(){switchsrc(emo10);}, false);
//////emo toggling
function emotoggle(emo)
{
    alert("canvas toggle");
    if (emo.style.display != "none")
    {
        emoshow();
        emo.style.display = "none";
    }
    else{
        emohide();
        //ediv1.style.display = "block"; 
        emo.style.display = "block";
    }
}
function emohide()
{
    alert("emohide1");
    ediv1.style.display = "none";
}
function emoshow()
{
    alert("emohide1");
    ediv1.style.display = "block";
}
function emotoggle2(emo)
{
    alert("canvas toggle");
    if (emo.style.display != "none")
    {
        emoshow2();
        emo.style.display = "none";
    }
    else{
        emohide2();
        //ediv1.style.display = "block"; 
        emo.style.display = "block";
    }
}
function emohide2()
{
    alert("emohide1");
    ediv2.style.display = "none";
}
function emoshow2()
{
    alert("emohide1");
    ediv2.style.display = "block";
}

//////////end emo toggling UI
////start emo switching
function switchsrc(emonew)
{

document.getElementById("overlay").style.display = "block";
var emoswitch = document.getElementById("emoji1");
//var emoswitch2 = document.getElementById("emoji2");

 

    //check if image is child of 1st emo div, or 2nd emodiv
    //checkdiv by getting value
    var firstdiv = document.getElementById("emos1");
    var Secdiv = document.getElementById("emos2");
    if (emonew.parentNode == firstdiv) {
        
    }

switch (emonew.id)
{
case "e1" :
    emoswitch.setAttribute('src', emonew.src);
   // emoswitch2.setAttribute('src', emonew.src);
    ovl.style.paddingTop = "90px";
    ovl.style.paddingLeft = "20px";
    
    break;
case "e2" :
    emoswitch.setAttribute('src', emonew.src);
    ovl.style.paddingTop = "30px";
    ovl.style.paddingLeft = "500px";
    
    break;
case "e3" :
    emoswitch.setAttribute('src', emonew.src);
    ovl.style.paddingTop = "30px";
    ovl.style.paddingLeft = "500px";
    
    break;
case "e4" :
    emoswitch.setAttribute('src', emonew.src);
    ovl.style.paddingTop = "30px";
    ovl.style.paddingLeft = "500px";
    
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