<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<div id="loginbox">
    <form id="login" action="login.php" method="post">
        <p>Username</p><input type="text" id="UNAME" placeholder="Enter Username" required>
        <br>
        <p>Password</p><input type="password" id="PWRD" placeholder="Enter Password" required>
        <br>
        <button type="submit" id="logbut">Login</button>
       
    </form>
    <br>
        <a href="register.php">Register</a>
</div>
</body>
</html>