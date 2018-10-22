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
    <title>Camagru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    <script src="js/main.js"></script>
</head>
<body>
<div class="header">
  <a href="#default" class="logo">Camagru</a>
  <div class="header-right">
      <a href="#"><?php echo "Welcome ".$_SESSION['username']; ?> </a>
      <!-- switch class to active on click -->
    <a  href="#home" id="home">Home</a>
    <a class="active" href="gallery.php" id="gallery">Gallery G</a>
    <a href="functions/logout.php">Logout</a>
  </div>
</div>

<hr>
<div class="flex-container">
  <?php
    loadGallery();
  ?>
</div>

<div >
  <div>
      <form action="functions/upload.php" method="post" enctype="multipart/form-data">
        <p>Select image to upload</p>
        <input type="file" name="userpic" id="userpic">
        <input type="submit" value="Upload Image" name="submit">
        <button>Use Webcam</button>
      </form>
  </div>
</div>

</body>
</html>