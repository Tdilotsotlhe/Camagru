<?php

include "../config/database.php";


 $user = $_POST["uname"];
 $pass = password_hash($_POST["pwrd"], PASSWORD_BCRYPT);
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
   
 } catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
 }  

?>