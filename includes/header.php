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



  <div class='w3-bar w3-theme-d5 (w3-theme-dark) w3-animate-top'>
  Camagru
     ";
echo "       Welcome ";
echo showuser();


     if(isset($_SESSION['uid']))
     {
      echo "<a class='w3-button w3-right' id='logoutlink' href='functions/logout.php'>Logout</a>";
     }else{
  echo "<button onclick='loginmodal()' class='w3-button w3-right' id='loginbutton'>Login</button>";
       }
       echo "   <a class='w3-button w3-right' href='gal3.php' >Gallery</a>
      <a class='w3-button w3-right' href='profile.php' >Profile</a>
    <a class='w3-button w3-right' href='index.php' >Home</a>
   
  </div>
";

?>
