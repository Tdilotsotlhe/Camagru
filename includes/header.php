<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
function showuser()
{
  if(isset($_SESSION['username']))
  {
    return $_SESSION['username'];
  }
  else return "Guest";
}


echo "

<div class='w3-container'>
  
  <div class='header-right'>
  <a href='#default' class='logo'>Camagru</a>
      <a id='namebrand' href='#'>";
echo "Welcome ";
echo showuser();
echo " </a>
      <!-- switch class to active on click -->
    <a class='' href='index.php' id='home'>Home</a>
    <a href='gal2.php' id='gallery'>Profile</a>
    <a href='gal3.php' id='gallery'>Gallery</a>
    <a id='logoutlink' href='functions/logout.php'>Logout</a>
  </div>
</div>";

?>