<?php

if(isset($_GET['la']))
{
  echo "<script>alert('');</script>";
}
require_once "../config/database.php";


 $login = $_POST["uname"];
 $pass =$_POST["pwrd"];


 function setlogin($row)
{
  $_SESSION['uid'] = $row['user_id'];
  $_SESSION['username'] = $row['username'];
} 

try {
  $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASS);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

 try {
  $dbh->query("USE ".$DB_NAME);
} catch (Exception $e) {
   die("db creation failed!");
} 

  try { 
    $stmt = $dbh->prepare("SELECT * FROM users WHERE username=?");
    if($stmt->execute([$login])){
      
      while($row = $stmt->fetch()){ 
         
       
           if (strcmp($row['username'], $login) == 0 && $row && password_verify($pass, $row['passw']))
          {
          
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