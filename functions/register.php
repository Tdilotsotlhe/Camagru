<?php

include "../config/database.php";


 $user = $_POST["uname1"];
 $pass = password_hash($_POST["pwrd1"], PASSWORD_BCRYPT);
 $pass2 = $_POST["pwrd1"];
 $email =$_POST["email"];
 $acthash =md5(rand(0,1010));

 //run validation

 //Var_dump($_POST);

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

  if($stmt->execute()){
    sendVerify($email, $acthash);
    echo "Please check email to complete registration!";
  }
   
 } catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
 }  




////move to new file for other email functionss
function  sendVerify($em, $ah)
{
//require "Mail.php";
$to = $em;
$subject = "Camagru account activation";

$message = "
<html>
<head>
<title>Camagru Account Activaiton</title>
</head>
<body>
<p>Welcome to camagru!</p>
<p>Thank you fore registering!</p>
<p>Pleasue use the link below to activate your account</p>
<p>".$ah."</p>
http://localhost:8080/camagru/act.php?act=".$ah."
</body>
</html>
";

// Always set content-type when sending HTML email

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
//$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


if(mail($to,$subject,$message,$headers, "-f phenom92@gmail.here"))
{
  echo "Instructions :";
  $errorMessage = error_get_last()['message'];
  echo $errorMessage;
}
else{
  $errorMessage = error_get_last()['message'];
  echo $errorMessage;
}

}



?>