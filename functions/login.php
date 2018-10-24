<?php

if(isset($_GET['la']))
{
  echo "<script>alert('');</script>";
}
require_once "../config/database.php";

//var_dump($_POST);
//sanitize variables
 $login = $_POST["uname"];
 $pass =$_POST["pwrd"];
//echo "\n";
//echo $login;
//echo  $pass;

 function setlogin($row)
{
  $_SESSION['uid'] = $row['user_id'];
  $_SESSION['username'] = $row['username'];
} 


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

/*
try {
$stmt = $pdo->prepare("SELECT * FROM users WHERE username=:id");
$stmt->execute(['id' => $login]); 
$user = $stmt->fetch();
} catch (Exception $e) {
  die("select failed!");
} */



  try { 
    $stmt = $dbh->prepare("SELECT * FROM users WHERE username=?");
    if($stmt->execute([$login])){
      
      while($row = $stmt->fetch()){ 
         
         // echo $row["password"];
           if (strcmp($row['username'], $login) == 0 && $row && password_verify($pass, $row['passw']))
          {
            //echo "valid";
              setlogin($row);
              header("Location: ../index.php");
          } 
          else 
          {
            echo header("Location: ../index.php?la=0");
          }
      }
    }
 } catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}  

 


?>