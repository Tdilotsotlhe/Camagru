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
    <!-- <script src="js/pic.js"></script> -->
    <script src="js/myajax.js"></script>
    <script src="js/thumbs.js"></script>
    <script src="js/myjs.js"></script>
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

#infinite-list {
  /* We need to limit the height and show a scrollbar */
  width: 200px;
  height: 300px;
  overflow: auto;

  /* Optional, only to check that it works with margin/padding */
  margin: 30px;
  padding: 20px;
  border: 10px solid black;
}

/* Optional eye candy below: */
li {
  padding: 10px;
  list-style-type: none;
}
li:hover {
  background: #ccc;
}
</style>
</head>

<body>
<div class="wrapper">
<?php
    include "includes/header.php";
?>
  <article  class="main">
    <div id="pagegal" style = "overflow: auto;">
<!-- <img id='pic0' name="pik0" onclick="imageComment(this);" class='thumbs' src="img/emojis/poo.png" height="200px" width="200px">
<img id='pic1' name="pik1" onclick="imageComment(this);" class='thumbs' src="img/emojis/poo.png" height="200px" width="200px">
<img id='pic2' name="pik2" onclick="imageComment(this);" class='thumbs' src="img/emojis/poo.png" height="200px" width="200px">
<img id='pic3' name="pik3" onclick="imageComment(this);" class='thumbs' src="img/emojis/poo.png" height="200px" width="200px"> -->
</div>
<br>

<button id="prevset" onclick="prevpage();"><<</button>
<button id="nextset" onclick="nextpage();">>></button>
<div id="controls">

</div>
<br>
<p id='pagecounter'>1/?</p>

  </article>
  <aside class="aside aside-1" id="thumbnails"></aside>
  <aside id="comment"  class="aside aside-2"><p>Comments<p></aside>
  <footer class="footer">CAMAGRU TDILOTSO</footer>
</div>
</body>

    <!-- <script> request_page(1); </script> -->


</html>