<?php
include "config/database.php";
$_SESSION['test'] = "SHIT!";
echo $_SESSION['test'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
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
    <a class="active" href="#home">Home</a>
    <a href="#contact">Gallery</a>
    <a href="functions/logout.php">Logout</a>
  </div>
</div>
<div id="logindiv" style="border: solid black; margin:auto; display: block; padding: 5; width:300;">
    <form id="login" action="functions/login.php" method="post">
    <p>login>>></p>
    <hr>
        <p>Username</p><input type="text" name="uname" id="uname" placeholder="Enter Username" required>
        <br>
        <p>Password</p><input type="password" name="pwrd" id="pwrd" placeholder="Enter Password" required>
        <br>
        <button type="submit" id="logbut">Login</button>
       
    </form>
    <hr>
        <button id="butreg" onclick="regtoggle()">Register</button>
</div>

<div id="regdiv" style="border: solid black; margin:auto; display: none; padding: 5; width:300;">
    <form id="register" action="functions/register.php" method="post">
        <p>Register>>></p>
        <hr>
        <p>Username</p><input type="text" name="uname" id="uname" placeholder="Enter Username" required>
        <br>
        <p>Password</p><input type="password" name="pwrd" id="pwrd" placeholder="Enter Password" required>
        <br>
        <p>Re-enter Password</p><input type="password" name="pwrd" id="pwrd" placeholder="Enter Password" required>
        <br>
        <p>email</p><input type="email" name="email" id="pwrd" placeholder="Enter email" required>
        <br>
        <button type="submit" id="logbut">Register</button>
       
    </form>
    <hr>
        <button id="butlog" onclick="regtoggle()">login</button>
</div>

</body>
</html>