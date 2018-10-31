<?php

include "../config/database.php";


 $user = $_POST["uname1"];
 $pass = password_hash($_POST["pwrd1"], PASSWORD_BCRYPT);
 $email =$_POST["email"];
 $acthash =md5(rand(0,1010));
 Var_dump($_POST);

try {
  $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASS);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // echo "yes";
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}


 //select DB
 try {
  $dbh->query("USE ".$DB_NAME);
} catch (Exception $e) {
   die("db creation failed!");
} 

  try { 

    $sql = "INSERT INTO users (username, passw, email, acthash) VALUES (:username, :passw, :email, :acthash)";
    $stmt= $dbh->prepare($sql);
    $stmt->bindParam(':username', $user);
    $stmt->bindParam(':passw', $pass);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':acthash', $acthash);

    $stmt->execute();
    sendVerify($email, $acthash);

   
 } catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
 }  




////move to new file for other email functionss
function  sendVerify($em, $ah)
{
require "Mail.php";
$to = "phenom92@gmail.com";
$subject = "HTML email";

$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
<tr>
<td>John</td>
<td>Doe</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <phenom92@gmail.com>' . "\r\n";


if(mail($to,$subject,$message,$headers))
{
  echo "AWE";
  $errorMessage = error_get_last()['message'];
  echo $errorMessage;
}
else{
  $errorMessage = error_get_last()['message'];
  echo $errorMessage;
}

}



?>