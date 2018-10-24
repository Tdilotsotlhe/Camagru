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
    
    <script src="js/myjs.js"></script>
    <script src="js/newcamjs.js"></script>
</head>

<body>
<div class="wrapper">
<?php
    include "includes/header.php";
?>
  <article class="main">
<canvas id="myCanvas" width="300" height="300"></canvas> 
<video id='video'></video>
<br>
<button id="takepic">TAKE PIC</button>
<br>
<form action="functions/upweb.php" method="post" enctype="multipart/form-data">
<img name='photo' id="photo" alt="The screen capture will appear in this box.">
<input type="hidden" name="newimage">
<br>
<input type="submit" id="webcamupload" value="submit">
</form>
<br>
  <?php loadGallery2();  ?>
  <div>
      <form action="functions/upload.php" method="post" enctype="multipart/form-data">
        <p>Select image to upload</p>
        <input type="file" name="userpic" id="userpic">
        <input type="submit" value="Upload Image" name="submit">
        
      </form>
      
  </div>
  </article>
  <aside class="aside aside-1"><?php  loadMenu();   ?></aside>
  <aside class="aside aside-2">Thumbnails <?php loadGallery();  ?></aside>
  <footer class="footer">CAMAGRU TDILOTSO</footer>
</div>
</body>
<script>

  

  </script>

</html>