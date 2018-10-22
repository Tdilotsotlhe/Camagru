<?php
echo "
<div class='header'>
  <a href='#default' class='logo'>Camagru</a>
  <div class='header-right'>
      <a href='#'>";
echo "Welcome ".$_SESSION['username']." </a>
      <!-- switch class to active on click -->
    <a class='' href='index.php' id='home'>Home</a>
    <a href='gal2.php' id='gallery'>Gallery G</a>
    <a href='functions/logout.php'>Logout</a>
  </div>
</div>";

?>