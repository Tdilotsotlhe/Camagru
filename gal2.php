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
</head>

<body>
<div class="wrapper">
<?php
    include "includes/header.php";
?>
  <article class="main">
 <!--  <canvas id="myCanvas" width="600" height="400"> -->
  <video id="video" width="640" height="480" autoplay></video>
<button id="snap">Snap Photo</button>
<canvas id="canvas" width="640" height="480"></canvas>
<!-- </canvas> -->


  <?php loadGallery2();  ?>
  <div class>
      <form action="functions/upload.php" method="post" enctype="multipart/form-data">
        <p>Select image to upload</p>
        <input type="file" name="userpic" id="userpic">
        <input type="submit" value="Upload Image" name="submit">
        
      </form>
      <button type="submit" id="webcam" onclick="wtf();">Use Webcam</button>
  </div>
  </article>
  <aside class="aside aside-1"><?php  loadMenu();   ?></aside>
  <aside class="aside aside-2">Thumbnails <?php loadGallery();  ?></aside>
  <footer class="footer">CAMAGRU TDILOTSO</footer>
</div>
</body>

</html>